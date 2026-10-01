<?php
class CorporateReport
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
    public function getAllReports()
    {
        $db   = Database::getDB();
        $stmt = $db->query("SELECT * FROM web_corporatereports ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Fetch a single report by ID
    public function getReportById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM web_corporatereports WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addReport($title, $description, $doc)
    {
        try {
            $query = "INSERT INTO web_corporatereports (title, description, doc) VALUES (:title, :description, :doc)";
            $stmt  = $this->db->prepare($query);
            return $stmt->execute([
                ':title'       => $title,
                ':description' => $description,
                ':doc'         => $doc,
            ]);
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
    public function updateReport($id, $title, $description, $doc)
    {
        $db   = Database::getDB();
        $stmt = $db->prepare("UPDATE web_corporatereports SET title = ?, `description` = ?, doc = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $doc, $id]);
    }
    public function deleteReport($id)
    {
        $db   = Database::getDB();
        $stmt = $db->prepare("DELETE FROM web_corporatereports WHERE id = ?");
        return $stmt->execute([$id]);
    }
    // Dashboard
    public function getTotalReports()
    {
        $db    = Database::getDB();
        $query = "SELECT COUNT(*) AS total FROM web_corporatereports";
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getLatestReports($limit = 3) {
        $db = Database::getDB();
        $sql = "SELECT * FROM web_corporatereports ORDER BY created_at DESC LIMIT :limit";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    
}
