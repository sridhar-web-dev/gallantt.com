<?php
require_once '../../../config/config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

$banners = Banner::getBanners(); // Use Banner class to fetch banners
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner List</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manage Banners</h4>
                    <a href="index.php" class="btn btn-primary">Add New Banner</a>
                </div>
                <div class="card-body">
                    <?php if (count($banners) > 0): ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($banners as $index => $banner): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= htmlspecialchars($banner['title']) ?></td>
                                        <td><?= htmlspecialchars($banner['subtitle']) ?></td>
                                        <td><img src="./uploads/<?= $banner['image'] ?>" alt="<?= htmlspecialchars($banner['title']) ?>" width="100"></td>
                                        <td>
                                            <a href="index.php?id=<?= $banner['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm delete-btn" data-banner-id="<?= $banner['id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-info">No banners found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $(".delete-btn").on("click", function () {
            var bannerId = $(this).data("banner-id");
            if (confirm("Are you sure you want to delete this banner?")) {
                $.ajax({
                    url: "delete-banner.php",
                    type: "POST",
                    data: { id: bannerId },
                    success: function(response) {
                        if (response === 'success') {
                            alert("Banner deleted successfully.");
                            location.reload();
                        } else {
                            alert("Error deleting banner.");
                        }
                    },
                    error: function() {
                        alert("Error in request.");
                    }
                });
            }
        });
    });
</script>
</body>
</html>
