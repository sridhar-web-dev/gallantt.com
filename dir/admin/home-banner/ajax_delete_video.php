<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $video = new HomepageVideo();
    $response = $video->deleteVideo((int)$_POST['id']);
    if ($response['status']) {
        clearVarnishCache();
    }
    echo json_encode($response);
} else {
    echo json_encode(['status' => false, 'msg' => 'Invalid request.']);
}
