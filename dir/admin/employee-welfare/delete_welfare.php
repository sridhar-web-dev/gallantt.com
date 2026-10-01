<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sno'])) {
        $db = Database::getDB();

        $stmt = $db->prepare("SELECT image FROM web_employeewelfare WHERE id = ?");
        $stmt->execute([$_POST['sno']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Adjust path since uploads/ is in the same directory
            $imagePath = realpath(__DIR__ . '/' . $row['image']);

            if ($imagePath && strpos($imagePath, realpath(__DIR__ . '/uploads')) === 0) {
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                } else {
                    error_log("Image file not found: " . $imagePath);
                }
            }

            $stmtDelete = $db->prepare("DELETE FROM web_employeewelfare WHERE id = ?");
            $stmtDelete->execute([$_POST['sno']]);
            clearVarnishCache();

            $_SESSION['message'] = ['type' => 'success', 'text' => 'Record deleted successfully'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => 'Record not found'];
        }
    }
}

header('Location: index.php');
exit;
