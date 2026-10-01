<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get banner ID from the form (if it's an edit)
    $bannerId = $_POST['id'] ?? null;
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $image = $_FILES['image'] ?? null; // Add check for image

    // Process the image if uploaded
    $imageName = null; // Only store the file name (no path)
    if ($image && $image['error'] == 0) {
        // Define the upload directory and generate a unique file name
        $uploadDir = 'uploads/';
        $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION); // Get the file extension
        $imageName = "BANNER_" . date("YmdHis") . rand(100, 999) . "." . $fileExtension; // Only the file name

        // Validate the uploaded file is an image
        if (getimagesize($image['tmp_name']) === false) {
            echo 'Uploaded file is not an image.';
            exit;
        }

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($image['tmp_name'], $uploadDir . $imageName)) {
            echo 'Error uploading the image.';
            exit;
        }
    } elseif ($bannerId) {
        // If no new image is uploaded, keep the existing image
        $banner = new Banner();
        $bannerData = $banner->getBannerById($bannerId);
        $imageName = $bannerData['image']; // Use the existing image name from the database
    }

    // Check if we are creating or updating the banner
    $banner = new Banner();
    if ($bannerId) {
        // Update the banner (delete existing image if necessary)
        
        // Get the existing image path for deletion
        $bannerData = $banner->getBannerById($bannerId);
        $existingImage = $bannerData['image'];
        
        // Delete the old image file if a new image is uploaded
        if ($imageName !== $existingImage && file_exists('uploads/' . $existingImage)) {
            unlink('uploads/' . $existingImage); // Delete the existing image
        }
        
        // Update the banner
        $result = $banner->updateBanner($bannerId, $title, $subtitle, $imageName); // Pass the new file name
        if ($result) {
            echo 'Banner updated successfully.';
        } else {
            echo 'Error updating banner.';
        }
    } else {
        // Create a new banner
        $result = $banner->addBanner($title, $subtitle, $imageName); // Pass the file name
        if ($result) {
            echo 'Banner added successfully.';
        } else {
            echo 'Error adding banner.';
        }
    }
}
?>
