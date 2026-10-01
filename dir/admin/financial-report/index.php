<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$report = new FinancialReport();
$limit = 10;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch reports with pagination
$reports = $report->getAllReports($limit, $offset);

// Get total number of reports for pagination calculation
$totalReports = $report->getTotalReports();
$totalPages = ceil($totalReports / $limit);

// Handle delete action
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    // 1. Fetch existing report info
    $existing = $report->getReportById($id);

    // 2. Delete the file from uploads folder
    
    $path = '../../../uploads/financial-report/uploads/' . $existing['report_file'];
    if ($existing && !empty($existing['report_file']) && file_exists($path)) {
        unlink($path);
    }
    // 3. Delete the record from DB
    $report->deleteReport($id);
    clearVarnishCache();

    header("Location: index.php");
    exit;
}
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportName = trim($_POST['report_name'] ?? '');
    $file = $_FILES['report_file'] ?? null;

    if ($reportName === '' || !$file || $file['error'] !== UPLOAD_ERR_OK) {
        $msg = 'Please provide both a report name and a valid file.';
    } else {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowed = ['pdf', 'docx', 'xlsx'];

        if (!in_array(strtolower($ext), $allowed)) {
            $msg = 'Only PDF, DOCX, or XLSX files are allowed.';
        } else {
            $datePart = date('Y_m_d');
            $randomNum = rand(100, 999);
            $newFilename = "FINAL_REPORT_{$datePart}_{$randomNum}." . $ext;
            $newFile = '../../../uploads/financial-report/uploads/' . $newFilename;

            if (move_uploaded_file($file['tmp_name'], $newFile)) {
                $report = new FinancialReport();
                if ($report->saveReport($reportName, $newFilename)) {
                    clearVarnishCache();
                    // Successful upload, now redirect to the same page to refresh
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                } else {
                    $msg = 'Database error while saving report.';
                }
            } else {
                $msg = 'Failed to upload file.';
            }
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Report</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .pagination {
    text-align: center;
    margin-top: 20px;
}

.pagination a {
    margin: 0 5px;
    padding: 5px 10px;
    text-decoration: none;
}

.pagination .btn-info {
    background-color: #007bff;
    color: white;
}

.pagination .btn-light {
    background-color: #f8f9fa;
}

.pagination .btn-primary {
    background-color: #28a745;
    color: white;
}

    </style>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
   <div class="row">
    <div class="col-lg-5 order-2">
    <div class="card">
        <div class="card-header">
                    <h5>Add Financial Report</h5>
        </div>
        <div class="card-body">

<?php if ($msg): ?>
    <div class="alert alert-info"><?= htmlspecialchars($msg) ?></div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data" class="bg-white p-4">
    <div class="mb-3">
        <label for="report_name" class="form-label">Report Name</label>
        <input type="text" name="report_name" id="report_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="report_file" class="form-label">Upload Report File</label>
        <input type="file" name="report_file" id="report_file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload Report</button>
</form>
        </div>
    </div>
    <div class="alert alert-primary mb-0 mt-3">
                    <div>Changes you made are now live on the Home page.</div>
                    <a href="<?php echo ABS_URL ?>investors" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
    </div>
    <div class="col-lg-7 order-1">
        
        <div class="card">
            <div class="card-header">
            <h5 >Manage Financial Reports</h5>
            </div>
            <div class="card-body">
            <table class="table table-bordered bg-white">
    <thead class="table-secondary">
        <tr>
            <th>ID</th>
            <th>Report Name</th>
            <th>File</th>
            <th>Uploaded On</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $serialNo = 1; ?>
        <?php foreach ($reports as $r): ?>
            <tr>
            <td><?= $serialNo++ ?></td> <!-- Display serial number -->
                <td><?= htmlspecialchars($r['report_name']) ?></td>
                <td><a href="uploads/<?= $r['report_file'] ?>" target="_blank">Download</a></td>
                <td><?= $r['created_at'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?delete=<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this report?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (empty($reports)): ?>
            <tr><td colspan="5" class="text-center">No reports found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
<?php if ($totalReports > $limit): ?>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="btn btn-sm btn-primary">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" class="btn btn-sm <?= $i == $page ? 'btn-info' : 'btn-light' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?= $page + 1 ?>" class="btn btn-sm btn-primary">Next</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
</div>


            </div>
        </div>
    </div>
   </div>
</div>
</body>
</html>
