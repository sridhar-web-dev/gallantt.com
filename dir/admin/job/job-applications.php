<!-- job-applications.php -->
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
    <title>Job Applications</title>
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
        <div class="col-lg-10">
            <div class="card shadow-lg">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Job Applications</h4>
                </div>
                <div class="card-body">
                    <form id="applicationFilterForm" class="row g-2 mb-4">
                        <div class="col-md-5">
                            <label for="candidateNameFilter" class="form-label">Candidate name</label>
                            <input type="search" id="candidateNameFilter" class="form-control" placeholder="Search by name">
                        </div>
                        <div class="col-md-5">
                            <label for="candidateEmailFilter" class="form-label">Email address</label>
                            <input type="search" id="candidateEmailFilter" class="form-control" placeholder="Search by email">
                        </div>
                        <div class="col-md-2 d-flex align-items-end gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1">Filter</button>
                            <button type="button" id="resetApplicationFilter" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    <div id="applicationTableContainer">
                        <!-- Applications table loads here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script src="<?= ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        function loadApplications(page = 1) {
            $.ajax({
                url: 'fetch-applications.php',
                method: 'GET',
                data: {
                    page: page,
                    name: $('#candidateNameFilter').val().trim(),
                    email: $('#candidateEmailFilter').val().trim()
                },
                success: function (data) {
                    $('#applicationTableContainer').html(data);
                },
                error: function () {
                    $('#applicationTableContainer').html('<div class="text-danger">Failed to load applications.</div>');
                }
            });
        }

        loadApplications(); // Initial load

        $('#applicationFilterForm').on('submit', function (e) {
            e.preventDefault();
            loadApplications(1);
        });

        $('#resetApplicationFilter').on('click', function () {
            $('#candidateNameFilter, #candidateEmailFilter').val('');
            loadApplications(1);
        });

        $(document).on('click', '.application-page-link', function (e) {
            e.preventDefault();
            const page = $(this).data('page');
            loadApplications(page);
        });

        $(document).on('submit', '.go-to-application-page-form', function (e) {
            e.preventDefault();
            const input = $(this).find('input[type="number"]');
            const page = parseInt(input.val(), 10);
            const maxPage = parseInt(input.attr('max'), 10);

            if (page >= 1 && page <= maxPage) {
                loadApplications(page);
            } else {
                input[0].reportValidity();
            }
        });
    });
</script>

</body>
</html>
