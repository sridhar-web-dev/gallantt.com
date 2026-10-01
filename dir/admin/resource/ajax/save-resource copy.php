<?php
header('Content-Type: text/html');
require_once '../../../../config/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $resourceObj = new Resources();

    $category_id = $_POST['category_id'] ?? '';
    $new_category = trim($_POST['new_category'] ?? '');
    $resource_name = trim($_POST['resource_name'] ?? '');
    $file_type = $_POST['file_type'] ?? '';
    $youtube_link = trim($_POST['youtube_link'] ?? '');
    $file = $_FILES['resource_file'] ?? null;

    // Handle new category if provided
    if (!$category_id && $new_category) {
        $category_id = $resourceObj->addCategory($new_category);
    }

    // Basic validations
    if (!$category_id || !$resource_name || !$file_type) {
        echo 'Category, Resource Name, and Media Type are required.';
        exit;
    }

    $file_path = '';

    if ($file_type === 'doc') {
        // Check if file is uploaded
        if (!$file || $file['error'] !== 0) {
            echo 'Please upload a valid document.';
            exit;
        }

        // Allowed doc types
        $allowed = ['pdf', 'doc', 'docx'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            echo 'Invalid document type. Only pdf, doc, docx allowed.';
            exit;
        }

        // Upload file
        $uploadDir = "../uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $timestamp = date('Y_m_d_His');
        $randomNumber = rand(100, 999);
        $filename = "RES_" . $timestamp . "_" . $randomNumber . "_" . basename($file['name']);
        $targetPath = $uploadDir . $filename;

        move_uploaded_file($file['tmp_name'], $targetPath);
        $file_path = $filename;

    } elseif ($file_type === 'video') {
        if (!$youtube_link || !filter_var($youtube_link, FILTER_VALIDATE_URL)) {
            echo 'Please enter a valid YouTube URL.';
            exit;
        }

        $file_path = $youtube_link; // Save link as file_path
    } else {
        echo 'Invalid media type.';
        exit;
    }

    // Insert resource into DB
    $data = [
        ':category_id' => $category_id,
        ':resource_name' => $resource_name,
        ':file_type' => $file_type,
        ':file_path' => $file_path
    ];
    $resourceObj->addResource($data);

    echo 'Resource added successfully.';
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
