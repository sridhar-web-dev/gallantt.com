<?php
class BoardController {
    private $db;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getAllBoards() {
        $stmt = $this->db->query("SELECT * FROM boards ORDER BY order_index ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBoardById($id) {
        $stmt = $this->db->prepare("SELECT * FROM boards WHERE id = ?");
        $stmt->execute([(int) $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBoard($title, $picture, $designation, $description) {
        $stmt = $this->db->query("SELECT MAX(order_index) as max_order FROM boards");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nextOrder = ($row['max_order'] ?? 0) + 1;

        $stmt = $this->db->prepare("INSERT INTO boards (title, picture, designation, description, order_index) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $picture, $designation, $description, $nextOrder]);
    }

    public function updateBoard($id, $title, $picture, $designation, $description) {
        $stmt = $this->db->prepare("UPDATE boards SET title = ?, picture = ?, designation = ?, description = ? WHERE id = ?");
        return $stmt->execute([$title, $picture, $designation, $description, $id]);
    }

    public function deleteBoard($id) {
        // 1. Fetch the image path from the database
        $stmt = $this->db->prepare("SELECT picture FROM boards WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row && !empty($row['picture'])) {
            $fullPathToFile = ABS_PATH . 'uploads/panels/' . basename($row['picture']);
            
            // FIXED: Check existence and delete using the EXACT same path mapping
            if (is_file($fullPathToFile)) {
                unlink($fullPathToFile);
            }
        }
    
        // 2. Delete the record from the database
        $stmt = $this->db->prepare("DELETE FROM boards WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function saveOrder($orderedIds) {
        $this->db->beginTransaction();
        try {
            foreach ($orderedIds as $index => $id) {
                $stmt = $this->db->prepare("UPDATE boards SET order_index = ? WHERE id = ?");
                $stmt->execute([$index + 1, $id]);
            }
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
?>