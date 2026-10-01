<?php
require_once '../../../config/config.php';

// Fetch states and products for initial dropdown
$db = Database::getDB();
$states = $db->query("SELECT id, name FROM states")->fetchAll(PDO::FETCH_ASSOC);
$products = $db->query("SELECT id, name FROM products")->fetchAll(PDO::FETCH_ASSOC);
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <?php require_once '../components/navbar/header.php'; ?>
    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col-lg-8">
                <div class="card my-3">
                    <div class="card-header">
                        <h5>Add Data</h5>
                    </div>
                    <div class="card-body">
                    <div class="mb-3 col-lg-4">
    <label>State</label>
    <div class="input-group">
        <select name="state_id" id="state" class="form-select" required>
            <option value="">Select State</option>
            <?php foreach ($states as $state): ?>
                <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addStateModal">+</button>
    </div>
</div>


<div class="mb-3 col-lg-4">
    <label>District</label>
    <div class="input-group">
        <select name="district_id" id="district" class="form-select" required>
            <option value="">Select District</option>
        </select>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addDistrictModal">+</button>
    </div>
</div>


                            <div class="mb-3 col-lg-4">
                                <label>Product</label>
                                <label>Product</label>
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
            </div>


            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Table</h4>
                    </div>
                    <div class="card-body">


                        <div id="dataTable"></div>
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
        <select id="districtStateId" class="form-select mb-2" required>
          <option value="">Select State</option>
          <?php foreach ($states as $state): ?>
              <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>
          <?php endforeach; ?>
        </select>
        <input type="text" name="district_name" class="form-control" placeholder="District Name" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add District</button>
      </div>
    </form>
  </div>
</div>

    <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
    <script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#state, #district, #product').select2({
            placeholder: "Select an option",
            allowClear: true,
            width: '100%'
        });
        $('#state').change(function() {
            let stateId = $(this).val();
            $('#district').html('<option value="">Loading...</option>');
            $.post('ajax/getDistricts.php', {
                state_id: stateId
            }, function(data) {
                $('#district').html(data);
                $('#district').select2({
                    placeholder: "Select District",
                    allowClear: true,
                    width: '100%'
                });
            });
        });

        $(document).ready(function() {
            // Get Districts on State change
            $('#state').change(function() {
                let stateId = $(this).val();
                $('#district').html('<option value="">Loading...</option>');
                $.post('ajax/getDistricts.php', {
                    state_id: stateId
                }, function(data) {
                    $('#district').html(data);
                });
            });

            // Add new section row
            $(document).on('click', '.addRow', function() {
                let newRow = `
        <div class="row mb-2 sectionRow">
            <div class="col-md-5">
                <input type="text" name="section[]" class="form-control" placeholder="Section" required />
            </div>
            <div class="col-md-5">
                <input type="number" name="price[]" class="form-control" placeholder="Consumer Price" required />
            </div>
            <div class="col-md-2">
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

            if (!valid) e.preventDefault();
        });
        // Add State
$('#addStateForm').submit(function(e) {
    e.preventDefault();
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