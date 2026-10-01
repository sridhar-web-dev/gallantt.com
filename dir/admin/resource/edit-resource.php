<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$resourceObj = new Resources();
$categories = $resourceObj->getCategories();
$resource = null;

if (isset($_GET['id']) && ctype_digit((string) $_GET['id'])) {
    $resourceId = (int) $_GET['id'];
    $resource = $resourceObj->getResourceById($resourceId);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .resource-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .resource-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .resource-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: resource-wireframe-shimmer 1.2s linear infinite; }
        .resource-wireframe-line.short { width: 58%; } .resource-wireframe-line.long { width: 84%; }
        @keyframes resource-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .resource-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>

</head>
<body>
<div id="resourceLoader" class="resource-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="resource-loader-card">
        <div class="resource-wireframe-line short"></div>
        <div class="resource-wireframe-line long"></div>
        <div class="resource-wireframe-line long"></div>
        <div class="resource-loader-text">Updating resource...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container my-5">
   <div class="row justify-content-center">
    <div class="col-lg-7">
<div class="card shadow-sm">
    <div class="card-header">
    <h5 class="mb-4">Edit Resource</h5>
    </div>
    <div class="card-body">
    <div id="result" class="mt-3"></div>
    <?php if (isset($resource)): ?>
    <form id="resourceForm" enctype="multipart/form-data">
        <input type="hidden" name="resource_id" id="resource_id" value="<?= $resource['id']; ?>" />
        
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" id="category_id">
                <option value="">-- Select Category --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id']; ?>" <?= $cat['id'] == $resource['category_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($cat['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="new_category" class="form-control mt-2" id="new_category" placeholder="Or enter new category" />
        </div>
        <div class="mb-3">
            <label>Resource Name</label>
            <input type="text" name="resource_name" class="form-control" id="resource_name" value="<?= htmlspecialchars($resource['resource_name']); ?>" required />
        </div>
        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="resource_file" class="form-control" id="resource_file" accept=".pdf,.doc,.docx,.mp4,.mov,.avi" />
            <?php
                $existingResourceUrl = $resource['file_type'] === 'video'
                    ? $resource['file_path']
                    : ABS_URL . 'uploads/resource/' . rawurlencode(basename($resource['file_path']));
            ?>
            <p>Existing File: <a href="<?= htmlspecialchars($existingResourceUrl); ?>" target="_blank">View File</a></p>
        </div>
        <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
    </form>
    <?php else: ?>
        <div class="alert alert-danger">Resource not found!</div>
    <?php endif; ?>
    </div>
</div>
    </div>
   </div>

   
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script>
    // Handle form submit (update resource)
    $("#resourceForm").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $("#resourceLoader").css("display", "flex").attr("aria-hidden", "false");
        $("#submitBtn").prop("disabled", true).text("Updating...");
        $.ajax({
            url: "ajax/update-resource.php", // Endpoint to handle the resource update
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $("#result").html(
                    `<div class="alert alert-${res.includes('success') ? 'success' : 'danger'}">${res}</div>`
                );
                if (res.includes('Resource updated successfully')) {
                    setTimeout(function() {
                        window.location.href = "index.php"; // Redirect back to resource management page
                    }, 2000);
                } else {
                    $("#resourceLoader").hide().attr("aria-hidden", "true");
                    $("#submitBtn").prop("disabled", false).text("Update");
                }
            },
            error: function() {
                $("#resourceLoader").hide().attr("aria-hidden", "true");
                $("#submitBtn").prop("disabled", false).text("Update");
                $("#result").html('<div class="alert alert-danger">Something went wrong!</div>');
            }
        });
    });
</script>
</body>
</html>
