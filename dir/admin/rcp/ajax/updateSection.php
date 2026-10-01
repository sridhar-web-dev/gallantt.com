<?php
require_once '../../../../config/config.php';

if ($_POST['id'] && $_POST['field'] && isset($_POST['value'])) {
    $db = Database::getDB();
    $stmt = $db->prepare("UPDATE sections SET {$_POST['field']} = ? WHERE id = ?");
    $stmt->execute([$_POST['value'], $_POST['id']]);
    clearVarnishCache();
    echo 'Updated';
}
