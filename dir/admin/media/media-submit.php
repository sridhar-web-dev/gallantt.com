<?php
require_once '../../../config/config.php';

$media = new Media();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $media_id       = $_POST['media_id'] ?? null;
    $media_name     = $_POST['media_name'] ?? '';
    $category       = $_POST['category'] ?? '';
    $section        = $_POST['section'] ?? '';
    $description    = $_POST['description'] ?? '';
    $date_of_post   = $_POST['date_of_post'] ?? '';
    $media_type     = $_POST['media_type'] ?? ''; // ✅ Directly get from form
    $media_image    = '';
    $media_file     = '';
    $media_file_type = '';

    if ($media_name === '' || $section === '' || $category === '' || $description === '' || $date_of_post === '' || $media_type === '') {
        echo 'All required media fields must be completed.';
        exit;
    }

    $uploadDir = ABS_PATH . 'uploads/media/uploads/';
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
        echo 'Unable to create media upload directory.';
        exit;
    }

    $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'video/mp4', 'video/webm', 'video/quicktime'];
    $allowedFileTypes = ['video/mp4', 'video/webm', 'video/quicktime', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'];

    $uploadedPaths = [];

    // Handle image/video thumbnail upload
    if (!empty($_FILES['media_image']['name'])) {
        if ($_FILES['media_image']['error'] !== UPLOAD_ERR_OK || $_FILES['media_image']['size'] > 100 * 1024 * 1024) {
            echo 'Thumbnail upload is invalid or exceeds 100MB.';
            exit;
        }
        $fileMime = mime_content_type($_FILES['media_image']['tmp_name']);
        if (!in_array($fileMime, $allowedImageTypes, true)) {
            echo 'Invalid thumbnail file type.';
            exit;
        }
        $fileExt = strtolower(pathinfo($_FILES['media_image']['name'], PATHINFO_EXTENSION));
        $fileName = "MEDIA_IMG_" . date('Ymdhis') . "_" . rand(100, 999) . "." . $fileExt;
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['media_image']['tmp_name'], $targetFile)) {
            $media_image = $fileName;
            $uploadedPaths[] = $targetFile;

            // ✅ If media_type not manually chosen, fallback to file MIME
            if (empty($media_type)) {
                $fileType = mime_content_type($targetFile);
                if (strpos($fileType, 'image') !== false) {
                    $media_type = 'image';
                } elseif (strpos($fileType, 'video') !== false) {
                    $media_type = 'video';
                } elseif (strpos($fileType, 'application') !== false) {
                    $media_type = 'document';
                } else {
                    $media_type = 'unknown';
                }
            }
        }
    }

    // Handle additional media file upload (video/document)
    if (!empty($_FILES['media_file']['name'])) {
        if ($_FILES['media_file']['error'] !== UPLOAD_ERR_OK || $_FILES['media_file']['size'] > 100 * 1024 * 1024) {
            echo 'Media file is invalid or exceeds 100MB.';
            exit;
        }
        $fileMime2 = mime_content_type($_FILES['media_file']['tmp_name']);
        if (!in_array($fileMime2, $allowedFileTypes, true)) {
            echo 'Invalid media file type.';
            exit;
        }
        $fileExt2 = strtolower(pathinfo($_FILES['media_file']['name'], PATHINFO_EXTENSION));
        $fileName2 = "MEDIA_FILE_" . date('Ymdhis') . "_" . rand(100, 999) . "." . $fileExt2;
        $targetFile2 = $uploadDir . $fileName2;

        if (move_uploaded_file($_FILES['media_file']['tmp_name'], $targetFile2)) {
            $media_file = $fileName2;
            $uploadedPaths[] = $targetFile2;

            // Detect file type for uploaded media file
            $fileType2 = mime_content_type($targetFile2);
            if (strpos($fileType2, 'video') !== false) {
                $media_file_type = 'video';
            } elseif (strpos($fileType2, 'application') !== false) {
                $media_file_type = 'document';
            } else {
                $media_file_type = 'unknown';
            }
        }
    }

    // ✅ Insert or update logic
    if ($media_id) {
        $existingMedia = $media->getMediaById($media_id);
        if (!$existingMedia) {
            echo 'Media record not found.';
            exit;
        }

        // Replace image if new uploaded
        $oldImage = !empty($existingMedia['media_image']) ? $uploadDir . basename($existingMedia['media_image']) : '';
        $oldFile = !empty($existingMedia['media_file']) ? $uploadDir . basename($existingMedia['media_file']) : '';
        if (!empty($media_image) && !empty($existingMedia['media_image'])) {
        } else {
            $media_image = $existingMedia['media_image'];
        }

        // Replace file if new uploaded
        if (!empty($media_file) && !empty($existingMedia['media_file'])) {
        } else {
            $media_file = $existingMedia['media_file'];
            $media_file_type = $existingMedia['media_file_type'];
        }

        // ✅ Keep existing media_type if not changed
        if (empty($media_type)) {
            $media_type = $existingMedia['media_type'];
        }

        $update = $media->updateMedia(
            $media_id, $media_name, $section, $category, $description, $date_of_post,
            $media_image, $media_type, $media_file, $media_file_type
        );
        if ($update) {
            if ($oldImage && $media_image !== $existingMedia['media_image'] && file_exists($oldImage)) unlink($oldImage);
            if ($oldFile && $media_file !== $existingMedia['media_file'] && file_exists($oldFile)) unlink($oldFile);
            clearVarnishCache();
            echo 'Media updated successfully!';
        } else {
            echo 'Update failed.';
        }
    } else {
        if (empty($media_image)) {
            echo 'A thumbnail image or video is required.';
            exit;
        }
        $insert = $media->addMedia(
            $media_name, $section, $category, $description, $date_of_post,
            $media_image, $media_type, $media_file, $media_file_type
        );
        if ($insert) {
            clearVarnishCache();
            echo 'Media added successfully!';
        } else {
            echo 'Insertion failed.';
        }
    }
}
?>