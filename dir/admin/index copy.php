<?php
require_once '../../config/config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

// Instantiate classes
$blog = new Blog();
$media = new Media();
$job = new Job();

// Fetch counts using class methods
$counts = [
    'blogs' => [
        'total' => $blog->getTotalBlogs(),
        'active' => $blog->getActiveBlogs(),
        'disabled' => $blog->getDisabledBlogs(),
    ],
    'media' => [
        'total' => $media->getTotalMedia(),
        'active' => $media->getActiveMedia(),
        'disabled' => $media->getDisabledMedia(),
    ],
    'jobs' => [
        'total' => $job->getTotalJobs(),
        'active' => $job->getActiveJobs(),
        'disabled' => $job->getDisabledJobs(),
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php require_once ABS_PATH . 'components/navbar/header.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Dashboard Overview</h2>
        <div class="row">
            <?php
            $sections = ['blogs' => 'Blogs', 'media' => 'Media', 'jobs' => 'Jobs'];
            $colors = ['primary', 'success', 'danger']; // Bootstrap colors

            foreach ($sections as $key => $title) { ?>
                <div class="col-md-4">
                    <div class="card border-<?= $colors[0] ?> shadow-sm">
                        <h5 class="text-<?= $colors[0] ?>"><?= $title ?></h5>
                        <h2 class="fw-bold"><?= $counts[$key]['total'] ?></h2>
                        <p class="text-muted">Total</p>
                    </div>
                    <div class="card mt-3 border-<?= $colors[1] ?> shadow-sm">
                        <h5 class="text-<?= $colors[1] ?>">Active</h5>
                        <h2 class="fw-bold"><?= $counts[$key]['active'] ?></h2>
                        <p class="text-muted">Active <?= $title ?></p>
                    </div>
                    <div class="card mt-3 border-<?= $colors[2] ?> shadow-sm">
                        <h5 class="text-<?= $colors[2] ?>">Disabled</h5>
                        <h2 class="fw-bold"><?= $counts[$key]['disabled'] ?></h2>
                        <p class="text-muted">Disabled <?= $title ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</html>
