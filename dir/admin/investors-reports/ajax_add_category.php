<?php
require_once '../../../config/config.php';
$report = new InvestorReport();

$name = $_POST['category_name'];
if (!empty($name)) {
    $result = $report->addCategory($name);
    clearVarnishCache();
    echo json_encode(['success' => true] + $result);
} else {
    echo json_encode(['success' => false, 'message' => 'Category name is required']);
}
