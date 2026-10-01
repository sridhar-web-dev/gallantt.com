<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$media = new Media();
$mediaData = [];
if (isset($_GET['media_id'])) {
    $mediaData = $media->getMediaById($_GET['media_id']);
}
// Predefined category options (Modify as needed)
$categories = ["Stories", "Foundation", "Event", "News"];
$sections = ["Corporate Highlights", "Life at Gallantt"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Gallery Update</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">    
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
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
        <div class="media-loader-text" id="mediaLoaderText">Saving media...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><?= !empty($mediaData['id']) ? 'Edit Media' : 'Add Media' ?></h4>
                    <a href="media-list.php" class="btn btn-secondary">Manage Media</a>
                </div>
                <div class="card-body">
                    <div id="message" class="mt-3"></div>
                    <form id="mediaForm" enctype="multipart/form-data">
                        <input type="hidden" name="media_id" value="<?= $mediaData['id'] ?? '' ?>">
                        <div class="mb-3">
                            <label class="form-label">Media Name</label>
                            <input type="text" class="form-control" name="media_name" value="<?= $mediaData['media_name'] ?? '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Section</label>
                            <select class="form-select" name="section" required>
                                <option value="" disabled <?= empty($mediaData['section']) ? 'selected' : '' ?>>Select Section</option>
                                <?php foreach ($sections as $section) : ?>
                                    <option value="<?= $section ?>" <?= (isset($mediaData['section']) && $mediaData['section'] == $section) ? 'selected' : '' ?>>
                                        <?= $section ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category" required>
                                <option value="" disabled <?= empty($mediaData['category']) ? 'selected' : '' ?>>Select Category</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category ?>" <?= (isset($mediaData['category']) && $mediaData['category'] == $category) ? 'selected' : '' ?>>
                                        <?= $category ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 d-none">
                            <label class="form-label">Small Description</label>
                            <textarea id="smallDescEditor" class="form-control" name="small_description" required><?= $mediaData['small_description'] ?? 'None' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="descEditor" class="form-control" name="description" required><?= $mediaData['description'] ?? '' ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Post</label>
                            <input type="date" class="form-control" name="date_of_post" value="<?= $mediaData['date_of_post'] ?? '' ?>" required>
                        </div>
                         <!-- ✅ New Media Type Radio Buttons -->
                        <div class="mb-3">
                            <label class="form-label d-block">Media Type</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="media_type" id="mediaTypeVideo" value="video"
                                    <?= (isset($mediaData['media_type']) && $mediaData['media_type'] === 'video') ? 'checked' : '' ?> required>
                                <label class="form-check-label" for="mediaTypeVideo">Video</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="media_type" id="mediaTypeImage" value="image"
                                    <?= (isset($mediaData['media_type']) && $mediaData['media_type'] === 'image') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="mediaTypeImage">Image</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="media_type" id="mediaTypeDocument" value="document"
                                    <?= (isset($mediaData['media_type']) && $mediaData['media_type'] === 'document') ? 'checked' : '' ?>>
                                <label class="form-check-label" for="mediaTypeDocument">Document</label>
                            </div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Upload Image (Thumbnail Image / Video)</label>
                        <!-- <input type="file" class="form-control" id="media_image" name="media_image"   accept="image/*,video/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"  <?php if (@$_GET['media_id'] == false) { ?> required <?php } ?>> -->
                        <input type="file" class="form-control" id="media_image" name="media_image"   accept="image/*,video/*"  <?php if (@$_GET['media_id'] == false) { ?> required <?php } ?>>

                        <small class="text-muted">Max size allowed: 10MB</small>
                       <div class="mt-2" id="imagePreview">
                            <?php if (!empty($mediaData['media_image'])): ?>
                                <?php if ($mediaData['media_type'] === 'image'): ?>
                                    <!-- Display Image -->
                                    <img src="<?= ABS_URL ?>uploads/media/uploads/<?= htmlspecialchars($mediaData['media_image']) ?>" alt="Media Image" class="img-thumbnail" width="150">
                                <?php elseif ($mediaData['media_type'] === 'video'): ?>
                                    <!-- Display Video -->
                                    <video width="150" controls>
                                        <source src="<?= ABS_URL ?>uploads/media/uploads/<?= htmlspecialchars($mediaData['media_image']) ?>" type="video/<?= htmlspecialchars(pathinfo($mediaData['media_image'], PATHINFO_EXTENSION)) ?>">
                                        Your browser does not support the video tag.
                                    </video>
                                <?php elseif ($mediaData['media_type'] === 'document'): ?>
                                    <!-- Display Document with view option -->
                                    <a href="<?= ABS_URL ?>uploads/media/uploads/<?= htmlspecialchars($mediaData['media_image']) ?>" target="_blank" class="btn btn-primary">View Document</a>
                                <?php else: ?>
                                    <!-- Handle unknown or unsupported media types -->
                                    <p>Unsupported media type</p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="mb-3">
    <label class="form-label">Upload Video / Document</label>
    <input type="file" class="form-control" name="media_file" accept="video/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
    <small class="text-muted">Allowed: Video (MP4, etc.), PDF, DOC, XLS, PPT | Max size: 100MB</small>

    <div class="mt-2" id="filePreview">
        <?php if (!empty($mediaData['media_file'])): ?>
            <?php
            $fileExt = strtolower(pathinfo($mediaData['media_file'], PATHINFO_EXTENSION));
            $filePath = ABS_URL . "uploads/media/uploads/" . rawurlencode($mediaData['media_file']);
            ?>
            <?php if (in_array($fileExt, ['mp4', 'webm', 'ogg'])): ?>
                <!-- Video Preview -->
                <video width="200" controls>
                    <source src="<?= $filePath ?>" type="video/<?= $fileExt ?>">
                    Your browser does not support the video tag.
                </video>
            <?php elseif (in_array($fileExt, ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'])): ?>
                <!-- Document Download Link -->
                <a href="<?= $filePath ?>" class="btn btn-outline-primary" target="_blank">View / Download Document</a>
            <?php else: ?>
                <p>Unsupported file type</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

                        <button type="submit" id="submitBtn" class="btn btn-success w-100"><?= !empty($mediaData['id']) ? 'Update' : 'Submit' ?></button>
                    </form>
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
    let smallDescEditor, descEditor;

    // Initialize CKEditor
    ClassicEditor.create(document.querySelector('#smallDescEditor'))
        .then(editor => {
            smallDescEditor = editor;
            smallDescEditor.model.document.on('change:data', validateForm);
        })
        .catch(error => console.error("CKEditor (Small Description) error:", error));

    ClassicEditor.create(document.querySelector('#descEditor'))
        .then(editor => {
            descEditor = editor;
            descEditor.model.document.on('change:data', validateForm);
        })
        .catch(error => console.error("CKEditor (Description) error:", error));

    let submitButton = $("#submitBtn");
    submitButton.prop("disabled", true);

    function showError(inputName, message) {
        let inputField = $(`[name='${inputName}']`);
        inputField.next(".error-message").remove();
        inputField.after(`<small class="error-message text-danger">${message}</small>`);
    }

    function clearError(inputName) {
        $(`[name='${inputName}']`).next(".error-message").remove();
    }

    function validateForm() {
        let isValid = true;
        $(".error-message").remove();

        // Get CKEditor content
        if (smallDescEditor) $("textarea[name='small_description']").val(smallDescEditor.getData().trim());
        if (descEditor) $("textarea[name='description']").val(descEditor.getData().trim());

        let mediaName = $("input[name='media_name']").val().trim();
        let section = $("select[name='section']").val();
        let category = $("select[name='category']").val();
        let smallDesc = $("textarea[name='small_description']").val().trim();
        let description = $("textarea[name='description']").val().trim();
        let dateOfPost = $("input[name='date_of_post']").val();
        let imageFile = $("#media_image")[0].files[0];

        // Validation checks
        if (mediaName.length < 3) {
            showError("media_name", "Media Name must be at least 3 characters.");
            isValid = false;
        } else {
            clearError("media_name");
        }

        if (!category) {
            showError("category", "Please select a category.");
            isValid = false;
        } else {
            clearError("category");
        }

        // if (smallDesc.length < 10) {
        //     showError("small_description", "Small Description must be at least 10 characters.");
        //     isValid = false;
        // } else {
        //     clearError("small_description");
        // }

        if (description.length < 20) {
            showError("description", "Description must be at least 20 characters.");
            isValid = false;
        } else {
            clearError("description");
        }

        let today = new Date().toISOString().split("T")[0];
        if (dateOfPost && dateOfPost > today) {
            showError("date_of_post", "Date of Post cannot be in the future.");
            isValid = false;
        } else {
            clearError("date_of_post");
        }

        // Image validation
        if (imageFile) {
            let imageSize = imageFile.size / 1024 / 1024;
            let fileType = imageFile.type;

            if (imageSize > 100) {
                showError("media_image", "Image size must be under 100MB.");
                $("#media_image").val("");  // Clears the file input
                $("#imagePreview").html(""); // Removes image preview
                isValid = false;
            } else {
                clearError("media_image");
            }

            // Get the file input element and the file
var fileInput = document.getElementById('media_image');
var file = fileInput.files[0];

// Allowed file types (images, videos, and documents)
var allowedTypes = ['image/jpeg', 'image/png', 'video/mp4', 'video/avi', 'video/mov', 
                    'application/pdf', 'application/msword', 
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                    'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];

// Check the file type
if (!allowedTypes.includes(file.type)) {
    showError("media_image", "Only JPEG, PNG images, MP4, AVI, MOV videos, and common document formats (PDF, DOC, XLS, PPT) are allowed.");
    $("#media_image").val("");  // Clears the file input
    $("#imagePreview").html(""); // Removes image preview
    isValid = false;
} else {
    clearError("media_image");
}

        }

        // Disable submit button if any validation fails
        submitButton.prop("disabled", !isValid);
    }

    // Image Validation & Preview
    $("#media_image").on("change", function (event) {
 // Get the file input element and the file
var fileInput = document.getElementById('media_image');
var file = fileInput.files[0];
var imageError = false;
var reader = new FileReader();

// Maximum file size (10MB in bytes)
var maxFileSize = 10 * 1024 * 1024; // 10MB

// Check the file size
if (file.size > maxFileSize) {
    showError("media_image", "File size must be under 10MB.");
    imageError = true;
} else {
    // Check if the file type is one of the allowed types
    var fileType = file.type;
    if (!fileType.match('image/jpeg') && !fileType.match('image/png') && 
        !fileType.match('video/mp4') && !fileType.match('video/avi') && 
        !fileType.match('video/mov') && !fileType.match('application/pdf') && 
        !fileType.match('application/msword') && !fileType.match('application/vnd.openxmlformats-officedocument.wordprocessingml.document') &&
        !fileType.match('application/vnd.ms-excel') && !fileType.match('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') &&
        !fileType.match('application/vnd.ms-powerpoint') && !fileType.match('application/vnd.openxmlformats-officedocument.presentationml.presentation')) {
        
        showError("media_image", "Only JPEG, PNG images, MP4, AVI, MOV videos, and common document formats are allowed.");
        imageError = true;
    } else {
        clearError("media_image");
    }
}



    if (!imageError) {
        reader.onload = function (e) {
            $("#imagePreview").html(`<img src="${e.target.result}" class="img-thumbnail" width="150">`);
        };
        reader.readAsDataURL(file);
    } else {
        $("#imagePreview").html(""); // Remove preview if invalid
    }

    validateForm();
});


    // Validate on Input Change
    $("input, select, textarea").on("input change keyup", validateForm);

    // Form Submission
    $("#mediaForm").on("submit", function (e) {
        e.preventDefault();
        validateForm();

        if (submitButton.prop("disabled")) return;

        var formData = new FormData(this);
        const mediaLoader = document.getElementById("mediaLoader");
        const mediaLoaderText = document.getElementById("mediaLoaderText");
        mediaLoaderText.textContent = "<?= !empty($mediaData['id']) ? 'Updating media...' : 'Creating media...' ?>";
        mediaLoader.style.display = "flex";
        mediaLoader.setAttribute("aria-hidden", "false");
        submitButton.prop("disabled", true).text("Processing...");

        $.ajax({
            url: "media-submit.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#message").html(response).addClass('alert alert-success');
                setTimeout(() => window.location.href = 'media-list.php', 2000);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                $("#message").html('<div class="alert alert-danger">Submission failed. Please try again.</div>');
                mediaLoader.style.display = "none";
                mediaLoader.setAttribute("aria-hidden", "true");
                submitButton.prop("disabled", false).text("<?= !empty($mediaData['id']) ? 'Update' : 'Submit' ?>");
            }
        });
    });
});

function showError(inputName, message) {
    if (inputName === "media_image") {
        $("#mediaImageError").text(message);  // for image error
    } else {
        let inputField = $(`[name='${inputName}']`);
        inputField.next(".error-message").remove();
        inputField.after(`<small class="error-message text-danger">${message}</small>`);
    }
}

function clearError(inputName) {
    if (inputName === "media_image") {
        $("#mediaImageError").text("");  // clear image error
    } else {
        $(`[name='${inputName}']`).next(".error-message").remove();
    }
}




</script>
</body>
</html>
