<?php
require_once '../../../config/config.php';
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

</head>

<body>
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
                                <label>Upload</label>
                                <input type="file" name="resource_file" class="form-control" id="resource_file" required accept=".pdf,.doc,.docx,.mp4,.mov,.avi" />
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // Delete resource functionality
        $(".delete-resource").on("click", function() {
            var resourceId = $(this).data("id");
            if (confirm("Are you sure you want to delete this resource?")) {
                $.ajax({
                    url: "ajax/delete-resource.php", // Create a new delete endpoint
                    type: "POST",
                    data: {
                        id: resourceId
                    },
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