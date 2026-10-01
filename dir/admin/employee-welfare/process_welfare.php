<?php 
require_once '../../../config/config.php';
session_start(); // Start session for flash messages
if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image = $_FILES['image'] ?? null;
    $errors = [];

    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    if (empty($description)) {
        $errors[] = "Description is required.";
    }
    if (!$image || $image['error'] !== 0) {
        $errors[] = "Valid image file is required.";
    }

    if (empty($errors)) {
        $uploadDir = ABS_PATH . 'uploads/employee-welfare/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $datePart = date('y_m_d');
        $randomNumber = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        $fileName = "EMP_WEL_{$datePart}_{$randomNumber}." . $extension;
        $targetPath = $uploadDir . $fileName;

        if (move_uploaded_file($image['tmp_name'], $targetPath)) {
            $db = Database::getDB();
            $stmt = $db->prepare("INSERT INTO web_employeewelfare (title, image, description) VALUES (?, ?, ?)");
            $stmt->execute([$title, $fileName, $description]);
            clearVarnishCache();

            $_SESSION['message'] = ['type' => 'success', 'text' => '✅ Data saved successfully.'];
        } else {
            $_SESSION['message'] = ['type' => 'danger', 'text' => '❌ Failed to upload image.'];
        }
    } else {
        $_SESSION['message'] = ['type' => 'danger', 'text' => implode('<br>', $errors)];
    }

    header("Location: index.php"); 
    exit;
}
