<!-- <?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category'];
    $subcategory_id = $_POST['subcategory'];
    $titles = $_POST['report_title'];
    $files = $_FILES['report_file'];

    $uploadDir = "uploads/reports/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $reportObj = new Investorreport();
    $success = true;

    for ($i = 0; $i < count($titles); $i++) {
        $title = trim($titles[$i]);
        $fileName = $files['name'][$i];
        $tmpName = $files['tmp_name'][$i];

        if (!empty($title) && !empty($fileName)) {
            $newFileName = time() . '_' . basename($fileName);
            $targetFile = $uploadDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFile)) {
                $inserted = $reportObj->addReport($category_id, $subcategory_id, $title, $newFileName);
                if (!$inserted) {
                    $success = false;
                }
            } else {
                $success = false;
            }
        }
    }

    if ($success) {
        clearVarnishCache();
        echo json_encode(['status' => 'success', 'message' => 'Reports uploaded successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Some files could not be uploaded.']);
    }
} 
