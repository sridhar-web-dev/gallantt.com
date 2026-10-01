<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$report = new CorporateReport(); // Assuming you have a class for handling reports
$reportData = null;

if (isset($_GET['id'])) {
    $reportData = $report->getReportById($_GET['id']);
}
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
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <style>
        .report-loader { position: fixed; inset: 0; z-index: 1060; display: none; align-items: center; justify-content: center; background: rgba(248, 249, 250, 0.86); backdrop-filter: blur(3px); }
        .report-loader-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12); text-align: center; }
        .report-wireframe-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: report-wireframe-shimmer 1.2s linear infinite; }
        .report-wireframe-line.short { width: 58%; }
        .report-wireframe-line.long { width: 84%; }
        @keyframes report-wireframe-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
        .report-loader-text { margin-top: 18px; color: #495057; font-weight: 600; }
    </style>
</head>
<body>
<div id="reportLoader" class="report-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="report-loader-card">
        <div class="report-wireframe-line short"></div>
        <div class="report-wireframe-line long"></div>
        <div class="report-wireframe-line long"></div>
        <div class="report-loader-text" id="reportLoaderText">Saving corporate report...</div>
    </div>
</div>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
        <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2><?= isset($reportData) ? 'Edit Corporate Report' : 'Create Corporate Report' ?></h2>
            <div>
            
            <a href="./report-list.php" class="btn btn-secondary ">Manage Report</a>
            </div>
        </div>
        <div class="card-body">
            <div id="message" class="mt-3"></div>
            <form id="reportForm" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $reportData['id'] ?? '' ?>">

                <div class="mb-3">
                    <label>Report Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $reportData['title'] ?? '' ?>" required>
                </div>

                <div class="mb-3">
                    <label>Report Document</label>
                    <div id="docPreview" class="mb-2">
                        <?php if (isset($reportData) && !empty($reportData['doc'])) : ?>
                            <a href="uploads/<?= $reportData['doc'] ?>" target="_blank">
                                <i class="fas fa-file-alt"></i> View Current Document
                            </a>
                        <?php endif; ?>
                    </div>
                    <input type="file" class="form-control" name="doc" id="docInput" accept=".pdf,.doc,.docx" <?= isset($reportData) ? '' : 'required' ?>>
                </div>

                <div class="mb-3">
                    <label>Report Description</label>
                    <textarea id="editor" class="form-control" name="description" required style="position: absolute; left: -9999px;">
                        <?= $reportData['desc'] ?? '' ?>
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100"><?= isset($reportData) ? 'Update' : 'Submit' ?></button>
            </form>
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
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    let reportEditor;
    
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            reportEditor = editor;
            editor.ui.view.editable.element.style.minHeight = '300px';
            $("textarea[name='description']").removeAttr('required');
        })
        .catch(error => {
            console.error("CKEditor initialization failed:", error);
        });

    // Form Submission with CKEditor Content
    $("#reportForm").on("submit", function(e) {
        e.preventDefault();

        // Ensure CKEditor content is not empty
        if (reportEditor) {
            let editorContent = reportEditor.getData().trim();
            $("textarea[name='description']").val(editorContent);
            if (editorContent === "") {
                $("#message").html('<div class="alert alert-danger">Report description is required.</div>');
                return;
            }
        }

        var formData = new FormData(this);
        const reportLoader = document.getElementById("reportLoader");
        document.getElementById("reportLoaderText").textContent = <?= json_encode(isset($reportData) ? 'Updating corporate report...' : 'Creating corporate report...') ?>;
        reportLoader.style.display = "flex";
        reportLoader.setAttribute("aria-hidden", "false");
        $(this).find("button[type='submit']").prop("disabled", true).text("Processing...");
        $.ajax({
            url: "report-submit.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                response = JSON.parse(response);
                $("#message").html(response.message).addClass('alert alert-success');
                setTimeout(() => window.location.href = 'report-list.php', 2000);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                $("#message").html('<div class="alert alert-danger">Submission failed. Please try again.</div>');
                reportLoader.style.display = "none";
                reportLoader.setAttribute("aria-hidden", "true");
                $("#reportForm button[type='submit']").prop("disabled", false).text(<?= json_encode(isset($reportData) ? 'Update' : 'Submit') ?>);
            }
        });
    });
});
</script>
</body>
</html>
