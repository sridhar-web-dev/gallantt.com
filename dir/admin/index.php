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
$db = Database::getDB();
$dashboardRecords = [
    ['title' => 'Home Banners', 'table' => 'web_banners', 'url' => 'home-banner/banner-list.php'],
    ['title' => 'Corporate Reports', 'table' => 'web_corporatereports', 'url' => 'corporate-report/report-list.php'],
    ['title' => 'Investor Reports', 'table' => 'web_investorreports', 'url' => 'investors-reports/'],
    ['title' => 'Financial Reports', 'table' => 'web_financialreports', 'url' => 'financial-report/'],
    ['title' => 'Financial Highlights', 'table' => 'web_financialhighlight', 'url' => 'financial-report/highlights.php'],
    ['title' => 'Media Uploads', 'table' => 'web_mediagallery', 'url' => 'media/media-list.php'],
    ['title' => 'Job Listings', 'table' => 'web_jobs', 'url' => 'job/job-list.php'],
    ['title' => 'Job Applications', 'table' => 'web_jobapplication', 'url' => 'job/job-applications.php'],
    ['title' => 'Blogs', 'table' => 'web_blogs', 'url' => 'blog/blog-list.php'],
    ['title' => 'Employee Welfare', 'table' => 'web_employeewelfare', 'url' => 'employee-welfare/'],
    ['title' => 'Resources', 'table' => 'web_resources', 'url' => 'resource/'],
    ['title' => 'Business Brochures', 'table' => 'business_brochures', 'url' => 'resource/brochure-admin.php'],
    ['title' => 'Boards of Panels', 'table' => 'boards', 'url' => 'board-panel/'],
    ['title' => 'Home Videos', 'table' => 'web_homepagevideo', 'url' => 'home-banner/home-video.php'],
    ['title' => 'RCP Sections', 'table' => 'web_sections', 'url' => 'rcp/'],
    ['title' => 'Subscribers', 'table' => 'web_subscribers', 'url' => 'subscriber.php'],
];
foreach ($dashboardRecords as &$record) {
    $record['total'] = (int) $db->query('SELECT COUNT(*) FROM `' . $record['table'] . '`')->fetchColumn();
}
unset($record);
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
        <h2 class=" mb-4">Dashboard Overview</h2>
        <h4 class="mb-3">All Records</h4>
        <div class="row">
            <?php foreach ($dashboardRecords as $record): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-sm mt-3">
                        <div class="card-header px-0 bg-white">
                            <h5><?= htmlspecialchars($record['title'], ENT_QUOTES, 'UTF-8') ?></h5>
                        </div>
                        <div class="card-body d-flex justify-content-between align-items-center px-0 pb-0">
                            <div class="detail">
                                <p class="mb-0"><b>Total Records : </b></p>
                                <h1 class="text-primary"><b><?= $record['total'] ?></b></h1>
                            </div>
                            <a href="<?= htmlspecialchars($record['url'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-sm btn-primary">
                                See list
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
       
    </div>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</html>
