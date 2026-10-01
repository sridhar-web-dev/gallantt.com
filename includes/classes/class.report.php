<?php
class Report {
    private $db;
    public function __construct() {
        $this->db = Database::getDB();
    }
    public function getReport() {
        $stmt = $this->db->query("SELECT * FROM web_reports ORDER BY id DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteOldReport($filename) {
        $filePath = __DIR__ . '/../uploads/' . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $this->db->exec("DELETE FROM web_reports");
    }
    public function uploadNewReport($filename) {
        $stmt = $this->db->prepare("INSERT INTO web_reports (filename, uploaded_on) VALUES (?, NOW())");
        return $stmt->execute([$filename]);
    }
}
