<?php
class FinancialReport {
    private $db;
    public function __construct() {
        $this->db = Database::getDB();
    }
    public function saveReport($name, $filename) {
        $stmt = $this->db->prepare("INSERT INTO web_financialreports (report_name, report_file) VALUES (?, ?)");
        return $stmt->execute([$name, $filename]);
    }
 



    public function getAllReports($limit, $offset) {
        $stmt = $this->db->prepare("SELECT * FROM web_financialreports LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalReports() {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM web_financialreports");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getReportById($id) {
        $stmt = $this->db->prepare("SELECT * FROM web_financialreports WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateReport($id, $name, $filename = null) {
        if ($filename) {
            $stmt = $this->db->prepare("UPDATE web_financialreports SET report_name = ?, report_file = ? WHERE id = ?");
            return $stmt->execute([$name, $filename, $id]);
        } else {
            $stmt = $this->db->prepare("UPDATE web_financialreports SET report_name = ? WHERE id = ?");
            return $stmt->execute([$name, $id]);
        }
    }
    public function deleteReport($id) {
        $stmt = $this->db->prepare("DELETE FROM web_financialreports WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function getAllReports_front() {
        $sql = "SELECT report_name, report_file FROM web_financialreports ORDER BY report_name ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hightlight

    public function saveHighlight($highlight, $consolidated) {
    $stmt = $this->db->prepare("INSERT INTO web_financialhighlight (highlights, consolidated) VALUES (?, ?)");
    return $stmt->execute([$highlight, $consolidated]);
}

 // Fetch paginated highlights
    public function getAllHighlights($limit, $offset) {
        $stmt = $this->db->prepare("SELECT * FROM web_financialhighlight ORDER BY id DESC LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get total highlight count
    public function getTotalHighlights() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM web_financialhighlight");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function getHighlights($limit, $offset) {
    $stmt = $this->db->prepare("SELECT * FROM web_financialhighlight ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bindValue(1, $limit, PDO::PARAM_INT);
    $stmt->bindValue(2, $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// public function getTotalHighlights() {
//     $stmt = $this->db->query("SELECT COUNT(*) FROM web_financialhighlight");
//     return $stmt->fetchColumn();
// }

public function deleteHighlight($id) {
    $stmt = $this->db->prepare("DELETE FROM web_financialhighlight WHERE id = ?");
    return $stmt->execute([$id]);
}

public function updateHighlight($id, $highlight, $consolidated) {
    $stmt = $this->db->prepare("UPDATE web_financialhighlight SET highlights = ?, consolidated = ? WHERE id = ?");
    return $stmt->execute([$highlight, $consolidated, $id]);
}
    // Fetch all highlights grouped or just all (modify as needed)
    public function getGroupedHighlights() {
        // For example, fetch all highlights with their consolidated values
        $sql = "SELECT highlights, consolidated FROM web_financialhighlight ORDER BY id ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
