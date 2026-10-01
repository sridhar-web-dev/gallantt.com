<?php
require_once '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['name'])) {
    $video = new HomepageVideo();
    $response = $video->updateVideoName((int)$_POST['id'], trim($_POST['name']));
    if (!empty($response['status'])) {
        clearVarnishCache();
    }
    echo json_encode($response);
} else {
    echo json_encode(['status' => false, 'msg' => 'Invalid request.']);
}
