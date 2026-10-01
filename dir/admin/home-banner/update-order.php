<?php
require_once '../../../config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
    $order = $_POST['order'];  // The array with new order of IDs
    try {
        // Get the database connection
        $db = Database::getDB();
        // Prepare the SQL query to update order
        $stmt = $db->prepare("UPDATE web_banners SET `order` = :position WHERE id = :id");
        // Update order starting from 1
        foreach ($order as $position => $id) {
            // Increment position by 1 to start from 1
            $stmt->execute([
                ':position' => $position + 1,  // Add 1 to start order from 1
                ':id' => $id
            ]);
        }
        clearVarnishCache();
        echo "success";  // Return success message
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
}
?>
