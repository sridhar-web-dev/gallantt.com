<?php
require_once '../../../config/config.php';

$report = new InvestorReport();

$category_id = $_POST['category_id'] ?? '';
$name = $_POST['subcategory_name'] ?? '';

if (!empty($category_id) && !empty($name)) {
    $result = $report->addSubcategory($category_id, $name);
    clearVarnishCache();
    echo json_encode(['success' => true] + $result);
} else {
    echo json_encode(['success' => false, 'message' => 'Subcategory name and category ID are required']);
}
?>
