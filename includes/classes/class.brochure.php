<?php
class Brochure {
    private $db;

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function getBrochures($business = '') {
        $sql = "SELECT * FROM business_brochures";
        if ($business) {
            $sql .= " WHERE business_name = :business";
        }
        $stmt = $this->db->prepare($sql);
        if ($business) {
            $stmt->bindParam(":business", $business);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBrochureById($id) {
        $stmt = $this->db->prepare("SELECT * FROM business_brochures WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function addBrochure($business, $filepath) {
    //     $stmt = $this->db->prepare("INSERT INTO business_brochures (business_name, file_path) VALUES (:business, :path)");
    //     $stmt->bindParam(":business", $business);
    //     $stmt->bindParam(":path", $filepath);
    //     return $stmt->execute();
    // }

    public function addBrochure($business, $filepath, $brochureName) {
    $stmt = $this->db->prepare("INSERT INTO business_brochures (business_name, file_path, brochure_name) VALUES (:business, :path, :brochure_name)");
    $stmt->bindParam(":business", $business);
    $stmt->bindParam(":path", $filepath);
    $stmt->bindParam(":brochure_name", $brochureName);
    return $stmt->execute();
}



    // public function updateBrochure($id, $filepath = null) {
    //     $brochure = $this->getBrochureById($id);
    //     if ($brochure && $filepath) {
    //         if (file_exists($brochure['file_path'])) {
    //             unlink($brochure['file_path']);
    //         }
    //     }

    //     if ($filepath) {
    //         $stmt = $this->db->prepare("UPDATE business_brochures SET file_path = :path WHERE id = :id");
    //         $stmt->bindParam(":path", $filepath);
    //         $stmt->bindParam(":id", $id);
    //         return $stmt->execute();
    //     }

    //     return false;
    // }

  public function updateBrochure($id, $filepath = null, $brochureName = null) {
    $brochure = $this->getBrochureById($id);
    if ($brochure && $filepath) {
        if (file_exists($brochure['file_path'])) {
            unlink($brochure['file_path']);
        }
    }

    if ($filepath && $brochureName) {
        $stmt = $this->db->prepare("UPDATE business_brochures SET file_path = :path, brochure_name = :brochure_name WHERE id = :id");
        $stmt->bindParam(":path", $filepath);
        $stmt->bindParam(":brochure_name", $brochureName);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    } elseif ($brochureName) {
        $stmt = $this->db->prepare("UPDATE business_brochures SET brochure_name = :brochure_name WHERE id = :id");
        $stmt->bindParam(":brochure_name", $brochureName);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    return false;
}



    public function deleteBrochure($id) {
        $brochure = $this->getBrochureById($id);
        if ($brochure && file_exists($brochure['file_path'])) {
            unlink($brochure['file_path']);
        }

        $stmt = $this->db->prepare("DELETE FROM business_brochures WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}

?>
