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
    <style>
        .report-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .report-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .report-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: report-wireframe-shimmer 1.2s linear infinite; }
        .report-wireframe-line.short { width: 58%; }
        .report-wireframe-line.long { width: 84%; }
        @keyframes report-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .report-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <!-- CKEditor 5 CDN -->
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
</head>
<body>
<div id="reportLoader" class="report-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="report-loader-card">
        <div class="report-wireframe-line short"></div>
        <div class="report-wireframe-line long"></div>
        <div class="report-wireframe-line long"></div>
        <div class="report-loader-text">Deleting corporate report...</div>
    </div>
</div>
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
                <td><a href="../../../uploads/corporate-report/uploads/<?= htmlspecialchars($report['doc']) ?>" target="_blank" class="btn btn-sm btn-info">View</a></td>
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

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script>
    $(document).ready(function() {
        $(".deleteReport").click(function() {
            if (confirm("Are you sure you want to delete this report?")) {
                let reportId = $(this).data("id");
                let reportRow = $(this).closest("tr");
                let reportLoader = document.getElementById("reportLoader");
                reportLoader.style.display = "flex";
                reportLoader.setAttribute("aria-hidden", "false");
                $(this).prop("disabled", true);
                $.ajax({
                    url: "report-delete.php",
                    type: "POST",
                    data: { id: reportId },
                    dataType: "json",
                    success: function(response) {
                        alert(response.message);
                        if (response.status === "success") {
                            reportLoader.style.display = "none";
                            reportLoader.setAttribute("aria-hidden", "true");
                            reportRow.remove();
                        } else {
                            reportLoader.style.display = "none";
                            reportLoader.setAttribute("aria-hidden", "true");
                            reportRow.find(".deleteReport").prop("disabled", false);
                        }
                    },
                    error: function() {
                        reportLoader.style.display = "none";
                        reportLoader.setAttribute("aria-hidden", "true");
                        reportRow.find(".deleteReport").prop("disabled", false);
                        alert("Error deleting report.");
                    }
                });
            }
        });
    });
</script>

</body>
</html>
