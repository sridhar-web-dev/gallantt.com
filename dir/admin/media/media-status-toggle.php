<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo "Unauthorized request.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["media_id"], $_POST["status"])) {
    $mediaId = intval($_POST["media_id"]);
    $newStatus = $_POST["status"] === "live" ? "live" : "disabled";
    $media = new Media();
    $result = $media->updateMediaStatus($mediaId, $newStatus);
    if ($result) {
        clearVarnishCache();
        echo "Media status updated successfully!";
    } else {
        echo "Failed to update media status.";
    }
} else {
    echo "Invalid request.";
}
?>
