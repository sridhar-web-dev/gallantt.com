<?php
class Resources {
    private $db;

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function getCategories() {
        $stmt = $this->db->prepare("SELECT id, name FROM web_resourcecategories ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name) {
        $stmt = $this->db->prepare("INSERT INTO web_resourcecategories (name) VALUES (:name)");
        $stmt->execute([':name' => $name]);
        return $this->db->lastInsertId();
    }
public function getAllResources() {
    $stmt = $this->db->prepare("SELECT * FROM web_resources ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function addResource($data) {
        $stmt = $this->db->prepare("INSERT INTO web_resources (category_id, resource_name, file_type, file_path) 
                                    VALUES (:category_id, :resource_name, :file_type, :file_path)");
        return $stmt->execute($data);
    }

    public function getResources() {
        $stmt = $this->db->prepare("SELECT r.id, r.resource_name, r.file_type, r.file_path, c.name AS category_name
                                    FROM web_resources r
                                    JOIN web_resourcecategories c ON r.category_id = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getResourceById($id) {
        $db = Database::getDB();
        $stmt = $db->prepare("SELECT * FROM web_resources WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

 public function getAllResourcesGroupedByCategory() {
    $sql = "SELECT 
                rc.id AS category_id, 
                rc.name AS category_name, 
                r.id AS resource_id, 
                r.resource_name, 
                r.file_path,
                r.file_type
            FROM web_resourcecategories rc
            INNER JOIN web_resources r ON rc.id = r.category_id
            ORDER BY rc.name, r.resource_name";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    $result = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $category = $row['category_name'];
        if (!isset($result[$category])) {
            $result[$category] = [];
        }
        $result[$category][] = [
            'name' => $row['resource_name'],
            'file' => $row['file_path'],
            'file_type' => $row['file_type']
        ];
    }

    return $result;
}


}
