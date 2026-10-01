<?php
class HomepageVideo {
    private $db;

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function getAllVideos()
{
    $db = Database::getDB();
    $stmt = $db->query("SELECT * FROM web_homepagevideo ORDER BY uploaded_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function deleteVideo($id) {
    $db = Database::getDB();

    $stmt = $db->prepare("SELECT video_name FROM web_homepagevideo WHERE id = ?");
    $stmt->execute([$id]);
    $video = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($video) {
        $path = './uploads/videos/' . $video['video_name'];
        if (file_exists($path)) {
            unlink($path); // delete the actual file
        }

        $stmt = $db->prepare("DELETE FROM web_homepagevideo WHERE id = ?");
        $stmt->execute([$id]);

        return ['status' => true, 'msg' => 'Video deleted successfully.'];
    }
    return ['status' => false, 'msg' => 'Video not found.'];
}



    // public function updateVideo($file) {
    //     $existing = $this->getVideo();

    //     // Validate
    //     $allowed = ['video/mp4', 'video/avi', 'video/mov', 'video/webm'];
    //     if (!in_array($file['type'], $allowed)) {
    //         return ['status' => false, 'msg' => 'Only video files are allowed.'];
    //     }
    //     if ($file['size'] > 50 * 1024 * 1024) {
    //         return ['status' => false, 'msg' => 'Maximum file size is 50MB.'];
    //     }

    //     // Delete old file
    //     if ($existing && file_exists($existing['video_path'])) {
    //         unlink($existing['video_path']);
    //         $stmt = $this->db->prepare("DELETE FROM web_homepagevideo");
    //         $stmt->execute();
    //     }

    //     // Upload new file
    //     $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    //     $newName = 'homepage_video_' . time() . '.' . $ext;
    //     $uploadDir = 'uploads/videos/';
    //     if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    //     $targetPath = $uploadDir . $newName;

    //     if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    //         $stmt = $this->db->prepare("INSERT INTO web_homepagevideo (video_name, video_path) VALUES (?, ?)");
    //         $stmt->execute([$newName, $targetPath]);
    //         return ['status' => true, 'msg' => 'Video updated successfully.'];
    //     } else {
    //         return ['status' => false, 'msg' => 'Failed to upload video.'];
    //     }
    // }
public function addVideo($file)
{
    $uploadDir = 'uploads/videos/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $originalName = basename($file['name']);
    $renamedName = time() . '_' . $originalName;
    $targetFile = $uploadDir . $renamedName;

    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        $db = Database::getDB();
        $stmt = $db->prepare("INSERT INTO web_homepagevideo (video_path, video_name, uploaded_at) VALUES (?, ?, NOW())");
        $stmt->execute(['uploads/videos/' . $renamedName, $renamedName]); // renamed name stored in both

        return ['status' => true, 'msg' => 'Video uploaded successfully.'];
    }

    return ['status' => false, 'msg' => 'Failed to upload video.'];
}



}
?>
