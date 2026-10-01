<?php
require_once '../../../config/config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
$db = Database::getDB();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sno = $_POST['sno'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // First, get the existing image path from DB to delete later if needed
    $stmtOld = $db->prepare("SELECT image FROM web_employeewelfare WHERE id = ?");
    $stmtOld->execute([$sno]);
    $oldRecord = $stmtOld->fetch(PDO::FETCH_ASSOC);
    $oldImagePath = $oldRecord ? $oldRecord['image'] : '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION); // Get extension

        // Create custom filename: EMP_WEL_dd_mm_yy_random
        $datePart = date('d_m_y'); // e.g. 25_05_20
        $randomPart = rand(100, 999); // 3 digit random number

        $newFileName = "EMP_WEL_{$datePart}_{$randomPart}." . $imageExt;
        $imagePath = 'uploads/' . $newFileName;

        // Create 'uploads' directory if not exists
        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        move_uploaded_file($imageTmp, $imagePath);

        // Delete old image file if it exists and is different from new file
        if (!empty($oldImagePath) && file_exists($oldImagePath) && $oldImagePath !== $imagePath) {
            unlink($oldImagePath);
        }
    } else {
        $imagePath = $_POST['existing_image'];
    }

    $stmt = $db->prepare("UPDATE web_employeewelfare SET title = ?, description = ?, image = ? WHERE id = ?");
    $stmt->execute([$title, $description, $imagePath, $sno]);
    clearVarnishCache();

    $_SESSION['message'] = ['type' => 'success', 'text' => 'Record updated successfully'];
    header('Location: index.php');
    exit;
}


$sno = $_GET['sno'];
$stmt = $db->prepare("SELECT * FROM web_employeewelfare WHERE id = ?");
$stmt->execute([$sno]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    $_SESSION['message'] = ['type' => 'danger', 'text' => 'Record not found'];
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Welfare</title>
    <link rel="stylesheet" href="../components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL?>assets/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php require_once '../components/navbar/header.php'; ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5>Edit Employee Welfare</h5>
                </div>
                <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data" class="needs-validation" novalidate>
        <input type="hidden" name="sno" value="<?php echo htmlspecialchars($row['id']); ?>">
        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($row['image']); ?>">
        <div class="mb-3">
            <label>Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required maxlength="255" value="<?php echo htmlspecialchars($row['title']); ?>">
            <div class="invalid-feedback">Title is required.</div>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <br>
            <img src="<?php echo ABS_URL ?>uploads/employee-welfare/<?php echo htmlspecialchars($row['image']); ?>" alt="Image" width="100" class="mb-2">
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="form-text text-muted">Leave empty if you don't want to change the image.</small>
        </div>
        <div class="mb-3">
            <label>Small Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control" rows="3" maxlength="500" required><?php echo htmlspecialchars($row['description']); ?></textarea>
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
(() => {
    'use strict';
    const form = document.querySelector('form');
    form.addEventListener('submit', e => {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
})();
</script>
</body>
</html>
