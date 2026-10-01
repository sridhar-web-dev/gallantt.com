<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$banner = new Banner();
$bannerData = [];
$editMode = false;

if (isset($_GET['id'])) {
    $bannerData = $banner->getBannerById($_GET['id']);
    $editMode = true; // Flag for editing mode
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Form</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .banner-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .banner-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .banner-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: banner-wireframe-shimmer 1.2s linear infinite; }
        .banner-wireframe-line.short { width: 58%; }
        .banner-wireframe-line.long { width: 84%; }
        @keyframes banner-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .banner-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
<div id="bannerLoader" class="banner-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="banner-loader-card">
        <div class="banner-wireframe-line short"></div>
        <div class="banner-wireframe-line long"></div>
        <div class="banner-wireframe-line long"></div>
        <div class="banner-loader-text" id="bannerLoaderText">Saving banner...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><?= $editMode ? 'Edit Banner' : 'Create Banner' ?></h4>
                    <a href="banner-list.php" class="btn btn-secondary">Manage Banners</a>
                </div>
                <div class="card-body">
                    <div id="message" class="mt-3"></div>
                    <form id="bannerForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $bannerData['id'] ?? '' ?>">
                        
                        <!-- Title Field -->
                        <div class="mb-3">
                            <label class="form-label">Title <span class="text-danger">*</span> (Min 3 characters)</label>
                            <input type="text" class="form-control" name="title" value="<?= $bannerData['title'] ?? '' ?>" required>
                            <small class="text-danger d-none" id="titleError">Title must be at least 3 characters.</small>
                        </div>

                        <!-- Subtitle Field -->
                        <div class="mb-3">
                            <label class="form-label">Subtitle <span class="text-danger">*</span> (Min 3 characters)</label>
                            <input type="text" class="form-control" name="subtitle" value="<?= $bannerData['subtitle'] ?? '' ?>" required>
                            <small class="text-danger d-none" id="subtitleError">Subtitle must be at least 3 characters.</small>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label class="form-label">
                                Upload Image <span class="text-danger">*</span>  
                                <small class="text-muted">(Max 2MB, Recommended: 1920x1080px)</small>
                            </label>
                            <input type="file" class="form-control" name="image" accept="image/*" <?= $editMode ? '' : 'required' ?>>
                            <small class="text-danger d-none" id="imageError">Please upload a valid image (Max 2MB, 1920x1080px).</small>

                            <?php if ($editMode && !empty($bannerData['image'])): ?>
                                <div class="mt-3">
                                    <label>Current Image:</label><br>
                                    <img src="<?php echo ABS_URL ?>uploads/home-banner/uploads/<?= $bannerData['image'] ?>" alt="Current Banner Image" style="max-width: 200px; max-height: 150px;">
                                </div>
                            <?php endif; ?>

                            <!-- Preview Selected Image -->
                            <div id="imagePreview" class="mt-3"></div>
                        </div>

                        <button type="submit" class="btn btn-success w-100" id="submitBtn" disabled><?= $editMode ? 'Update' : 'Submit' ?></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="alert alert-info">
   
    <strong>Important:</strong> You can add up to <strong>10 banners</strong> only. Adding more than 10 banners may affect the website's loading speed and overall user experience.
</div>
        </div>
    </div>
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        function validateForm() {
            let isValid = true;
            let title = $("input[name='title']").val().trim();
            let subtitle = $("input[name='subtitle']").val().trim();
            let fileInput = $("input[name='image']")[0].files[0];

            // Title Validation
            if (title.length < 3) {
                $("#titleError").removeClass('d-none');
                isValid = false;
            } else {
                $("#titleError").addClass('d-none');
            }

            // Subtitle Validation
            if (subtitle.length < 3) {
                $("#subtitleError").removeClass('d-none');
                isValid = false;
            } else {
                $("#subtitleError").addClass('d-none');
            }

            // Image Validation
            if (fileInput) {
                let fileSize = fileInput.size / 1024 / 1024; // Convert to MB
                let img = new Image();
                img.src = URL.createObjectURL(fileInput);

                img.onload = function () {
                    if (fileSize > 2) {
                        $("#imageError").removeClass('d-none').text("Please upload a valid image (Max 2MB).");
                        $("#submitBtn").prop("disabled", true);
                    } else {
                        $("#imageError").addClass('d-none');
                        if (isValid) $("#submitBtn").prop("disabled", false);
                    }
                };
            } else {
                if (!<?= json_encode($editMode) ?>) {
                    $("#imageError").removeClass('d-none').text("Please upload an image.");
                    isValid = false;
                } else {
                    $("#imageError").addClass('d-none');
                }
            }

            $("#submitBtn").prop("disabled", !isValid);
        }

        // Validate Fields on Input
        $("input[name='title'], input[name='subtitle']").on("keyup", validateForm);
        $("input[name='image']").on("change", function () {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview").html('<img src="' + e.target.result + '" alt="Selected Image" style="max-width: 200px; max-height: 150px;">');
                };
                reader.readAsDataURL(file);
            }
            validateForm();
        });

        // Submit Form via AJAX
        $("#bannerForm").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            var bannerLoader = document.getElementById("bannerLoader");
            document.getElementById("bannerLoaderText").textContent = <?= json_encode($editMode ? 'Updating banner...' : 'Creating banner...') ?>;
            bannerLoader.style.display = "flex";
            bannerLoader.setAttribute("aria-hidden", "false");
            $("#submitBtn").prop("disabled", true).text("Processing...");

            $.ajax({
                url: "process-banner.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $("#message").html(response).addClass('alert alert-success');
                    setTimeout(function () {
                        window.location.href = 'banner-list.php';
                    }, 2000);
                },
                error: function () {
                    $("#message").html('Error submitting form.').addClass('alert alert-danger');
                    bannerLoader.style.display = "none";
                    bannerLoader.setAttribute("aria-hidden", "true");
                    $("#submitBtn").prop("disabled", false).text(<?= json_encode($editMode ? 'Update' : 'Submit') ?>);
                }
            });
        });
    });
</script>

</body>
</html>
