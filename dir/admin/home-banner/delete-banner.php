<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bannerId = $_POST['id'] ?? null;

    if ($bannerId) {
        // Use Banner class to delete the banner
        $result = Banner::deleteBanner($bannerId);

        if ($result === "Banner deleted successfully.") {
            clearVarnishCache();
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error'; // No banner ID provided
    }
}
?>
