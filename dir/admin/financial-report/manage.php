<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$report = new FinancialReport();
$reports = $report->getAllReports();

// Handle delete action
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    // 1. Fetch existing report info
    $existing = $report->getReportById($id);

    // 2. Delete the file from uploads folder
    
    $path = 'uploads/' . $existing['report_file'];
    if ($existing && !empty($existing['report_file']) && file_exists($path)) {
        unlink($path);
    }
    // 3. Delete the record from DB
    $report->deleteReport($id);
    clearVarnishCache();

    header("Location: manage.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Financial Report</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body class="bg-light">
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
    <h2 class="mb-4">Manage Financial Reports</h2>
    <table class="table table-bordered bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Report Name</th>
                <th>File</th>
                <th>Uploaded On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= htmlspecialchars($r['report_name']) ?></td>
                    <td><a href="<?= $r['report_file'] ?>" target="_blank">Download</a></td>
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
</div>
</body>
</html>


