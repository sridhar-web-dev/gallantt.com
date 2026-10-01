<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$report = new FinancialReport();

if (!isset($_GET['id'])) {
    header("Location: financial-report-manage.php");
    exit;
}

$id = (int) $_GET['id'];
$data = $report->getReportById($id);

if (!$data) {
    echo "Report not found.";
    exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reportName = trim($_POST['report_name']);
    $file = $_FILES['report_file'] ?? null;
    $newFile = '';
    $id = $_GET['id']; // Ensure this is securely validated in real-world use

    if ($reportName === '') {
        $msg = 'Report name is required.';
    } else {
        if ($file && $file['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $allowed = ['pdf', 'docx', 'xlsx'];
            if (!in_array(strtolower($ext), $allowed)) {
                $msg = 'Invalid file type.';
            } else {
                // 1. Get existing file path
                $stmt = Database::getDB()->prepare("SELECT report_file FROM web_financialreports WHERE id = ?");
                $stmt->execute([$id]);
                $existing = $stmt->fetch(PDO::FETCH_ASSOC);

                                $path = 'uploads/' . $existing['report_file'];
                if ($existing && !empty($existing['report_file']) && file_exists($path)) {
                    unlink($path);
                }


                // 3. Generate new file name
                $datePart = date('Y_m_d');
                $randomNum = rand(100, 999);
                $newFilename = "FINAL_REPORT_{$datePart}_{$randomNum}." . $ext;
                $newFile = 'uploads/' . $newFilename;

                // 4. Move new file
                move_uploaded_file($file['tmp_name'], $newFile);
            }
        }

        // 5. Update DB
        if ($report->updateReport($id, $reportName, $newFilename ?: null)) {
            clearVarnishCache();
            header("Location: index.php");
            exit;
        } else {
            $msg = 'Failed to update report.';
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Financial Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2>Edit Report</h2>
    <?php if ($msg): ?>
        <div class="alert alert-danger"><?= $msg ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="report_name" class="form-label">Report Name</label>
            <input type="text" name="report_name" id="report_name" value="<?= htmlspecialchars($data['report_name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="report_file" class="form-label">Upload New File (Optional)</label>
            <input type="file" name="report_file" id="report_file" class="form-control">
            <small>Current File: <a href="<?= $data['report_file'] ?>" target="_blank">Download</a></small>
        </div>
        <button type="submit" class="btn btn-primary">Update Report</button>
        <a href="financial-report-manage.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
