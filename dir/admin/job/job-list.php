<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Job Listings</h4>
                    <a href="job-form.php" class="btn btn-secondary">Add New Job</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="jobTableContainer">
                        <!-- Job table will be loaded here via AJAX -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Career page.</div>
                    <a href="<?php echo ABS_URL; ?>careers" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
    </div>
</div>
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        function loadJobs(page = 1) {
            $.ajax({
                url: "fetch-jobs.php",
                type: "GET",
                data: { page: page },
                success: function (response) {
                    $("#jobTableContainer").html(response);
                }
            });
        }
        loadJobs(); // Load jobs initially
        $(document).on("click", ".pagination-link", function (e) {
            e.preventDefault();
            let page = $(this).data("page");
            loadJobs(page);
        });
        $(document).on("click", ".deleteJob", function () {
            let jobId = $(this).data("id");
            if (confirm("Are you sure you want to delete this job?")) {
                $.ajax({
                    url: "job-delete.php",
                    type: "POST",
                    data: { job_id: jobId },
                    success: function (response) {
                        alert(response);
                        loadJobs();
                    }
                });
            }
        });
    });
</script>
</body>
</html>
