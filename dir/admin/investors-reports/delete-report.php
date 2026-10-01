<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$reportId = $_GET['id'];
$report = new InvestorReport();

// Call the method to delete the report
if ($report->deleteReport($reportId)) {
    clearVarnishCache();
    header("Location: index.php");
    exit();
} else {
    echo "Failed to delete report.";
}
?>
