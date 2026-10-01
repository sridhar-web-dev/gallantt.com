<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Unauthorized access."]);
    exit();
}

$report = new CorporateReport();

$id = $_POST['id'] ?? '';

if (!$id) {
    echo json_encode(["status" => "error", "message" => "Invalid request. Report ID is required."]);
    exit();
}

// Fetch report details to delete the associated document
$existingReport = $report->getReportById($id);
if (!$existingReport) {
    echo json_encode(["status" => "error", "message" => "Report not found."]);
    exit();
}

// Delete the document file from the server if it exists
$uploadDir = '../../../uploads/corporate-report/uploads/';
if (!empty($existingReport['doc']) && file_exists($uploadDir . $existingReport['doc'])) {
    unlink($uploadDir . $existingReport['doc']);
}

// Delete the report from the database
$result = $report->deleteReport($id);
if ($result) {
    clearVarnishCache();
    echo json_encode(["status" => "success", "message" => "Report deleted successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Database error. Report not deleted."]);
}
?>
