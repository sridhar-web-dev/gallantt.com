<?php
require_once '../../../config/config.php';

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
    <!-- CKEditor 5 CDN -->
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2><?= isset($blogData) ? 'Edit Blog' : 'Create Blog' ?></h2>
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
            <img src="uploads/<?= $blogData['image'] ?>" id="previewImg" width="100" class="border p-1">
        <?php else : ?>
            <img src="#" id="previewImg" width="100" class="border p-1" style="display: none;">
        <?php endif; ?>
    </div>
    <input type="file" class="form-control" name="image" id="imageInput" <?= isset($blogData) ? '' : 'required' ?>>
</div>


                <div class="mb-3">
                    <label>Blog Description</label>
                    <textarea id="editor" class="form-control" name="description" required><?= $blogData['description'] ?? '' ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100"><?= isset($blogData) ? 'Update' : 'Submit' ?></button>
            </form>
            
        </div>
    </div>
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
      

$(document).ready(function() {
    let blogEditor;
    ClassicEditor
    .create(document.querySelector('#editor'), {
        
        height: 300, // Initial height
        autoGrow_onStartup: true,
        autoGrow_minHeight: 300, // Minimum height
        autoGrow_maxHeight: 600, // Maximum height (Adjust as needed)
        autoGrow_bottomSpace: 50 // Extra space at bottom
    })
    .then(editor => {
        blogEditor = editor;
        editor.ui.view.editable.element.style.minHeight = '300px'; 
    })
    .catch(error => {
        console.error(error);
    });
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
    $("#blogForm").on("submit", function(e) {
        e.preventDefault();
        $("textarea[name='description']").val(blogEditor.getData());
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
            }
        });
    });
});
</script>
</body>
</html>
