<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
// Fetch states and products for initial dropdown
$db = Database::getDB();
$states = $db->query("SELECT id, name FROM web_states")->fetchAll(PDO::FETCH_ASSOC);
$products = $db->query("SELECT id, name FROM web_products")->fetchAll(PDO::FETCH_ASSOC);

// For Report

$report = new Report();
$currentReport = $report->getReport();

$sectionObj = new FormHandler(); // or your class name
$sections = $sectionObj->getAllSections();


$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['report'])) {
    $file = $_FILES['report'];
    if ($file['error'] === 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'RCP_LATEST_POST_' . date('d_m_Y') . '.' . $ext;
        $targetPath = '../../../uploads/rcp/uploads/'. $filename ;

        // Delete old if exists
        if ($currentReport) {
            $report->deleteOldReport($currentReport['filename']);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            if ($report->uploadNewReport($filename)) {
                clearVarnishCache();
                $message = "Report uploaded successfully.";
                $currentReport = $report->getReport();
            } else {
                $message = "Failed to save report.";
            }
        } else {
            $message = "Failed to upload report.";
        }
    } else {
        $message = "File error.";
    }
}
// Pagination setup
$limit = 15; // records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sectionObj = new FormHandler();
$sections = $sectionObj->getSectionsPaginated($limit, $offset);
$totalSections = $sectionObj->getTotalSections();
$totalPages = ceil($totalSections / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCP Update</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="<?= ABS_URL ?>css/select2.min.css" rel="stylesheet" />
    <style>
        .rcp-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .rcp-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .rcp-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: rcp-wireframe-shimmer 1.2s linear infinite; }
        .rcp-wireframe-line.short { width: 58%; } .rcp-wireframe-line.long { width: 84%; }
        @keyframes rcp-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .rcp-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>

</head>

<body>
    <div id="rcpLoader" class="rcp-loader" role="status" aria-live="polite" aria-hidden="true">
        <div class="rcp-loader-card">
            <div class="rcp-wireframe-line short"></div>
            <div class="rcp-wireframe-line long"></div>
            <div class="rcp-wireframe-line long"></div>
            <div class="rcp-loader-text" id="rcpLoaderText">Processing RCP data...</div>
        </div>
    </div>
    <?php require_once '../components/navbar/header.php'; ?>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-7">
                <div class="card my-3">
                    <div class="card-header">
                        <h5>Add Data</h5>
                    </div>
                    <div class="card-body">
                    <form id="dataForm" method="POST" action="submit.php" class="row">
                                <div class="mb-3 col-lg-4">
                                <label>State</label> <a type="button" class="float-end btn btn-sm text-primary"  data-bs-toggle="modal" data-bs-target="#addStateModal">+ Add</a>
                                <div class="input-group">
                                    <select name="state_id" id="state" class="form-select" required>
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $state): ?>
                                            <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label>District</label><a type="button" class="float-end btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#addDistrictModal">+ Add</a>
                                <div class="input-group">
                                    <select name="district_id" id="district" class="form-select" required>
                                            <option value="0">All districts</option>
                                        
                                    </select>                        
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                            

                                <label>Product</label><a type="button" class="float-end btn btn-sm text-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">+ Add</a>
                                <select name="product_id" id="product" class="form-select" required>
                                    <option value="">Select Product</option>
                                    <?php foreach ($products as $product): ?>
                                        <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div id="sectionGroup">
                                <label class="mb-3">Section & Consumer Price</label>
                                <div class="row mb-2 sectionRow">
                                    <div class="col-md-7">
                                        <input type="text" name="section[]" class="form-control" placeholder="Section" required />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" name="price[]" class="form-control" placeholder="Consumer Price" required />
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-success addRow">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary w-25 mt-3 float-end" type="submit">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-header">
                        <h4>Data Table</h4>
                    </div>
                    <div class="card-body">


                        <div id="#dataTable"></div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-5">
                <div class="card my-3">
                <div class="card-header">
                        <h4>Upload Recent Report</h4>
                    </div>
                    <div class="card-body">
                    <?php if ($message): ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= $message ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?> 

<form id="reportUploadForm" method="POST" enctype="multipart/form-data" onsubmit="return validateFile()">
    <label class="mb-2 fw-bold">Select Report (PDF/DOC etc.):</label>
    <input type="file" class="form-control" name="report" id="report" accept=".pdf,.doc,.docx" required>
    <button type="submit" class="btn btn-primary w-100 mt-2">Upload</button>
</form>

<script>
function validateFile() {
    const fileInput = document.getElementById('report');
    const file = fileInput.files[0];
    if (!file) return false;

    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (!allowedTypes.includes(file.type)) {
        alert("Only PDF, DOC, or DOCX files are allowed.");
        return false;
    }

    const maxSize = 5 * 1024 * 1024; // 5MB
    if (file.size > maxSize) {
        alert("File size must not exceed 5 MB.");
        return false;
    }

    showRcpLoader('Uploading report...');
    return true;
}
</script>
     
    <hr>
    <?php if ($currentReport): ?>
    <div class="alert alert-warning fade show" role="alert">
        <strong>Note:</strong> A report already exists. Please upload a new one to replace it.<br>
        <a href="<?php echo ABS_URL ?>uploads/rcp/uploads/<?= $currentReport['filename'] ?>" target="_blank" class="btn btn-sm btn-outline-secondary mt-2">Download Current Report</a>
        
    </div>
<?php endif; ?>
       
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-body">
                         <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>S. No</th>
            <th>State</th>
            <th>District</th>
            <th>Product</th>
            <th>Section</th>
            <th>Consumer Price</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($sections)) : ?>
            <?php $sno = $offset + 1; foreach ($sections as $row) : ?>
                <tr>
                    <td><?= $sno++ ?></td>
                    <td><?= htmlspecialchars($row['state_name']) ?></td>
                    <td><?= htmlspecialchars($row['district_name']) ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= htmlspecialchars($row['section']) ?></td>
                    <td><?= htmlspecialchars($row['consumer_price']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">No sections found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php if ($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>
                    </div>
                </div>
            </div>
       





            </div>
    </div>
    <!-- Add State Modal -->
<div class="modal fade" id="addStateModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="addStateForm" class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add New State</h5></div>
      <div class="modal-body">
        <input type="text" name="state_name" class="form-control" placeholder="State Name" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add State</button>
      </div>
    </form>
  </div>
</div>

<!-- Add District Modal -->
<div class="modal fade" id="addDistrictModal" tabindex="-1">
  <div class="modal-dialog">
    <form id="addDistrictForm" class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add New District</h5></div>
      <div class="modal-body">
      <select id="districtStateId" class="form-select form-control mb-5" required>
  <option value="">Select State</option>
  <?php foreach ($states as $state): ?>
      <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
  <?php endforeach; ?>
</select>

        <input type="text" name="district_name" class="form-control mt-3" placeholder="District Name" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add District</button>
      </div>
    </form>
  </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="addProductForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="newProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="newProductName" name="product_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Product</button>
        </div>
      </div>
    </form>
  </div>
</div>

    <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
    <script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="<?= ABS_URL ?>js/select2.min.js"></script>
    <script>
function showRcpLoader(message) {
        $('#rcpLoaderText').text(message);
        $('#rcpLoader').css('display', 'flex').attr('aria-hidden', 'false');
}

function hideRcpLoader() {
        $('#rcpLoader').hide().attr('aria-hidden', 'true');
}

$(document).ready(function() {
    $(document).ajaxStart(function() {
        showRcpLoader('Processing RCP data...');
    }).ajaxStop(function() {
        hideRcpLoader();
    });

  $('#addProductForm').on('submit', function(e) {
    e.preventDefault();
    var productName = $('#newProductName').val().trim();
    if (productName !== '') {
      $.ajax({
        url: 'ajax/add_product.php',
        method: 'POST',
        data: { product_name: productName },
        success: function(response) {
          let data = JSON.parse(response);
          if (data.success) {
            // Append to product select
            $('#product').append(`<option value="${data.id}">${data.name}</option>`);
            $('#product').val(data.id); // Select newly added
            $('#addProductModal').modal('hide');
            $('#newProductName').val('');
          } else {
            alert(data.message || 'Failed to add product.');
          }
        }
      });
    }
  });
});
</script>

    <script>
        $('#state, #district, #product').select2({
            placeholder: "Select an option",
            allowClear: true,
            width: '100%'
        });
        $('#districtStateId').select2({
    dropdownParent: $('#addDistrictModal'),
    width: '100%',
    placeholder: 'Select State'
});

$('#state').change(function() {
    let stateId = $(this).val();
    $('#district').html('<option value="">Loading...</option>');

    $.post('ajax/getDistricts.php', { state_id: stateId }, function(data) {
        // Prepend the "All Districts" option
        let allOption = '<option value="0" selected>All Districts</option>';
        $('#district').html(allOption + data);

        // Initialize select2
        $('#district').select2({
            placeholder: "Select District",
            allowClear: true,
            width: '100%'
        });
    });
});


        $(document).ready(function() {
            // Get Districts on State change
//             $('#state').change(function() {
//     let stateId = $(this).val();
//     $('#district').html('<option value="">Loading...</option>');
    
//     $.post('ajax/getDistricts.php', { state_id: stateId }, function(data) {
//         // let allOption = '<option value="0">All Districts</option>';
//         $('#district').html(data);
//     });
// });


            // Add new section row
            $(document).on('click', '.addRow', function() {
                let newRow = `
        <div class="row mb-2 sectionRow">
            <div class="col-md-7">
                <input type="text" name="section[]" class="form-control" placeholder="Section" required />
            </div>
            <div class="col-md-4">
                <input type="number" name="price[]" class="form-control" placeholder="Consumer Price" required />
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger removeRow">-</button>
            </div>
        </div>`;
                $('#sectionGroup').append(newRow);
            });

            // Remove section row
            $(document).on('click', '.removeRow', function() {
                $(this).closest('.sectionRow').remove();
            });

            // Load table data when district or product changes
            $('#district, #product').change(function() {
                let districtId = $('#district').val();
                let productId = $('#product').val();
                if (districtId && productId) {
                    $.post('ajax/getSectionData.php', {
                        district_id: districtId,
                        product_id: productId
                    }, function(data) {
                        $('#dataTable').html(data);
                    });
                }
            });


        });
        // Update section or price inline
        $(document).on('blur', '.editable-section, .editable-price', function() {
            let id = $(this).data('id');
            let field = $(this).data('field');
            let value = $(this).text();

            $.post('ajax/updateSection.php', {
                id: id,
                field: field,
                value: value
            }, function(res) {
                // Optional: notify success
                console.log(res);
            });
        });

        // Delete row
        $(document).on('click', '.delete-row', function() {
            if (confirm('Are you sure?')) {
                let id = $(this).data('id');
                $.post('ajax/deleteSection.php', {
                    id: id
                }, function(res) {
                    $('#district').trigger('change'); // Refresh table
                });
            }
        });
        $('#dataForm').on('submit', function(e) {
            let valid = true;

            $('input[name="price[]"]').each(function() {
                if (!$.isNumeric($(this).val())) {
                    alert("Consumer price must be numeric");
                    valid = false;
                    return false;
                }
            });

            if (!valid) {
                e.preventDefault();
            } else {
                showRcpLoader('Saving RCP data...');
                $(this).find('button[type="submit"]').prop('disabled', true).text('Saving...');
            }
        });
        // Add State
$('#addStateForm').submit(function(e) {
    e.preventDefault();
    showRcpLoader('Adding state...');
    let name = $('input[name="state_name"]').val();
    $.post('ajax/addState.php', { name }, function(response) {
        $('#addStateModal').modal('hide');
        $('#state').append(`<option value="${response.id}">${response.name}</option>`);
        $('#state').val(response.id).trigger('change');
    }, 'json');
});

// Add District
$('#addDistrictForm').submit(function(e) {
    e.preventDefault();
    showRcpLoader('Adding district...');
    let state_id = $('#districtStateId').val();
    let name = $('input[name="district_name"]').val();
    $.post('ajax/addDistrict.php', { state_id, name }, function(response) {
        $('#addDistrictModal').modal('hide');
        if (state_id == $('#state').val()) {
            $('#district').append(`<option value="${response.id}">${response.name}</option>`);
            $('#district').val(response.id).trigger('change');
        }
    }, 'json');
});

    </script>
</body>

</html>