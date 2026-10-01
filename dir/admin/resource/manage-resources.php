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
    <title>Manage Resources</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <!-- Add Resource Form -->
    <h2 class="mb-4">Add New Resource</h2>
    <form id="resourceForm" enctype="multipart/form-data">
        <input type="hidden" name="resource_id" id="resource_id" /> <!-- Hidden field for resource ID -->
        
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
            <label>Resource Name</label>
            <input type="text" name="resource_name" class="form-control" id="resource_name" required />
        </div>
        <div class="mb-3">
            <label>Upload File</label>
            <input type="file" name="resource_file" class="form-control" id="resource_file" accept=".pdf,.doc,.docx,.mp4,.mov,.avi" />
        </div>
        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
    </form>

    <!-- Result message -->
    <div id="result" class="mt-3"></div>

   <!-- Manage Resources Section -->
<h2 class="mt-5 mb-4">Manage Resources</h2>
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
                <td><?= $resource['category_name']; ?></td>
                <td><?= $resource['resource_name']; ?></td>
                <td><a href="<?= $resource['file_path']; ?>" target="_blank">View</a></td>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // Delete resource functionality
    $(".delete-resource").on("click", function() {
        var resourceId = $(this).data("id");
        if (confirm("Are you sure you want to delete this resource?")) {
            $.ajax({
                url: "ajax/delete-resource.php", // Create a new delete endpoint
                type: "POST",
                data: { id: resourceId },
                success: function(res) {
                    $("#result").html(
                        `<div class="alert alert-${res.includes('success') ? 'success' : 'danger'}">${res}</div>`
                    );
                    location.reload(); // Reload the page to remove the deleted resource from the table
                },
                error: function() {
                    $("#result").html('<div class="alert alert-danger">Something went wrong!</div>');
                }
            });
        }
    });
        // Handle form submit (add or update)
        $("#resourceForm").on("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        var actionUrl = "ajax/save-resource.php"; // Default action (Add new resource)

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
                }
            },
            error: function() {
                $("#result").html('<div class="alert alert-danger">Something went wrong!</div>');
            }
        });
    });
</script>
</body>
</html>
