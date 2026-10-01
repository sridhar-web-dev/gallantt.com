<?php
require_once '../../../config/config.php';

try {
    // 1. Add 'order' column if not exists
    $check = $conn->query("SHOW COLUMNS FROM web_banners LIKE 'order'");
    if ($check->num_rows == 0) {
        $conn->query("ALTER TABLE banners ADD COLUMN `order` INT DEFAULT 0");
        echo "✅ 'order' column added successfully.<br>";
    } else {
        echo "ℹ️ 'order' column already exists.<br>";
    }

    // 2. Initialize order based on banner ID
    $result = $conn->query("SELECT id FROM web_banners ORDER BY id ASC");
    if ($result->num_rows > 0) {
        $order = 1;
        while ($row = $result->fetch_assoc()) {
            $conn->query("UPDATE banners SET `order` = $order WHERE id = {$row['id']}");
            $order++;
        }
        echo "✅ Order values initialized successfully.<br>";
    } else {
        echo "⚠️ No banners found to initialize order.<br>";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
