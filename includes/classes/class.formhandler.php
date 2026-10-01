<?php
class FormHandler {
    public function getDistricts($stateId) {
        $db = Database::getDB();
        $stmt = $db->prepare("SELECT id, name FROM web_districts WHERE state_id = ?");
        $stmt->execute([$stateId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function getSectionData($districtId, $productId) {
    //     $db = Database::getDB();
    //     $stmt = $db->prepare("SELECT id, section, consumer_price FROM web_sections WHERE district_id = ? AND product_id = ?");
    //     $stmt->execute([$districtId, $productId]);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
//     public function getSectionData($state_Id, $districtId, $productId) {
//     $db = Database::getDB();
//     $stmt = $db->prepare("
//         SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name
//         FROM web_sections ws
//         JOIN web_districts d ON ws.district_id = d.id
//         JOIN web_states st ON d.state_id = st.id
//         WHERE ws.district_id = ? AND ws.product_id = ?
//     ");
//     $stmt->execute([$districtId, $productId]);
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
// public function getSectionData($state_Id, $districtId, $productId) {
//     $db = Database::getDB();
//     if ($districtId === 0) {
//         // Get all districts under the given state
//         $stmt = $db->prepare("
//             SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name
//             FROM web_sections ws
//             JOIN web_districts d ON ws.district_id = d.id
//             JOIN web_states st ON d.state_id = st.id
//             WHERE d.state_id = ? AND ws.product_id = ?
//         ");
//         $stmt->execute([$state_Id, $productId]);
//     } else {
//         // Get specific district
//         $stmt = $db->prepare("
//             SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name
//             FROM web_sections ws
//             JOIN web_districts d ON ws.district_id = d.id
//             JOIN web_states st ON d.state_id = st.id
//             WHERE ws.district_id = ? AND ws.product_id = ?
//         ");
//         $stmt->execute([$districtId, $productId]);
//     }
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
// public function getSectionData($state_Id, $districtId, $productId) {
//     $db = Database::getDB();
//     if ($districtId == 0) {
//         // All districts under the selected state
//         $stmt = $db->prepare("
//             SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name
//             FROM web_sections ws
//             JOIN web_states st ON ws.state_id = st.id
//             WHERE ws.state_id = ? AND ws.product_id = ?
//         ");
//         $stmt->execute([$state_Id, $productId]);
//     } else {
//         // Specific district
//         $stmt = $db->prepare("
//             SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name
//             FROM web_sections ws
//             JOIN web_districts d ON ws.district_id = d.id
//             JOIN web_states st ON d.state_id = st.id
//             WHERE ws.district_id = ? AND ws.product_id = ?
//         ");
//         $stmt->execute([$districtId, $productId]);
//     }
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }
public function getFirstDistrictId($stateId) {
    $db = Database::getDB();
    $stmt = $db->prepare("SELECT id FROM web_districts WHERE state_id = ? ORDER BY id ASC LIMIT 1");
    $stmt->execute([$stateId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : 0;
}
public function getSectionData($stateId, $districtId, $productId) {
    $db = Database::getDB();
    if ($districtId = 'all_disticts') {
        // All districts selected → show all entries for the state
        $stmt = $db->prepare("
            SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name, d.name AS district_name
            FROM web_sections ws
            LEFT JOIN web_districts d ON ws.district_id = d.id
            JOIN web_states st ON st.id = ws.state_id
            WHERE ws.state_id = ? AND ws.product_id = ?
        ");
        $stmt->execute([$stateId, $productId]);
    } else {
        // Check if district-specific data exists
        $stmt = $db->prepare("
            SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name, d.name AS district_name
            FROM web_sections ws
            JOIN web_districts d ON ws.district_id = d.id
            JOIN web_states st ON d.state_id = st.id
            WHERE ws.district_id = ? AND ws.product_id = ?
        ");
        $stmt->execute([$districtId, $productId]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // If no district-specific data, fallback to state-level (district_id = 0)
        if (empty($rows)) {
            $stmt = $db->prepare("
                SELECT ws.id, ws.section, ws.consumer_price, ws.created_at, st.name AS state_name, d.name AS district_name
                FROM web_sections ws
                LEFT JOIN web_districts d ON ws.district_id = d.id
                JOIN web_states st ON st.id = ws.state_id
                WHERE ws.state_id = ? AND ws.district_id = 0 AND ws.product_id = ?
            ");
            $stmt->execute([$stateId, $productId]);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $rows;
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function getAllSections() {
        $db = Database::getDB();
        $stmt = $db->prepare("
            SELECT s.section, s.consumer_price,
                   st.name AS state_name,
                   d.name AS district_name,
                   p.name AS product_name
            FROM web_sections s
            JOIN web_districts d ON s.district_id = d.id
            JOIN web_states st ON d.state_id = st.id
            JOIN web_products p ON s.product_id = p.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSectionsPaginated($limit, $offset) {
        $db = Database::getDB();
        $stmt = $db->prepare("
            SELECT s.section, s.consumer_price,
                   st.name AS state_name,
                   COALESCE(d.name, 'All Districts') AS district_name,
                   p.name AS product_name
            FROM web_sections s
            LEFT JOIN web_districts d ON s.district_id = d.id
            LEFT JOIN web_states st ON s.state_id = st.id
            LEFT JOIN web_products p ON s.product_id = p.id
            LIMIT ? OFFSET ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(2, (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalSections() {
        $db = Database::getDB();
        $stmt = $db->query("SELECT COUNT(*) as total FROM web_sections");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    // public function insertData($stateId, $districtId, $productId, $sections) {
    //     $db = Database::getDB();
    //     $stmt = $db->prepare("INSERT INTO web_sections (state_id, district_id, product_id, section, consumer_price) VALUES (?, ?, ?, ?, ?)");
    //     foreach ($sections as $sec) {
    //         $stmt->execute([$stateId, $districtId, $productId, $sec['section'], $sec['price']]);
    //     }
    //     return true;
    // }
    public function insertData($stateId, $districtId, $productId, $sections) {
        $db = Database::getDB();
        // Step 1: Delete existing data
        if ($districtId == 0) {
            // Delete all matching state + product records regardless of district
            $deleteStmt = $db->prepare("DELETE FROM web_sections WHERE state_id = ? AND product_id = ?");
            $deleteStmt->execute([$stateId, $productId]);
        } else {
            // Delete based on exact state, district, and product
            $deleteStmt = $db->prepare("DELETE FROM web_sections WHERE state_id = ? AND district_id = ? AND product_id = ?");
            $deleteStmt->execute([$stateId, $districtId, $productId]);
        }
        // Step 2: Insert new records
        $insertStmt = $db->prepare("INSERT INTO web_sections (state_id, district_id, product_id, section, consumer_price) VALUES (?, ?, ?, ?, ?)");
        foreach ($sections as $sec) {
            $insertStmt->execute([$stateId, $districtId, $productId, $sec['section'], $sec['price']]);
        }
        return true;
    }
}
