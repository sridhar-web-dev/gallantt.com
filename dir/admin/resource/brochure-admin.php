<?php

require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$brochure = new Brochure();

if (isset($_POST['add'])) {
    $business = $_POST['business_name'];
    $files = $_FILES['brochure_file'];
    $names = $_POST['brochure_name'];

    $uploadDir = 'uploads/brochures/';

    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

   

for ($i = 0; $i < count($files['name']); $i++) {
    if ($files['error'][$i] === 0) {
        $ext = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
        $date = date('dmYHis') . rand(100, 999);
        $safeBusiness = strtolower(preg_replace('/[^a-z0-9]/i', '_', $business));
        $filename = "{$safeBusiness}_brochure_{$date}.{$ext}";
        $filepath = $uploadDir . $filename;

        if (move_uploaded_file($files['tmp_name'][$i], $filepath)) {
            if ($brochure->addBrochure($business, $filepath, $names[$i])) { // Pass brochure name
                clearVarnishCache();
            }
        }
    }
}

    $message = "<div class='alert alert-success'>Brochures added.</div>";
}


if (isset($_POST['update'])) {
    $newName = $_POST['brochure_name'];

    $id = $_POST['brochure_id'];
    $filepath = null;

    if (!empty($_FILES['brochure_file']['name'])) {
        // Get business name from DB to construct file name
        $existing = $brochure->getBrochureById($id);
        $business = $existing['business_name'];
        $uploadDir = 'uploads/brochures/';
        if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);

        $ext = pathinfo($_FILES['brochure_file']['name'], PATHINFO_EXTENSION);
        $date = date('dmY');
        $safeBusiness = strtolower(preg_replace('/[^a-z0-9]/i', '_', $business));
        $filename = "{$safeBusiness}-brochure-{$date}.{$ext}";
        $filepath = $uploadDir . $filename;

        move_uploaded_file($_FILES['brochure_file']['tmp_name'], $filepath);
    }

   
$updated = $brochure->updateBrochure($id, $filepath, $newName);
if ($updated) {
    clearVarnishCache();
}
    $message = "<div class='alert alert-success'>Brochure Updated.</div>";
}


if (isset($_POST['delete']) && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    if ($brochure->deleteBrochure($id)) {
        clearVarnishCache();
    }
    $message = "<div class='alert alert-success'>Brochure deleted.</div>";
}


$allBrochures = $brochure->getBrochures();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?= ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <script src="<?php echo ABS_URL ?>dir/admin/ckeditor.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <?php require_once '../components/navbar/header.php'; ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card my-5" >
                    <div class="card-header">
                        <h2>Manage Business Brochures</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($message)) echo $message; ?>

<form method="post" enctype="multipart/form-data" class="mb-4" id="brochureForm">
    <div class="row g-3 brochure-group">
        <div class="col-md-5">
            <select name="business_name" class="form-select mb-3" required>
                <option value="">Select Business</option>
                <option value="steel">Steel</option>
                <option value="cement">Cement</option>
                <option value="real_estate">Real Estate</option>
            </select>
        </div>
    </div>

    <div id="brochureFields">
        <div class="row g-3 brochure-item align-items-end">
            <div class="col-md-5">
                <input type="text" name="brochure_name[]" class="form-control" placeholder="Enter Brochure Name" required>
            </div>
            <div class="col-md-5">
                <input type="file" name="brochure_file[]" class="form-control" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-success add-field">+</button>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" name="add" class="btn btn-primary">Add Brochures</button>
    </div>
</form>


    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Business</th>
                <th>Brochure Name</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($allBrochures as $i => $row): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= ucfirst(str_replace('_', ' ', $row['business_name'])) ?></td>
            <td><?= htmlspecialchars($row['brochure_name']) ?></td>
            <td><a href="<?= htmlspecialchars($row['file_path']) ?>" download>Download</a></td>
            <td>
                <form method="post" enctype="multipart/form-data" class="d-inline">
                    <input type="text" name="brochure_name" class="form-control mb-1 w-50" value="<?= htmlspecialchars($row['brochure_name']) ?>">

                    <input type="hidden" name="brochure_id" value="<?= $row['id'] ?>">
                    <input type="file" name="brochure_file" class="form-control mb-1 w-50">
                    <button type="submit" name="update" class="btn btn-sm btn-warning">Update</button>
                </form>
                <form method="post" onsubmit="return confirm('Delete this brochure?')" class="d-inline">
                    <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete" class="btn btn-sm btn-danger mt-1">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
$(document).ready(function () {
    $(document).on('click', '.add-field', function () {
        const field = `<div class="row g-3 brochure-item align-items-end mt-2">
            <div class="col-md-5">
                <input type="text" name="brochure_name[]" class="form-control" placeholder="Enter Brochure Name" required>
            </div>
            <div class="col-md-5">
                <input type="file" name="brochure_file[]" class="form-control" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-field">-</button>
            </div>
        </div>`;
        $('#brochureFields').append(field);
    });

    $(document).on('click', '.remove-field', function () {
        $(this).closest('.brochure-item').remove();
    });
});
</script>


</body>

</html>