<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$blog = new Blog();
$blogData = null;
if (isset($_GET['blog_id'])) {
    $blogData = $blog->getBlogById($_GET['blog_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= isset($blogData) ? 'Edit Blog' : 'Create Blog' ?></title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <!-- CKEditor 5 CDN -->
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
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
        <div class="blog-loader-text" id="blogLoaderText">Saving blog...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
        <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2><?= isset($blogData) ? 'Edit Blog' : 'Create Blog' ?></h2>
            
            <a href="blog-list.php" class="btn btn-secondary ">Manage Blog</a>
        </div>
        <div class="card-body">
        <div id="message" class="mt-3"></div>
            <form id="blogForm" enctype="multipart/form-data">
                <input type="hidden" name="blog_id" value="<?= $blogData['blog_id'] ?? '' ?>">
                <div class="mb-3">
                    <label>Blog Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $blogData['title'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
    <label>Blog Image</label>
    <div id="imagePreview" class="mb-2">
        <?php if (isset($blogData)) : ?>
            <img src="<?= ABS_URL ?>uploads/blog/uploads/<?= htmlspecialchars($blogData['image']) ?>" id="previewImg" width="100" class="border p-1">
        <?php else : ?>
            <img src="#" id="previewImg" width="100" class="border p-1" style="display: none;">
        <?php endif; ?>
    </div>
    <input type="file" class="form-control" name="image" id="imageInput" <?= isset($blogData) ? '' : 'required' ?>>
</div>
                <div class="mb-3">
                    <label>Blog Description</label>
                    <textarea id="editor" class="form-control" name="description" required style="position: absolute; left: -9999px;"><?= $blogData['description'] ?? '' ?>
</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="submitButton"><?= isset($blogData) ? 'Update' : 'Submit' ?></button>
            </form>
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
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
      $(document).ready(function() {
    let blogEditor;
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            blogEditor = editor;
            editor.ui.view.editable.element.style.minHeight = '300px'; // Set editor height
            // Remove required attribute from the hidden textarea to prevent validation issues
            $("textarea[name='description']").removeAttr('required');
        })
        .catch(error => {
            console.error("CKEditor initialization failed:", error);
        });
    // Image Preview on File Change
    $("#imageInput").change(function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#previewImg").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });
    // Form Submission with CKEditor Content
    $("#blogForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $("#submitButton");

        if (submitButton.prop("disabled")) {
            return;
        }

        // Ensure CKEditor is initialized before accessing getData()
        if (blogEditor) {
            let editorContent = blogEditor.getData().trim(); // Trim to prevent spaces being counted
            $("textarea[name='description']").val(editorContent);
            // If CKEditor is empty, prevent form submission and show an error
            if (editorContent === "") {
                $("#message").html('<div class="alert alert-danger">Blog description is required.</div>');
                return;
            }
        } else {
            console.warn("CKEditor not initialized. Submitting empty content.");
            $("textarea[name='description']").val(""); // Fallback to empty text
        }

        const blogLoader = document.getElementById("blogLoader");
        const blogLoaderText = document.getElementById("blogLoaderText");
        blogLoaderText.textContent = "<?= isset($blogData) ? 'Updating blog...' : 'Creating blog...' ?>";
        blogLoader.style.display = "flex";
        blogLoader.setAttribute("aria-hidden", "false");
        submitButton.prop("disabled", true).text("Processing...");

        var formData = new FormData(this);
        $.ajax({
            url: "blog-submit.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $("#message").html(response).addClass('alert alert-success');
                setTimeout(() => window.location.href = 'blog-list.php', 2000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                $("#message").html('<div class="alert alert-danger">Submission failed. Please try again.</div>');
                blogLoader.style.display = "none";
                blogLoader.setAttribute("aria-hidden", "true");
                submitButton.prop("disabled", false).text("<?= isset($blogData) ? 'Update' : 'Submit' ?>");
            }
        });
    });
});
</script>
</body>
</html>
