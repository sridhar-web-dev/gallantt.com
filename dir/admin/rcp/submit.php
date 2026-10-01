<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stateId = $_POST['state_id'];
    $districtId = $_POST['district_id'];
    $productId = $_POST['product_id'];
    $sections = [];

    foreach ($_POST['section'] as $index => $sec) {
        $sections[] = [
            'section' => $sec,
            'price' => $_POST['price'][$index]
        ];
    }

    $handler = new FormHandler();
    if (!$handler->insertData($stateId, $districtId, $productId, $sections)) {
        http_response_code(500);
        exit('Failed to save RCP data.');
    }
    clearVarnishCache();
    header('Location: index.php');
}
