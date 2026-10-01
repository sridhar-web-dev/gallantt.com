<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Unauthorized access."]);
    exit();
}

$report = new CorporateReport();

$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$uploadDir = 'uploads/';
$uploadFile = '';

if (isset($_FILES['doc']) && $_FILES['doc']['error'] == 0) {
    // Generate a unique filename
    $extension = pathinfo($_FILES['doc']['name'], PATHINFO_EXTENSION);
    $randomNumber = rand(100, 999);
    $uniqueName = "REPORT_" . date("YmdHis") . "_$randomNumber.$extension";
    $uploadFile = $uploadDir . $uniqueName;

    if (move_uploaded_file($_FILES['doc']['tmp_name'], $uploadFile)) {
        $uploadFile = $uniqueName; // Store only filename in DB
    } else {
        echo json_encode(["status" => "error", "message" => "File upload failed."]);
        exit();
    }
} else {
    echo json_encode(["status" => "error", "message" => "No document uploaded."]);
    exit();
}

if ($title && $description && $uploadFile) {
    $result = $report->addReport($title, $description, $uploadFile);
    if ($result) {
        echo json_encode(["status" => "success", "message" => "Report submitted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error. Report not saved."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
}
?>
