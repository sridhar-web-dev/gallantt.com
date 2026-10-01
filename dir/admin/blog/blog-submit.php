<?php
require_once '../../../config/config.php';
$blog = new Blog();
$title = $_POST['title'];
$description = $_POST['description'];
$blog_id = $_POST['blog_id'] ?? null;
$uploadDir = ABS_PATH . 'uploads/blog/uploads/';

if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
    echo "Error creating blog upload directory.";
    exit;
}

// Check if a new image is uploaded
if (!empty($_FILES['image']['name'])) {
    $oldImagePath = null;
    // Get existing blog details
    if ($blog_id) {
        $existingBlog = $blog->getBlogById($blog_id);
        $oldImagePath = $uploadDir . basename($existingBlog['image'] ?? '');
    }
    // Generate a unique filename
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // Get file extension
    $unique_name = "BLOG_" . date('YmdHis') . "_" . rand(100, 999) . "." . $ext;
    // Upload new image
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $unique_name)) {
        echo "Error uploading blog image.";
        exit;
    }
    if ($oldImagePath && file_exists($oldImagePath)) {
        unlink($oldImagePath);
    }
} else {
    // If no new image is uploaded, retain the old image
    if ($blog_id) {
        $existingBlog = $blog->getBlogById($blog_id);
        $unique_name = $existingBlog['image']; // Keep the existing image
    } else {
        $unique_name = ''; // Set empty image if it's a new blog post
    }
}
// Check if updating or creating
if (!empty($blog_id)) {
    $result = $blog->updateBlog($blog_id, $title, $unique_name, $description);
    if ($result) {
        clearVarnishCache();
        echo "Blog updated successfully!";
    } else {
        echo "Error saving blog.";
    }
} else {
    $status = '1';
    $result = $blog->createBlog($title, $unique_name, $description, $status);
    if ($result) {
        clearVarnishCache();
        echo "Blog saved successfully!";
    } else {
        echo "Error saving blog.";
    }
    
}
?>
