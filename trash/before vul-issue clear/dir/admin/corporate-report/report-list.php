<?php
require_once '../../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}

$report = new CorporateReport();
$reports = $report->getAllReports();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= isset($reportData) ? 'Edit Corporate Report' : 'Create Corporate Report' ?></title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <!-- CKEditor 5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>

<div class="container mt-5">
   <div class="row justify-content-center">
    <div class="col-lg-8">
    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Corporate Reports</h4>
            <a href="./" class="btn btn-primary">Add New Report</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead >
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Document</th>
                        <th>Created At</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
    <?php if (!empty($reports)) : ?>
        <?php $sn = 1; // Initialize serial number ?>
        <?php foreach ($reports as $report) : ?>
            <tr>
                <td><?= $sn++ ?></td> <!-- Serial Number Column -->
                <td><?= htmlspecialchars($report['title']) ?></td>
                <td><?= substr($report['description'], 0, 50) ?>...</td>
                <td><a href="uploads/<?= htmlspecialchars($report['doc']) ?>" target="_blank" class="btn btn-sm btn-info">View</a></td>
                <td><?= date("d M Y, H:i", strtotime($report['created_at'])) ?></td>
                <td>
                    <a href="report-edit.php?id=<?= $report['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-danger deleteReport" data-id="<?= $report['id'] ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6" class="text-center">No reports found.</td>
        </tr>
    <?php endif; ?>
</tbody>

            </table>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="alert alert-primary mb-0">
                    <div>Changes you made are now live on the Home page.</div>
                    <a href="<?php echo ABS_URL; ?>index.php#corparate-report" target="_blank" class="btn btn-sm btn-primary mt-2 w-100"><i class="fa fa-eye"></i> View on Website</a>
               </div>
        </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".deleteReport").click(function() {
            if (confirm("Are you sure you want to delete this report?")) {
                let reportId = $(this).data("id");
                $.ajax({
                    url: "report-delete.php",
                    type: "POST",
                    data: { id: reportId },
                    success: function(response) {
                        let result = JSON.parse(response);
                        alert(result.message);
                        if (result.status === "success") {
                            location.reload();
                        }
                    },
                    error: function() {
                        alert("Error deleting report.");
                    }
                });
            }
        });
    });
</script>

</body>
</html>
