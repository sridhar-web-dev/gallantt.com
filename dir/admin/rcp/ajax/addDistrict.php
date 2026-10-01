<?php
require_once '../../../../config/config.php';
$db = Database::getDB();

if (!empty($_POST['state_id']) && !empty($_POST['name'])) {
    $stmt = $db->prepare("INSERT INTO web_districts (state_id, name) VALUES (?, ?)");
    $stmt->execute([$_POST['state_id'], trim($_POST['name'])]);
    $id = $db->lastInsertId();
    clearVarnishCache();
    echo json_encode(['id' => $id, 'name' => $_POST['name']]);
}
