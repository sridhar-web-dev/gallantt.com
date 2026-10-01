<?php
require_once '../../../../config/config.php';

if (!empty($_POST['id'])) {
    $db = Database::getDB();
    $stmt = $db->prepare("DELETE FROM web_sections WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    clearVarnishCache();
    echo 'Deleted';
}
