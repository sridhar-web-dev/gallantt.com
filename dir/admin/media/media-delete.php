<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Unauthorized request.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["media_id"])) {
    $media = new Media();
    if ($media->deleteMedia($_POST["media_id"])) {
        clearVarnishCache();
        echo "Media deleted successfully.";
    } else {
        echo "Failed to delete media.";
    }
} else {
    echo "Invalid request.";
}
?>
