<?php
require_once 'autoload.php';
require_once 'config.php';

$report = new Report();
$currentReport = $report->getReport();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['report'])) {
    $file = $_FILES['report'];
    if ($file['error'] === 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'report_' . time() . '.' . $ext;
        $targetPath = __DIR__ . '/uploads/' . $filename;

        // Delete old if exists
        if ($currentReport) {
            $report->deleteOldReport($currentReport['filename']);
        }

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $report->uploadNewReport($filename);
            $message = "Report uploaded successfully.";
            $currentReport = $report->getReport();
        } else {
            $message = "Failed to upload report.";
        }
    } else {
        $message = "File error.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Report</title>
</head>
<body>
    <h2>Upload Report</h2>
    <?php if ($message): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <?php if ($currentReport): ?>
        <p><strong>Note:</strong> A report already exists. Please upload a new one to replace it.</p>
        <p><a href="uploads/<?= $currentReport['filename'] ?>" target="_blank">Download Current Report</a></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label>Select Report (PDF/DOC etc.):</label>
        <input type="file" name="report" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
