<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

$report = new InvestorReport();
$categories = $report->getCategories();
if (isset($_GET['cat_id'])) {
    $report = new InvestorReport();
    $subcategories = $report->getSubcategories($_GET['cat_id']);
    
    header('Content-Type: application/json');
    echo json_encode($subcategories);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $report->saveReports($category, $subcategory);
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors Report</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
    </style>
    
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Create Report</h4>
                    <a href="index.php" class="btn btn-secondary">Manage Report</a>
                </div>
                <div class="card-body">
                    <div id="message" class="mt-3"></div>
                    <form method="post" enctype="multipart/form-data" id="investorCreateForm">
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Category</label><button type="button" class="btn btn-sm btn-outline-primary mb-1 float-end" data-bs-toggle="modal" data-bs-target="#categoryModal">+ Add </button>
            <select id="category" name="category" class="form-select" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Subcategory</label><button type="button" class="btn btn-sm btn-outline-secondary mb-1 float-end" data-bs-toggle="modal" data-bs-target="#subcategoryModal">+ Add </button>

            <select id="subcategory" name="subcategory" class="form-select">
                <option value="">Select Subcategory</option>
            </select>
        </div>
    </div>

    <div id="report-section">
        <div class="report-group row align-items-center mb-3">
            <div class="col-md-6">
                <!-- <input type="text" class="form-control" name="report[title][]" placeholder="Report Title" required> -->
                <input type="text" name="title[]" class="form-control" placeholder="Report Title" required>


            </div>
            <div class="col-md-5">
                <!-- <input type="file" class="form-control" name="report[file][]" required> -->
                <input type="file" name="file[]" class="form-control" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success" onclick="addReport()">+</button>
            </div>
        </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Investors page.</div>
                    <a href="<?php echo ABS_URL; ?>investors#investor-report" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
    </div>
</div>
<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="categoryForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Subcategory Modal -->
<div class="modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="subcategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="subcategoryForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Subcategory</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <select name="category_id" class="form-select mb-3" required>
            <option value="">Select Category</option>
            <?php foreach ($categories as $cat): ?>
              <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
            <?php endforeach; ?>
          </select>
          <input type="text" name="subcategory_name" class="form-control" placeholder="Subcategory Name" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
</script>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
    <script>
        document.getElementById('category').addEventListener('change', function() {
            const catId = this.value;
            fetch('get_subcategory.php?cat_id=' + catId)
                .then(response => response.json())
                .then(data => {
                    const subcatSelect = document.getElementById('subcategory');
                    subcatSelect.innerHTML = '<option value="">Select Subcategory</option>';
                    data.forEach(sub => {
                        subcatSelect.innerHTML += `<option value="${sub.id}">${sub.name}</option>`;
                    });
                });
        });

        function addReport() {
    const section = document.getElementById('report-section');
    const newBlock = document.createElement('div');
    newBlock.className = 'report-group row align-items-center mb-3';
    newBlock.innerHTML = `
        <div class="col-md-6">
            <input type="text" name="title[]" class="form-control" placeholder="Report Title" required>
        </div>
        <div class="col-md-5">
           <input type="file" name="file[]" class="form-control" required>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger" onclick="this.closest('.report-group').remove()">-</button>
        </div>
    `;
    section.appendChild(newBlock);
}

// Add Category
$('#categoryForm').on('submit', function (e) {
    e.preventDefault();
    $.post('ajax_add_category.php', $(this).serialize(), function (res) {
        if (res.success) {
            $('#category').append(`<option value="${res.id}" selected>${res.name}</option>`);
            $('#categoryModal').modal('hide');
            $('#categoryForm')[0].reset();
        } else {
            alert(res.message || 'Something went wrong');
        }
    }, 'json');
});

// Add Subcategory
$('#subcategoryForm').on('submit', function (e) {
    e.preventDefault();
    $.post('ajax_add_subcategory.php', $(this).serialize(), function (res) {
        if (res.success) {
            $('#subcategory').append(`<option value="${res.id}" selected>${res.name}</option>`);
            $('#subcategoryModal').modal('hide');
            $('#subcategoryForm')[0].reset();
        } else {
            alert(res.message || 'Something went wrong');
        }
    }, 'json');
});

    </script>

</body>
</html>
