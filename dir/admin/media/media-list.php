<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$media = new Media();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Gallery</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">    
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .media-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .media-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .media-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: media-wireframe-shimmer 1.2s linear infinite; }
        .media-wireframe-line.short { width: 58%; }
        .media-wireframe-line.long { width: 84%; }
        @keyframes media-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .media-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
<div id="mediaLoader" class="media-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="media-loader-card">
        <div class="media-wireframe-line short"></div>
        <div class="media-wireframe-line long"></div>
        <div class="media-wireframe-line long"></div>
        <div class="media-loader-text">Deleting media...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Media Gallery</h4>
                    <a href="media-form.php" class="btn btn-secondary">Add New Media</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="mediaTableContainer">
                        <!-- Media gallery table will be loaded here via AJAX -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Media page.</div>
                    <a href="<?php echo ABS_URL; ?>media" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
    </div>
</div>
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function () {
    function loadMedia() {
        $.ajax({
            url: "fetch-media.php",
            type: "GET",
            success: function (response) {
                $("#mediaTableContainer").html(response);
            }
        });
    }
    loadMedia(); // Initial load
    $(document).on("click", ".toggleStatus", function () {
        let mediaId = $(this).data("id");
        let newStatus = $(this).data("status") === "live" ? "disabled" : "live";
        $.ajax({
            url: "media-status-toggle.php",
            type: "POST",
            data: { media_id: mediaId, status: newStatus },
            success: function (response) {
                alert(response);
                loadMedia();
            }
        });
    });
    $(document).on("click", ".deleteMedia", function () {
        let mediaId = $(this).data("id");
        if (confirm("Are you sure you want to delete this media?")) {
            let deleteButton = $(this);
            let mediaLoader = document.getElementById("mediaLoader");
            mediaLoader.style.display = "flex";
            mediaLoader.setAttribute("aria-hidden", "false");
            deleteButton.prop("disabled", true);
            $.ajax({
                url: "media-delete.php",
                type: "POST",
                data: { media_id: mediaId },
                success: function (response) {
                    mediaLoader.style.display = "none";
                    mediaLoader.setAttribute("aria-hidden", "true");
                    alert(response);
                    loadMedia();
                },
                error: function () {
                    mediaLoader.style.display = "none";
                    mediaLoader.setAttribute("aria-hidden", "true");
                    deleteButton.prop("disabled", false);
                    alert("Failed to delete media. Please try again.");
                }
            });
        }
    });
});
</script>
</body>
</html>
