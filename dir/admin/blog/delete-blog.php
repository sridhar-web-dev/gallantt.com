<?php
require_once '../../../config/config.php';
$blog = new Blog();

if (isset($_POST['blog_id'])) {
    $blogId = $_POST['blog_id'];
    $deleted = $blog->deleteBlog($blogId);
    if ($deleted) {
        clearVarnishCache();
        echo "Blog deleted successfully.";
    } else {
        echo "Failed to delete blog.";
    }
} else {
    echo "Invalid request.";
}
?>
