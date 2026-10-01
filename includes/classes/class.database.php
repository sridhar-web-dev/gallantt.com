<?php
class Database {
    private static $db;
    
    public static function createDB() {
        if (!self::$db) {
            try {
                // FIX: Added ";charset=utf8mb4" right into the connection string
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
                
                self::$db = new PDO($dsn, DB_USER, DB_PASS);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // OPTIONAL ADDITIONAL SAFEGUARD: Forces the session to interact in utf8mb4
                self::$db->exec("SET NAMES utf8mb4");
                
            } catch (PDOException $e) {
                die("Database Error: " . $e->getMessage());
            }
        }
    }
    
    public static function getDB() {
        self::createDB();
        return self::$db;
    }
    
    public static function freeDB() {
        if (self::$db) {
            self::$db = null;
        }
    }
}
?>