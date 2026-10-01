<?php
require_once '../../../../config/config.php';
$db = Database::getDB(); // returns PDO instance
$response = ['success' => false, 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['product_name'])) {
    $name = trim($_POST['product_name']);

    $stmt = $db->prepare("INSERT INTO web_products (name) VALUES (:name)");
    $success = $stmt->execute([':name' => $name]);

    if ($success) {
        clearVarnishCache();
        $response = [
            'success' => true,
            'id' => $db->lastInsertId(),
            'name' => $name
        ];
    } else {
        $response['message'] = 'Insert failed';
    }
}

echo json_encode($response);
