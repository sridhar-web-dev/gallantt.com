<?php
require_once '../../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $resourceObj = new Resources();
    $pdo = Database::getDB(); // Use your static Database class

    $resourceId = (int) ($_POST['resource_id'] ?? 0);
    $categoryId = (int) ($_POST['category_id'] ?? 0);
    $newCategory = trim($_POST['new_category'] ?? '');
    $resourceName = trim($_POST['resource_name'] ?? '');
    $file = $_FILES['resource_file'] ?? null;

    if (!$resourceId || !$resourceName) {
        echo 'Resource ID and name are required.';
        exit;
    }

    $existingResource = $resourceObj->getResourceById($resourceId);
    if (!$existingResource) {
        echo 'Resource not found.';
        exit;
    }

    // If new category is entered
    if (!empty($newCategory)) {
        $categoryId = $resourceObj->addCategory($newCategory);
    }

    $updateData = [
        ':resource_id' => $resourceId,
        ':category_id' => $categoryId,
        ':resource_name' => $resourceName
    ];

    $sql = "UPDATE web_resources SET category_id = :category_id, resource_name = :resource_name";

    if (!$categoryId && $newCategory !== '') {
        $categoryId = (int) $resourceObj->addCategory($newCategory);
    }
    if (!$categoryId) {
        echo 'Category is required.';
        exit;
    }

    $oldFilePath = null;
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        if ($file['size'] > 50 * 1024 * 1024) {
            echo 'File size must not exceed 50 MB.';
            exit;
        }
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['pdf', 'doc', 'docx', 'mp4', 'mov', 'avi'];

        if (!in_array($ext, $allowed)) {
            echo 'Invalid file type.';
            exit;
        }

        $uploadDir = ABS_PATH . 'uploads/resource/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = "RES_" . date('Y_m_d_H_i_s') . "_" . rand(100, 999) . "." . $ext;
        $targetPath = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $updateData[':file_path'] = $filename;
            $oldFilePath = $existingResource['file_path'];
            $sql .= ", file_path = :file_path";
        } else {
            echo 'File upload failed.';
            exit;
        }
    }

    $sql .= " WHERE id = :resource_id";

    $stmt = $pdo->prepare($sql);
    if (!$stmt->execute($updateData)) {
        if (isset($targetPath) && is_file($targetPath)) {
            unlink($targetPath);
        }
        echo 'Failed to update resource.';
        exit;
    }
    if ($oldFilePath && !filter_var($oldFilePath, FILTER_VALIDATE_URL)) {
        $oldPath = ABS_PATH . 'uploads/resource/' . basename($oldFilePath);
        if (is_file($oldPath)) {
            unlink($oldPath);
        }
    }
    clearVarnishCache();

    echo 'Resource updated successfully.';
}
