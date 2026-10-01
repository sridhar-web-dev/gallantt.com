<?php
require_once '../../../config/config.php';

$video = new HomepageVideo();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['homepage_video'])) {
    // $result = $video->updateVideo($_FILES['homepage_video']);
    $result = $video->addVideo($_FILES['homepage_video']);
    if ($result['status']) {
        clearVarnishCache();
    }

    echo json_encode($result);
} else {
    echo json_encode(['status' => false, 'msg' => 'Invalid request.']);
}
?>
