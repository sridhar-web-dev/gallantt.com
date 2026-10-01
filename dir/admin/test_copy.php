<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'new_gallantt');
define('DB_PASS', 'HIq[k3[XM9Ra');
define('DB_NAME', 'new_gallantt');

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truncate the table
    $sql = "TRUNCATE TABLE web_sections";
    $pdo->exec($sql);

    echo "Table 'web_sections' has been truncated successfully.";

} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>
