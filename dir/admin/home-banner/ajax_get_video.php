<?php
require_once '../../../config/config.php';
$video = new HomepageVideo();
$current = $video->getVideo();

if ($current) {
    echo json_encode([
        'status' => true,
        'video_path' => $current['video_path'],
        'video_name' => $current['video_name']
    ]);
} else {
    echo json_encode(['status' => false]);
}
?>
