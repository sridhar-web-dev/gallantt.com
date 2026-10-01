<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$video = new HomepageVideo();
$current = $video->getAllVideos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Video Upload</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">

    <!-- jQuery -->
    <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
    <style>
        .video-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .video-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .video-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: video-wireframe-shimmer 1.2s linear infinite; }
        .video-wireframe-line.short { width: 58%; }
        .video-wireframe-line.long { width: 84%; }
        @keyframes video-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .video-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div id="videoLoader" class="video-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="video-loader-card">
        <div class="video-wireframe-line short"></div>
        <div class="video-wireframe-line long"></div>
        <div class="video-wireframe-line long"></div>
        <div class="video-loader-text" id="videoLoaderText">Saving video...</div>
    </div>
</div>
<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$video = new HomepageVideo();
$current = $video->getAllVideos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Video Upload</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">

    <!-- jQuery -->
    <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <section class="card shadow-sm p-4">
        <h1 class="h4 mb-4">Homepage Video Upload</h1>

        <form id="videoUploadForm" enctype="multipart/form-data" novalidate>
           

            <div class="mb-3">
                <label for="homepage_video" class="form-label">Upload New Video (Max 50MB):</label>
                <input type="file" name="homepage_video" id="homepage_video" class="form-control" accept="video/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload / Update</button>
        </form>

        <div id="videoResponse" class="mt-3" role="alert"></div>
    </section>
        </div>
        <div class="col-lg-6">
            <?php if (!empty($current)): ?>
    <h5 class="mt-5 mb-3">Uploaded Videos</h5>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Preview</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($current as $index => $vid): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td>
                    <video width="150" height="150" controls>
                        <source src="<?= ABS_URL ?>dir/admin/home-banner/uploads/videos/<?= htmlspecialchars($vid['video_name']) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="<?= $vid['id'] ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
   
// DELETE functionality
$(document).on("click", ".deleteBtn", function () {
    const id = $(this).data("id");

    if (confirm("Are you sure you want to delete this video?")) {
        const videoLoader = document.getElementById("videoLoader");
        document.getElementById("videoLoaderText").textContent = "Deleting video...";
        videoLoader.style.display = "flex";
        videoLoader.setAttribute("aria-hidden", "false");
        $(this).prop("disabled", true);
        $.post("ajax_delete_video.php", { id }, function (res) {
            const data = JSON.parse(res);
            videoLoader.style.display = "none";
            videoLoader.setAttribute("aria-hidden", "true");
            alert(data.msg);
            if (data.status) location.reload();
        });
    }
});



    $("#videoUploadForm").on("submit", function (e) {
    e.preventDefault();

    let fileInput = $("#homepage_video")[0];
    let file = fileInput.files[0];

    if (!file) {
        $("#videoResponse").html(`<div class="alert alert-danger">Please select a video file.</div>`);
        return;
    }

    // Validate file type
    if (!file.type.startsWith("video/")) {
        $("#videoResponse").html(`<div class="alert alert-danger">Only video files are allowed.</div>`);
        return;
    }

    // Validate file size (50MB = 50 * 1024 * 1024 bytes)
    if (file.size > 50 * 1024 * 1024) {
        $("#videoResponse").html(`<div class="alert alert-danger">File size must be less than 50MB.</div>`);
        return;
    }

    // If validation passed, continue upload
    let formData = new FormData(this);
    const videoLoader = document.getElementById("videoLoader");
    document.getElementById("videoLoaderText").textContent = "Uploading video...";
    videoLoader.style.display = "flex";
    videoLoader.setAttribute("aria-hidden", "false");
    $(this).find("button[type='submit']").prop("disabled", true).text("Processing...");

    $.ajax({
        url: "ajax_upload_video.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            let data = JSON.parse(res);
            $("#videoResponse").html(`
                <div class="alert alert-${data.status ? 'success' : 'danger'}">${data.msg}</div>
            `);
            if (data.status) {
                setTimeout(() => location.reload(), 2000);
            } else {
                videoLoader.style.display = "none";
                videoLoader.setAttribute("aria-hidden", "true");
                $("#videoUploadForm button[type='submit']").prop("disabled", false).text("Upload / Update");
            }
        },
        error: function () {
            videoLoader.style.display = "none";
            videoLoader.setAttribute("aria-hidden", "true");
            $("#videoUploadForm button[type='submit']").prop("disabled", false).text("Upload / Update");
            $("#videoResponse").html('<div class="alert alert-danger">Video upload failed. Please try again.</div>');
        }
    });
});

});
</script>

</body>
</html>


<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
   

    $("#videoUploadForm").on("submit", function (e) {
    e.preventDefault();

    let fileInput = $("#homepage_video")[0];
    let file = fileInput.files[0];

    if (!file) {
        $("#videoResponse").html(`<div class="alert alert-danger">Please select a video file.</div>`);
        return;
    }

    // Validate file type
    if (!file.type.startsWith("video/")) {
        $("#videoResponse").html(`<div class="alert alert-danger">Only video files are allowed.</div>`);
        return;
    }

    // Validate file size (50MB = 50 * 1024 * 1024 bytes)
    //if (file.size > 50 * 1024 * 1024) {
      //  $("#videoResponse").html(`<div class="alert alert-danger">File size must be less than 50MB.</div>`);
      //  return;
   // }

    // If validation passed, continue upload
    let formData = new FormData(this);

    $.ajax({
        url: "ajax_upload_video.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            let data = JSON.parse(res);
            $("#videoResponse").html(`
                <div class="alert alert-${data.status ? 'success' : 'danger'}">${data.msg}</div>
            `);
            if (data.status) {
                setTimeout(() => location.reload(), 2000);
            }
        }
    });
});

});
</script>

</body>
</html>
