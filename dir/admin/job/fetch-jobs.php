<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$job = new Job();
$limit = PAGE_PER_LIST; // Jobs per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$jobs = $job->getJobsWithPagination($limit, $offset);
$totalJobs = $job->getTotalJobs(); // Total job count
$totalPages = ceil($totalJobs / $limit);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Title</th>
            <th>Department</th>
            <th>Experience</th>
            <th>Location</th>
            <th>Vacancies</th>
            <th>Posted On</th>
            <th  width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($jobs)) : ?>
            <?php $serial = $offset + 1; ?>
            <?php foreach ($jobs as $job) : ?>
                <tr>
                    <td><?= $serial++ ?></td>
                    <td><?= htmlspecialchars($job['job_title']) ?> <span class="badge bg-secondary"><?= htmlspecialchars($job['job_type']) ?></span></td>
                    <td><?= htmlspecialchars($job['department']) ?></td>
                    <td><?= htmlspecialchars($job['experience']) ?></td>
                    <td><?= htmlspecialchars($job['location']) ?></td>
                    <td><?= $job['vacancies'] ?></td>
                    <td><?= date("Y-m-d", strtotime($job['date_posted'])) ?></td>
                    <td>
                        <a href="job-form.php?job_id=<?= $job['job_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm deleteJob" data-id="<?= $job['job_id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="9" class="text-center">No jobs found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Pagination -->
<?php if ($totalJobs > $limit) : ?>
<div class="text-center d-flex justify-content-center">
    <ul class="pagination  mt-3">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a href="#" class="btn mx-1 shadow-sm  <?= $i == $page ? 'btn-primary' : 'btn-light' ?> page-link pagination-link" data-page="<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<?php endif; ?>
