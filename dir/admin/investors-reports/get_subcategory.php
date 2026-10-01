<?php
require_once '../../../config/config.php';
$db = Database::getDB();
if (isset($_GET['cat_id'])) {
    $categoryId = $_GET['cat_id'];
    
    $stmt = $db->prepare("SELECT * FROM web_reportsubcategories WHERE category_id = ?");
    $stmt->execute([$categoryId]);
    $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($subcategories);
}
?>
