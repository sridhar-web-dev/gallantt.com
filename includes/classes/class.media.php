<?php
class Media
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
 public function getAllMediaFront() {
    $stmt = $this->db->prepare("SELECT media_name, category, description, media_image, media_file 
                                FROM web_mediagallery 
                                WHERE status = 'live' 
                                ORDER BY id DESC 
                                LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function addMedia($media_name, $section, $category, $description, $date_of_post, $media_image, $media_type, $media_file = '', $media_file_type = '')
    {
        $query = "INSERT INTO web_mediagallery
                  (media_name, section, category, description, date_of_post, media_image, media_type, status, media_file, media_file_type)
                  VALUES (:media_name, :section, :category, :description, :date_of_post, :media_image, :media_type, :status, :media_file, :media_file_type)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':media_name'   => $media_name,
            ':category'     => $category,
            ':section'      => $section,
            ':description'  => $description,
            ':date_of_post' => $date_of_post,
            ':media_image'  => $media_image,
            ':media_type'   => $media_type,
            ':status'       => 'live',
            ':media_file'   => $media_file,
            ':media_file_type' => $media_file_type,
        ]);
    }

    public function updateMedia($media_id, $media_name, $section, $category, $description, $date_of_post, $media_image, $media_type, $media_file = '', $media_file_type = '')
    {
        $query = "UPDATE web_mediagallery
                  SET media_name = :media_name, category = :category, section = :section,
                      description = :description, date_of_post = :date_of_post, media_image = :media_image, media_type = :media_type,
                      media_file = :media_file, media_file_type = :media_file_type
                  WHERE id = :media_id";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':media_name'   => $media_name,
            ':section'      => $section,
            ':category'     => $category,
            ':description'  => $description,
            ':date_of_post' => $date_of_post,
            ':media_image'  => $media_image,
            ':media_type'   => $media_type,
            ':media_file'   => $media_file,
            ':media_file_type' => $media_file_type,
            ':media_id'     => $media_id,
        ]);
    }

    public function getMediaById($media_id)
    {
        $query = "SELECT * FROM web_mediagallery WHERE id = :media_id";
        $stmt  = $this->db->prepare($query);
        $stmt->execute([':media_id' => $media_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteMedia($media_id)
    {
        $query = "SELECT media_image, media_file FROM web_mediagallery WHERE id = :id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(":id", $media_id, PDO::PARAM_INT);
        $stmt->execute();
        $media = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($media && !empty($media['media_image'])) {
            $uploadDir = ABS_PATH . 'uploads/media/uploads/';
            foreach ([$media['media_image'], $media['media_file']] as $fileName) {
                $filePath = $uploadDir . basename($fileName);
                if ($fileName && file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $query = "DELETE FROM web_mediagallery WHERE id = :id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(":id", $media_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // public function getAllMedia($section = null)
    // {
    //     if ($section) {
    //         $query = "SELECT * FROM web_mediagallery WHERE status = 'live' AND section = :section ORDER BY last_update DESC";
    //         $stmt  = $this->db->prepare($query);
    //         $stmt->bindParam(':section', $section);
    //     } else {
    //         $query = "SELECT * FROM web_mediagallery WHERE status = 'live' ORDER BY last_update DESC";
    //         $stmt  = $this->db->prepare($query);
    //     }
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function getAllMedia($section = null, $limit = null, $offset = 0)
{
    if ($section) {
        $query = "SELECT * FROM web_mediagallery WHERE status = 'live' AND section = :section ORDER BY last_update DESC";
    } else {
        $query = "SELECT * FROM web_mediagallery WHERE status = 'live' ORDER BY last_update DESC";
    }

    // Add LIMIT clause only if $limit is provided
    if ($limit !== null) {
        $query .= " LIMIT :offset, :limit";
    }

    $stmt = $this->db->prepare($query);

    if ($section) {
        $stmt->bindValue(':section', $section);
    }

    if ($limit !== null) {
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getAllMediaWithLimit($limit)
    {
        $query = "SELECT * FROM web_mediagallery WHERE status = 'live' ORDER BY last_update DESC LIMIT :limit";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateMediaStatus($mediaId, $status)
    {
        $query = "UPDATE web_mediagallery SET status = :status WHERE id = :media_id";
        $stmt  = $this->db->prepare($query);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        $stmt->bindParam(":media_id", $mediaId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getActiveMedia()
    {
        return $this->db->query("SELECT COUNT(*) FROM web_mediagallery WHERE status = 'live'")->fetchColumn();
    }

    public function getDisabledMedia()
    {
        return $this->db->query("SELECT COUNT(*) FROM web_mediagallery WHERE status = 'disabled'")->fetchColumn();
    }

    public function getTotalMedia()
    {
        $query = "SELECT COUNT(*) AS total FROM web_mediagallery";
        $stmt  = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
