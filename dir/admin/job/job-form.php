<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$job = new Job();
$jobData = [];
if (isset($_GET['job_id'])) {
    $jobData = $job->getJobById($_GET['job_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post Form</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
      <!-- CKEditor 5 CDN -->
      <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
        <div class="card shadow-lg">
        <div class="card-header bg-light text-dark d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><?= isset($jobData['job_id']) ? 'Edit Job' : 'Create Job' ?></h4>
            <a href="job-list.php" class="btn btn-secondary">Manage Jobs</a>
        </div>
        <div class="card-body">
        <div id="message" class="mt-3"></div>
            <form id="jobForm">
                <input type="hidden" name="job_id" value="<?= $jobData['job_id'] ?? '' ?>">
                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" class="form-control" name="job_title" value="<?= $jobData['job_title'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
    <label class="form-label">Department</label>
    <select class="form-control" name="department" required>
        <option value="">-- Select Department --</option>
        <option value="Steel" <?= (isset($jobData['department']) && $jobData['department'] === 'Steel') ? 'selected' : '' ?>>Steel</option>
        <option value="Cement" <?= (isset($jobData['department']) && $jobData['department'] === 'Cement') ? 'selected' : '' ?>>Cement</option>
        <option value="Real Estate" <?= (isset($jobData['department']) && $jobData['department'] === 'Real Estate') ? 'selected' : '' ?>>Real Estate</option>
        <option value="Agro" <?= (isset($jobData['department']) && $jobData['department'] === 'Agro') ? 'selected' : '' ?>>Agro</option>
    </select>
</div>
                <div class="mb-3">
                    <label class="form-label">Experience</label>
                    <input type="text" class="form-control" name="experience" value="<?= $jobData['experience'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Job Type</label>
                    <select class="form-control" name="job_type" required>
                        <option value="Full-Time" <?= isset($jobData['job_type']) && $jobData['job_type'] == 'Full-Time' ? 'selected' : '' ?>>Full-Time</option>
                        <option value="Part-Time" <?= isset($jobData['job_type']) && $jobData['job_type'] == 'Part-Time' ? 'selected' : '' ?>>Part-Time</option>
                        <option value="Contract" <?= isset($jobData['job_type']) && $jobData['job_type'] == 'Contract' ? 'selected' : '' ?>>Contract</option>
                    </select>
                </div>
<div class="mb-3">
    <label class="form-label">Location</label>
    <select class="form-control" name="location" required>
        <option value="">-- Select Location --</option>
        <?php
        $states = [
            "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", 
            "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", 
            "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", 
            "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", 
            "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", 
            "Uttar Pradesh", "Uttarakhand", "West Bengal",
            "Andaman and Nicobar Islands", "Chandigarh", "Dadra and Nagar Haveli and Daman and Diu",
            "Delhi", "Jammu and Kashmir", "Ladakh", "Lakshadweep", "Puducherry"
        ];
        foreach ($states as $state) {
            $selected = (isset($jobData['location']) && $jobData['location'] === $state) ? 'selected' : '';
            echo "<option value=\"$state\" $selected>$state</option>";
        }
        ?>
    </select>
</div>
                <div class="mb-3">
                    <label class="form-label">No. of Vacancies</label>
                    <input type="number" class="form-control" name="vacancies" value="<?= $jobData['vacancies'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Job Description</label>
                    <textarea id="editor" class="form-control" name="job_description" required><?= $jobData['job_description'] ?? '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100"><?= isset($jobData['job_id']) ? 'Update' : 'Submit' ?></button>
            </form>
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
        let jobEditor;
// Initialize CKEditor
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        jobEditor = editor;
        editor.ui.view.editable.element.style.minHeight = '300px'; // Set editor height
        // Remove required attribute from the hidden textarea to prevent validation issues
        $("textarea[name='job_description']").removeAttr('required');
    })
    .catch(error => {
        console.error("CKEditor initialization failed:", error);
    });
        $("#jobForm").on("submit", function (e) {
            e.preventDefault();
             // Ensure CKEditor is initialized before accessing getData()
        if (jobEditor) {
            let editorContent = jobEditor.getData().trim(); // Trim to prevent spaces being counted
            $("textarea[name='job_description']").val(editorContent);
            // If CKEditor is empty, prevent form submission and show an error
            if (editorContent === "") {
                $("#message").html('<div class="alert alert-danger">Job description is required.</div>');
                return;
            }
        } else {
            console.warn("CKEditor not initialized. Submitting empty content.");
            $("textarea[name='job_description']").val(""); // Fallback to empty text
        }
            $.ajax({
                url: "job-submit.php",
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    $("#message").html(response).addClass('alert alert-success');
                    setTimeout(() => window.location.href = 'job-list.php', 2000);
                }
            });
        });
    });
</script>
</body>
</html>
