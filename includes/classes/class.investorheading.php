<?php
class InvestorHeading {
    private $db;
    public function __construct() {
        $this->db = Database::getDB();
    }
    public function getHeading() {
        $stmt = $this->db->prepare("SELECT * FROM web_investorreportheading LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addHeading($title) {
        $stmt = $this->db->prepare("INSERT INTO web_investorreportheading (title) VALUES (:title)");
        return $stmt->execute([':title' => $title]);
    }
    public function updateHeading($title) {
        $stmt = $this->db->prepare("UPDATE web_investorreportheading SET title = :title WHERE id = 1");
        return $stmt->execute([':title' => $title]);
    }
}
?>
