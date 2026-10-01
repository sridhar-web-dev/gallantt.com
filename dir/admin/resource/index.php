<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$resourceObj = new Resources();
$categories = $resourceObj->getCategories();
$resources = $resourceObj->getResources(); // Assuming a method to fetch resources
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
        .resource-confirm-modal { position: fixed; inset: 0; z-index: 1070; display: none; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.45); }
        .resource-confirm-card { width: min(90vw, 380px); background: #fff; border-radius: 10px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); }
    </style>

</head>

<body>
    <div id="resourceLoader" class="resource-loader" role="status" aria-live="polite" aria-hidden="true">
        <div class="resource-loader-card">
            <div class="resource-wireframe-line short"></div>
            <div class="resource-wireframe-line long"></div>
            <div class="resource-wireframe-line long"></div>
            <div class="resource-loader-text" id="resourceLoaderText">Processing resource...</div>
        </div>
    </div>
    <div id="resourceDeleteModal" class="resource-confirm-modal" role="dialog" aria-modal="true" aria-labelledby="resourceDeleteTitle">
        <div class="resource-confirm-card">
            <div class="p-3 border-bottom"><h5 id="resourceDeleteTitle" class="mb-0">Delete resource?</h5></div>
            <div class="p-3"><p class="mb-0">Are you sure you want to delete this resource?</p></div>
            <div class="p-3 border-top d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-secondary" id="cancelResourceDelete">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmResourceDelete">Delete</button>
            </div>
        </div>
    </div>
    <?php require_once '../components/navbar/header.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                    <h5>Manage Resources</h5>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Resource Name</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resources as $resource): ?>
                            <tr>
                                <td><?= $resource['id']; ?></td>
                                <td><?= htmlspecialchars($resource['category_name']); ?></td>
                                <td><?= htmlspecialchars($resource['resource_name']); ?></td>
                                <?php
                                    $resourceUrl = $resource['file_type'] === 'video'
                                        ? $resource['file_path']
                                        : ABS_URL . 'uploads/resource/' . rawurlencode(basename($resource['file_path']));
                                ?>
                                <td><a href="<?= htmlspecialchars($resourceUrl); ?>" target="_blank">View</a></td>
                                <td>
                                    <!-- Redirect to edit page with resource ID -->
                                    <a href="edit-resource.php?id=<?= $resource['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm delete-resource" data-id="<?= $resource['id']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    </div>
                </div>
                
                
            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Add New Resource</h5>
                    </div>
                    <div class="card-body">
                        <!-- Result message -->
                        <div id="result" class="mt-3"></div>
                        <form id="resourceForm" enctype="multipart/form-data">
    <input type="hidden" name="resource_id" id="resource_id" />

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-select" id="category_id">
            <option value="">-- Select Category --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id']; ?>"><?= htmlspecialchars($cat['name']); ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="new_category" class="form-control mt-2" id="new_category" placeholder="Or enter new category" />
    </div>

    <div class="mb-3">
        <label>Media Type</label>
        <select name="file_type" id="file_type" class="form-select" required>
            <option value="">-- Select Media Type --</option>
            <option value="doc">Document</option>
            <option value="video">Video</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Resource Name</label>
        <input type="text" name="resource_name" class="form-control" id="resource_name" required />
    </div>

    <div class="mb-3" id="file_upload_group">
        <label>Upload Document</label>
        <input type="file" name="resource_file" class="form-control" id="resource_file" accept=".pdf,.doc,.docx" />
    </div>

    <div class="mb-3 d-none" id="youtube_link_group">
        <label>YouTube Link</label>
        <input type="url" name="youtube_link" class="form-control" id="youtube_link" placeholder="https://youtube.com/..." />
    </div>

    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
</form>

                    </div>
                </div>
                <!-- Add Resource Form -->





                <!-- Manage Resources Section -->
            </div>
        </div>



    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
     <script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
    <script>
document.getElementById('file_type').addEventListener('change', function () {
    const type = this.value;
    const fileGroup = document.getElementById('file_upload_group');
    const youtubeGroup = document.getElementById('youtube_link_group');
    const fileInput = document.getElementById('resource_file');
    const ytInput = document.getElementById('youtube_link');

    if (type === 'video') {
        youtubeGroup.classList.remove('d-none');
        fileGroup.classList.add('d-none');
        fileInput.value = '';
        fileInput.removeAttribute('required');
        ytInput.setAttribute('required', 'required');
    } else if (type === 'doc') {
        youtubeGroup.classList.add('d-none');
        fileGroup.classList.remove('d-none');
        ytInput.value = '';
        ytInput.removeAttribute('required');
        fileInput.setAttribute('required', 'required');
    } else {
        youtubeGroup.classList.add('d-none');
        fileGroup.classList.add('d-none');
        ytInput.value = '';
        fileInput.value = '';
        ytInput.removeAttribute('required');
        fileInput.removeAttribute('required');
    }
});
</script>

    <script>
        function showResourceLoader(message) {
            $("#resourceLoaderText").text(message);
            $("#resourceLoader").css("display", "flex").attr("aria-hidden", "false");
        }

        function hideResourceLoader() {
            $("#resourceLoader").hide().attr("aria-hidden", "true");
        }

        let pendingDeleteButton = null;
        let pendingResourceId = null;

        function closeDeleteModal() {
            $("#resourceDeleteModal").hide().attr("aria-hidden", "true");
            pendingDeleteButton = null;
            pendingResourceId = null;
        }

        // Open centered delete confirmation modal.
        $(".delete-resource").on("click", function() {
            pendingDeleteButton = this;
            pendingResourceId = $(this).data("id");
            $("#resourceDeleteModal").css("display", "flex").attr("aria-hidden", "false");
        });

        $("#cancelResourceDelete").on("click", closeDeleteModal);
        $("#confirmResourceDelete").on("click", function() {
            const deleteButton = pendingDeleteButton;
            const resourceId = pendingResourceId;
            closeDeleteModal();
            if (deleteButton && resourceId) {
                showResourceLoader("Deleting resource...");
                deleteButton.disabled = true;
                setTimeout(function() {
                    $.ajax({
                    url: "ajax/delete-resource.php", // Create a new delete endpoint
                    type: "POST",
                    data: {
                        id: resourceId
                    },
                    success: function(res) {
                        const response = $.trim(res);
                        const isSuccess = response.includes('successfully');
                        $("#result").html(
                            `<div class="alert alert-${isSuccess ? 'success' : 'danger'}">${response}</div>`
                        );
                        if (isSuccess) {
                            location.reload();
                        } else {
                            hideResourceLoader();
                            deleteButton.disabled = false;
                        }
                    },
                    error: function() {
                        hideResourceLoader();
                        deleteButton.disabled = false;
                        $("#result").html('<div class="alert alert-danger">Something went wrong!</div>');
                    }
                    });
                }, 0);
            }
        });
        // Handle form submit (add or update)
        $("#resourceForm").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            var actionUrl = "ajax/save-resource.php"; // Default action (Add new resource)
            showResourceLoader($("#resource_id").val() ? "Updating resource..." : "Creating resource...");

            // Check if we are editing an existing resource
            if ($("#resource_id").val()) {
                actionUrl = "ajax/update-resource.php"; // Change to update resource URL if editing
            }

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    $("#result").html(
                        `<div class="alert alert-${res.includes('success') ? 'success' : 'danger'}">${res}</div>`
                    );
                    if (res.includes('Resource updated successfully') || res.includes('Resource added successfully')) {
                        $("#resourceForm")[0].reset();
                        $("#submitBtn").text("Submit"); // Reset submit button text
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        hideResourceLoader();
                    }
                },
                error: function() {
                    hideResourceLoader();
                    $("#result").html('<div class="alert alert-danger">Something went wrong!</div>');
                }
            });
        });
    </script>
</body>

</html>