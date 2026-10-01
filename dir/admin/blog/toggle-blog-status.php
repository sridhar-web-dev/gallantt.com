<?php
require_once '../../../config/config.php';
$blog = new Blog();

if (isset($_POST['blog_id']) && isset($_POST['status'])) {
    $blogId = $_POST['blog_id'];
    $status = $_POST['status'];
    $updated = $blog->updateBlogStatus($blogId, $status);

    echo $updated ? "Blog status updated successfully." : "Failed to update blog status.";
} else {
    echo "Invalid request.";
}
?>
