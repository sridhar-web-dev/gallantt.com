<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: report-list.php");
    exit();
}

$reportId = $_GET['id'];
$report = new InvestorReport();
$categories = $report->getCategories();
$reportData = $report->getReportById($reportId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $title = $_POST['title'];
    $file = $_FILES['file'] ?? null;

    // Call the method to update the report
    if ($report->updateReport($reportId, $category, $subcategory, $title, $file)) {
        clearVarnishCache();
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to update report.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Investor Report</title>
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
  <div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">                
            <h3>Edit Report</h3>
            <a href="index.php" class="btn btn-secondary">Manage Report</a>
            </div>
            <div class="card-body">
    <form method="post" enctype="multipart/form-data" id="investorEditForm">
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-select" required>
                <option value="">choose Category</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $reportData['category']) ? 'selected' : '' ?>>
                        <?= $cat['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="subcategory" class="form-label">Subcategory</label>
            <select name="subcategory" id="subcategory" class="form-select" required>
                <!-- Subcategories will be populated dynamically based on the selected category -->
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($reportData['title']) ?>" required>
        </div>

        <div class="mb-3">
    <label for="file" class="form-label">File</label>
    <input type="file" name="file" id="file" class="form-control">
    <?php if ($reportData['report_file']): ?>
        <small class="form-text text-muted">Current file: <a href="<?php echo ABS_URL?>/uploads/investors-reports/uploads/<?= $reportData['report_file'] ?>" target="_blank"><?= $reportData['report_file'] ?></a></small>
    <?php endif; ?>
</div>


        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
            </div>
        </div>
    </div>
   
  </div>
</div>

<script>
    document.getElementById('category').addEventListener('change', function() {
        const catId = this.value;
        fetch('get_subcategory.php?cat_id=' + catId)
            .then(response => response.json())
            .then(data => {
                const subcategorySelect = document.getElementById('subcategory');
                subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
                data.forEach(sub => {
                    const option = document.createElement('option');
                    option.value = sub.id;
                    option.text = sub.name;
                    subcategorySelect.appendChild(option);
                });

                // Pre-select the subcategory if it's already set
                const selectedSubcategory = "<?= $reportData['subcategory'] ?>";
                if (selectedSubcategory) {
                    subcategorySelect.value = selectedSubcategory;
                }
            });
    });

    // Trigger change event to populate subcategories based on the current category
    if (document.getElementById('category').value) {
        document.getElementById('category').dispatchEvent(new Event('change'));
    }
</script>
</body>
</html>
