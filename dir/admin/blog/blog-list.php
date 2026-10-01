<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Listings</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .blog-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .blog-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .blog-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: blog-wireframe-shimmer 1.2s linear infinite; }
        .blog-wireframe-line.short { width: 58%; }
        .blog-wireframe-line.long { width: 84%; }
        @keyframes blog-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .blog-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
<div id="blogLoader" class="blog-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="blog-loader-card">
        <div class="blog-wireframe-line short"></div>
        <div class="blog-wireframe-line long"></div>
        <div class="blog-wireframe-line long"></div>
        <div class="blog-loader-text">Deleting blog...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
        <div class="card">
        <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
            <h2>Blog Listings</h2>
            <a href="blog-form.php" class="btn btn-secondary ">Add New Blog</a>
        </div>
        <div class="card-body">
       <div class="table-responsive">
       <div id="blogTableContainer"></div> <!-- Only this will load the table dynamically -->
<!-- Hide pagination if total blogs are less than the limit -->
<?php if ($totalBlogs > $limit) : ?>
    <div class="pagination mt-3">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <button class="btn <?= $i == $page ? 'btn-primary' : 'btn-light' ?> page-link" data-page="<?= $i ?>"><?= $i ?></button>
        <?php endfor; ?>
    </div>
<?php endif; ?>
       </div>
        </div>
    </div>
        </div>
        <div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Blog page.</div>
                    <a href="<?php echo ABS_URL; ?>blogs/1/" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteBlog', function() {
        if (confirm('Are you sure you want to delete this blog?')) {
            var blogId = $(this).data('id');
            var deleteButton = $(this);
            var loader = document.getElementById('blogLoader');
            loader.style.display = 'flex';
            loader.setAttribute('aria-hidden', 'false');
            deleteButton.prop('disabled', true);
            $.ajax({
                url: 'delete-blog.php', // create this file
                type: 'POST',
                data: { blog_id: blogId },
                success: function(response) {
                    alert(response);
                    location.reload(); // reload after delete
                },
                error: function() {
                    loader.style.display = 'none';
                    loader.setAttribute('aria-hidden', 'true');
                    deleteButton.prop('disabled', false);
                    alert('Failed to delete blog. Please try again.');
                }
            });
        }
    });

    // Toggle blog status (Enable/Disable)
    $(document).on('click', '.toggleStatus', function() {
        var blogId = $(this).data('id');
        var currentStatus = $(this).data('status');
        var newStatus = currentStatus == 1 ? 0 : 1;
        $.ajax({
            url: 'toggle-blog-status.php', // create this file
            type: 'POST',
            data: { blog_id: blogId, status: newStatus },
            success: function(response) {
                alert(response);
                location.reload(); // reload after status change
            }
        });
    });

    function loadBlogs(page) {
        $.ajax({
            url: "fetch-blog.php",
            type: "POST",
            data: { page: page },
            success: function(response) {
                $("#blogTableContainer").html(response);
            }
        });
    }
    // Load first page on document ready
    loadBlogs(1);
    // Handle pagination click
    $(document).on("click", ".page-link", function() {
        let page = $(this).data("page");
        loadBlogs(page);
    });
});
</script>
</html>
