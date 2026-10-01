<?php
require_once '../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$banner = new Banner();
$bannerCount = $banner->getTotalBanners(); 
$report = new CorporateReport();
$reportCount = $report->getTotalReports();
$media = new Media();
$mediaCount = $media->getTotalMedia();
$job = new Job();
$jobCount = $job->getTotalJobs();
$blog = new Blog();
$blogCount = $blog->getTotalBlogs();
$report = new Report();
$currentReport = $report->getReport();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>css/all.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .card {
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php require_once ABS_PATH . 'dir/admin/components/navbar/header.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Dashboard Overview</h2>
        <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm mt-3">
                        <div class="card-header px-0 bg-white">
                            <h5>Home Banner</h5>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                        <div class="detail">
                            <p class="mb-0"><b>Total Banner : </b></p>
                            <h1 class="text-primary"><b><?php echo $bannerCount; ?></b></h1>
                        </div>
                            <div class="mt-2 float-end">
                            <a href="../admin/home-banner/index.php" class="btn btn-sm btn-info"><i class="fa fa-plus fa-sm"></i> Add</a>
                            <a href="../admin/home-banner/banner-list.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-list-ul fa-sm"></i> See list</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                        <div class="card shadow-sm mt-3">
                            <div class="card-header px-0 bg-white">
                                <h5>Corporate Reports</h5>
                            </div>
                            <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                                <div class="detail">
                                    <p class="mb-0"><b>Total Reports : </b></p>
                                    <h1 class="text-primary"><b><?php echo $reportCount; ?></b></h1>
                                </div>
                                <div class="mt-2 float-end">
                                    <a href="../admin/corporate-report/index.php" class="btn btn-sm btn-info"><i class="fa fa-plus fa-sm"></i> Add</a>
                                    <a href="../admin/corporate-report/report-list.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-list-ul fa-sm"></i> See list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="card shadow-sm mt-3">
                        <div class="card-header px-0 bg-white">
                            <h5>Media Uploads</h5>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                            <div class="detail">
                                <p class="mb-0"><b>Total Media : </b></p>
                                <h1 class="text-primary"><b><?php echo $mediaCount; ?></b></h1>
                            </div>
                            <div class="mt-2 float-end">
                                <a href="../admin/media/media-form.php" class="btn btn-sm btn-info"><i class="fa fa-plus fa-sm"></i> Add</a>
                                <a href="../admin/media/media-list.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-list-ul fa-sm"></i> See list</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="card shadow-sm mt-3">
                    <div class="card-header px-0 bg-white">
                        <h5>Job Listings</h5>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                        <div class="detail">
                            <p class="mb-0"><b>Total Jobs : </b></p>
                            <h1 class="text-primary"><b><?php echo $jobCount; ?></b></h1>
                        </div>
                        <div class="mt-2 float-end">
                            <a href="../admin/job/job-form.php" class="btn btn-sm btn-info"><i class="fa fa-plus fa-sm"></i> Add</a>
                            <a href="../admin/job/job-list.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-list-ul fa-sm"></i> See list</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm mt-3">
                    <div class="card-header px-0 bg-white">
                        <h5>Blogs</h5>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                        <div class="detail">
                            <p class="mb-0"><b>Total Blogs : </b></p>
                            <h1 class="text-primary"><b><?php echo $blogCount; ?></b></h1>
                        </div>
                        <div class="mt-2 float-end">
                            <a href="../admin/blog/blog-form.php" class="btn btn-sm btn-info"><i class="fa fa-plus fa-sm"></i> Add</a>
                            <a href="../admin/blog/blog-list.php" class="btn btn-sm btn-secondary"><i class="fa-solid fa-list-ul fa-sm"></i> See list</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm mt-3">
                    <div class="card-header px-0 bg-white">
                        <h5>RCP Report</h5>
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                    <?php if ($currentReport): ?>
                        <div class="alert alert-warning fade show w-100"  role="alert">
                            <a href="<?php echo ABS_URL ?>dir/admin/rcp/uploads/<?= $currentReport['filename'] ?>" target="_blank" class="btn btn-sm btn-outline-secondary w-100 mt-2">Download Current Report</a>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</html>
