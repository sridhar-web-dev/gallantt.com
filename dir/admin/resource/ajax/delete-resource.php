<?php
require_once '../../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $resourceId = $_POST['id'];
        $resourceObj = new Resources();

        // Fetch the resource data to get the file path before deleting
        $resource = $resourceObj->getResourceById($resourceId);
        if ($resource) {
            // Delete the resource file from the server
            $filePath = ABS_PATH . 'uploads/resource/' . basename($resource['file_path']);
            // Now delete the resource from the database
            $dbConn = Database::getDB();
            $stmt = $dbConn->prepare("DELETE FROM web_resources WHERE id = :resource_id");
            $stmt->bindParam(':resource_id', $resourceId, PDO::PARAM_INT);
            if ($stmt->execute()) {
                if (is_file($filePath)) {
                    unlink($filePath);
                }
                clearVarnishCache();
                echo 'Resource deleted successfully.';
            } else {
                echo 'Failed to delete the resource.';
            }
        } else {
            echo 'Resource not found.';
        }
    } else {
        echo 'No resource ID provided.';
    }
}
