<?php
header('Content-Type: text/html');
require_once '../../../../config/config.php';

// Temporarily enable error display (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $resourceObj = new Resources();

    $category_id = (int) ($_POST['category_id'] ?? 0);
    $new_category = trim($_POST['new_category'] ?? '');
    $resource_name = trim($_POST['resource_name'] ?? '');
    $fileType = $_POST['file_type'] ?? '';
    $youtubeLink = trim($_POST['youtube_link'] ?? '');
    $file = $_FILES['resource_file'] ?? null;

    if (!$category_id && $new_category !== '') {
        $category_id = (int) $resourceObj->addCategory($new_category);
    }

// Validate input
if (!$category_id || !$resource_name || !$fileType) {
    echo 'All fields are required.';
    exit;
}

if ($fileType === 'doc') {
    if (!$file || $file['error'] !== 0) {
        echo 'Please upload a valid document file.';
        exit;
    }

    if ($file['size'] > 50 * 1024 * 1024) {
        echo 'File size must not exceed 50 MB.';
        exit;
    }

    $allowed = ['pdf', 'doc', 'docx'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        echo 'Invalid file type. Only pdf, doc, docx allowed for documents.';
        exit;
    }

    $uploadDir = ABS_PATH . 'uploads/resource/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $timestamp = date('Y_m_d_His');
    $randomNumber = rand(100, 999);
    $filename = "RES_" . $timestamp . "_" . $randomNumber . "_" . basename($file['name']);
    $targetPath = $uploadDir . $filename;
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        echo 'File upload failed.';
        exit;
    }
    $filePath = $filename;

} elseif ($fileType === 'video') {
    if (!$youtubeLink || !preg_match('/^https?:\/\/(www\.)?(youtube\.com|youtu\.be)\//', $youtubeLink)) {
        echo 'Invalid YouTube link.';
        exit;
    }
    $filePath = $youtubeLink;

} else {
    echo 'Invalid media type selected.';
    exit;
}

// Prepare data and save
$data = [
    ':category_id' => $category_id,
    ':resource_name' => $resource_name,
    ':file_type' => $fileType,
    ':file_path' => $filePath
];

if ($resourceObj->addResource($data)) {
    clearVarnishCache();
    echo 'Resource added successfully.';
} else {
    if ($fileType === 'doc' && isset($targetPath) && is_file($targetPath)) {
        unlink($targetPath);
    }
    echo 'Failed to save resource.';
}

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
