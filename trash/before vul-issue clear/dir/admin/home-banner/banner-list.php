<?php
    require_once '../../../config/config.php';
    // Check if user is logged in
    if (! isset($_SESSION['user_id'])) {
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
    <link rel="stylesheet" href="<?php echo ABS_URL?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        #sortable-banner tr {
    cursor: move;
}
    </style>
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
                            <tbody id="sortable-banner">
                            <?php foreach ($banners as $index => $banner): ?>
                                <tr data-id="<?php echo $banner['id']?>">
                                    <td class="align-middle"><?php echo htmlspecialchars($banner['order'])?></td>
                                    <td class="align-middle"><?php echo htmlspecialchars($banner['title'])?></td>
                                    <td class="align-middle"><?php echo htmlspecialchars($banner['subtitle'])?></td>
                                    <td class="align-middle"><img src="./uploads/<?php echo $banner['image']?>" alt="<?php echo htmlspecialchars($banner['title'])?>" width="100"></td>
                                    <td class="align-middle">
                                        <a href="index.php?id=<?php echo $banner['id']?>" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm delete-btn" data-banner-id="<?php echo $banner['id']?>">Delete</button>
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
        <div class="col-lg-4">
                <div class="alert alert-info">
                    <strong>Note:</strong> You can <strong>drag and drop the banner rows</strong> to reorder them. The order you set here will directly reflect on the slideshow displayed on the website's homepage. <br>
                    <strong>Important:</strong> You can add up to <strong>10 banners</strong> only. Adding more than 10 banners may affect the website's loading speed and overall user experience.
                </div>
                <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Home page.</div>
                    <a href="<?php echo ABS_URL; ?>index.php" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo ABS_URL?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI for draggable support -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
<script>
$(function () {
    $("#sortable-banner").sortable({
        helper: function (e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function (index) {
                $(this).width($originals.eq(index).width());
            });
            return $helper;
        },
        update: function () {
            var order = [];
            var serial = 1; // Start serial number from 1
            $("#sortable-banner tr").each(function () {
                order.push($(this).data("id"));
                // Update the serial number in the table
                $(this).find("td:first").text(serial);
                serial++;
            });
            $.post("update-order.php", { order: order }, function (response) {
                console.log("Order updated:", response);
            });
        },
        axis: 'y', // restrict movement to vertical axis
        cursor: 'move'
    });
});
</script>
</body>
</html>
