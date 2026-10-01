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
    $report->saveReports($category, $subcategory, $_FILES['report']);
    echo "Reports uploaded successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dynamic Report Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .report-group {
            margin-bottom: 1rem;
        }

        .remove-btn {
            cursor: pointer;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4">Upload Reports</h3>
        <form method="post" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Category</label>
            <select id="category" name="category" class="form-select" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">Subcategory</label>
            <select id="subcategory" name="subcategory" class="form-select" required>
                <option value="">Select Subcategory</option>
            </select>
        </div>
    </div>

    <div id="report-section">
        <div class="report-group row align-items-center mb-3">
            <div class="col-md-5">
                <!-- <input type="text" class="form-control" name="report[title][]" placeholder="Report Title" required> -->
                <input type="text" name="title[]" class="form-control" placeholder="Report Title" required>


            </div>
            <div class="col-md-5">
                <!-- <input type="file" class="form-control" name="report[file][]" required> -->
                <input type="file" name="file[]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success" onclick="addReport()">Add More</button>
            </div>
        </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        <div class="col-md-5">
            <input type="text" name="title[]" class="form-control" placeholder="Report Title" required>
        </div>
        <div class="col-md-5">
           <input type="file" name="file[]" class="form-control" required>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger" onclick="this.closest('.report-group').remove()">Remove</button>
        </div>
    `;
    section.appendChild(newBlock);
}

    </script>
</body>

</html>