<?php
class InvestorReport
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT id, name FROM web_reportcategories WHERE status = 1");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSubcategories($categoryId)
    {
        $stmt = $this->db->prepare("SELECT id, name FROM web_reportsubcategories WHERE category_id = ? AND status = 1");
        $stmt->execute([$categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function saveReports($category, $subcategory)
    {
        foreach ($_POST['title'] as $key => $title) {
            $fileTmp   = $_FILES['file']['tmp_name'][$key];
            $ext       = pathinfo($_FILES['file']['name'][$key], PATHINFO_EXTENSION);
            $fileName  = 'INVST_REPORT_' . date('dmY') . '_' . rand(100, 999) . '.' . $ext;
            $uploadDir = ABS_PATH . 'uploads/investors-reports/uploads/';
            if (! is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            if (! move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
                continue;
            }
            $stmt = $this->db->prepare("INSERT INTO web_investorreports (category, subcategory, title, file_path, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$category, $subcategory, $title, $fileName]);
        }
        return true;
    }
    public function getAllReports($start = 0, $limit = 10, $category = '', $subcategory = '')
    {
        $sql = "SELECT r.*, c.name AS category_name, s.name AS subcategory_name
                FROM web_investorreports r
                JOIN web_reportcategories c ON r.category = c.id
                LEFT JOIN web_reportsubcategories s ON r.subcategory = s.id
                WHERE 1=1";
        // Optional filters based on category
        if ($category) {
            $sql .= " AND r.category = " . (int) $category;
        }
                                   // Optional filter based on subcategory (only if it's provided)
        if ($subcategory !== '') { // Check if subcategory is provided (even empty string is considered)
            $sql .= " AND r.subcategory = " . (int) $subcategory;
        }
                                                            // Add pagination
        $sql .= " ORDER BY r.id DESC LIMIT $start, $limit"; // Use LIMIT for pagination
                                                            // Execute the query and fetch the results
        $stmt   = $this->db->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getReportCount($category = '', $subcategory = '')
    {
        $sql = "SELECT COUNT(*) as count FROM web_investorreports WHERE 1=1";
        if ($category) {
            $sql .= " AND category = " . (int) $category;
        }
        if ($subcategory) {
            $sql .= " AND subcategory = " . (int) $subcategory;
        }
        $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
    public function updateReport($reportId, $category, $subcategory, $title, $file = null)
    {
        // Prepare SQL query for updating the report (without updating the file yet)
        $sql  = "UPDATE web_investorreports SET category = ?, subcategory = ?, title = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $updated = $stmt->execute([$category, $subcategory, $title, $reportId]);
        // Get the current file path from the database
        $sql  = "SELECT file_path FROM web_investorreports WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$reportId]);
        $existingFile = $stmt->fetch(PDO::FETCH_ASSOC);
        // If a file is uploaded, handle the file update
        if ($file && !empty($file['tmp_name']) && ($file['error'] ?? UPLOAD_ERR_OK) === UPLOAD_ERR_OK) {
            // Generate a new file name with the format INVST_REPORT_DDMMYY_randomNumber.extension
            $fileName = 'INVST_REPORT_' . date('dmy') . '_' . rand(10, 99) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $uploadDir = ABS_PATH . 'uploads/investors-reports/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {
                // Update the file path in the database with the new file name
                $sql  = "UPDATE web_investorreports SET file_path = ? WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $updated = $stmt->execute([$fileName, $reportId]) && $updated;

                if ($updated && $existingFile && !empty($existingFile['file_path'])) {
                    $oldFilePath = $uploadDir . basename($existingFile['file_path']);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
            }
        }
        return $updated;
    }
    public function deleteReport($reportId)
    {
        // Delete file before deleting the report (if necessary)
        $sql  = "SELECT file_path, subcategory FROM web_investorreports WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$reportId]);
        $report = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($report) {
            // Delete the file from the server if it exists
            $filePath = ABS_PATH . 'uploads/investors-reports/uploads/' . basename($report['file_path']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            if ($report['subcategory']) {
                $sql  = "DELETE FROM web_reportsubcategories WHERE id = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$report['subcategory']]);
            }
        }
        // Delete the report from the main table
        $sql  = "DELETE FROM web_investorreports WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$reportId]);
        return $stmt->rowCount() > 0;
    }
    public function getReportById($reportId)
    {
        $sql = "SELECT ir.*, c.name AS category_name, sc.name AS subcategory_name, sc.id AS subcategory_id, ir.file_path AS report_file
                FROM web_investorreports ir
                LEFT JOIN web_reportcategories c ON ir.category = c.id
                LEFT JOIN web_reportsubcategories sc ON ir.subcategory = sc.id
                WHERE ir.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$reportId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getGroupedReports()
    {
        $sql = "SELECT
                    r.title, r.file_path,
                    c.name AS category_name,
                    s.name AS subcategory_name
                FROM web_investorreports r
                JOIN web_reportcategories c ON r.category = c.id
                LEFT JOIN web_reportsubcategories s ON r.subcategory = s.id
                ORDER BY c.id, s.id, r.id";
        $stmt    = $this->db->query($sql);
        $data    = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $grouped = [];
        foreach ($data as $row) {
            $category                           = $row['category_name'] ?? 'Uncategorized';
            $subcategory                        = $row['subcategory_name'] ?? 'General';
            $grouped[$category][$subcategory][] = [
                'title'     => $row['title'],
                'file_path' => $row['file_path'],
            ];
        }
        return $grouped;
    }
    public function addCategory($name)
    {
        $stmt = $this->db->prepare("INSERT INTO web_reportcategories (name, status) VALUES (?, 1)");
        $stmt->execute([$name]);
        return [
            'id'   => $this->db->lastInsertId(),
            'name' => $name,
        ];
    }
    public function addSubcategory($category_id, $name)
    {
        $stmt = $this->db->prepare("INSERT INTO web_reportsubcategories (category_id, name, status) VALUES (?, ?, 1)");
        $stmt->execute([$category_id, $name]);
        return [
            'id'   => $this->db->lastInsertId(),
            'name' => $name,
        ];
    }
}
