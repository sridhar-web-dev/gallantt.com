<?php
require_once '../../../config/config.php';
$media = new Media();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'media_id'          => $_POST['media_id'] ?? null,
        'media_name'        => $_POST['media_name'],
        'category'          => $_POST['category'],
        'small_description' => $_POST['small_description'],
        'description'       => $_POST['description'],
        'date_of_post'      => $_POST['date_of_post'],
        'media_image'       => null
    ];
    // Handle image upload
    if (!empty($_FILES['media_image']['name'])) {
        $uploadDir = 'uploads/';
        $fileExt = pathinfo($_FILES['media_image']['name'], PATHINFO_EXTENSION);
        $imageName = "MEDIA_" . date('Ymdhis') . "_" . rand(100, 999) . "." . $fileExt;
        $uploadPath = $uploadDir . $imageName;
        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($fileExt), $allowedTypes)) {
            die("<div class='alert alert-danger'>Invalid image format. Allowed formats: JPG, PNG, GIF.</div>");
        }
        // Move uploaded file
        if (move_uploaded_file($_FILES['media_image']['tmp_name'], $uploadPath)) {
            $data['media_image'] = $imageName;
        } else {
            die("<div class='alert alert-danger'>Image upload failed.</div>");
        }
    }
    // Save Media using Class
    $result = $media->saveMedia($data);
    if ($result) {
        echo "Media successfully saved.";
    } else {
        echo "<div class='alert alert-danger'>Failed to save media.</div>";
    }
}
?>
