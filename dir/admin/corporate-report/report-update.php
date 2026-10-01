<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Unauthorized access."]);
    exit();
}

$report = new CorporateReport();

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$uploadDir = '../../../uploads/corporate-report/uploads/';
$uploadFile = '';

// Fetch existing report details
$existingReport = $report->getReportById($id);
if (!$existingReport) {
    echo json_encode(["status" => "error", "message" => "Report not found."]);
    exit();
}

// Handle file upload if a new document is uploaded
if (isset($_FILES['doc']) && $_FILES['doc']['error'] == 0) {
    $fileName = 'REPORT_' . date("YmdHis") . '_' . rand(100, 999) . '.' . pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
    $uploadFile = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['doc']['tmp_name'], $uploadFile)) {
        $uploadFile = $fileName; // Store only filename in DB
        // Delete the old document if a new one is uploaded
        if (!empty($existingReport['doc']) && file_exists($uploadDir . $existingReport['doc'])) {
            unlink($uploadDir . $existingReport['doc']);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "File upload failed."]);
        exit();
    }
} else {
    // Keep the existing document if no new file is uploaded
    $uploadFile = $existingReport['doc'];
}

// Ensure required fields are filled
if ($id && $title && $description && $uploadFile) {
    $result = $report->updateReport($id, $title, $description, $uploadFile);
    if ($result) {
        clearVarnishCache();
        echo json_encode(["status" => "success", "message" => "Report updated successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error. Report not updated."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
}
?>
