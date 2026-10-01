<?php
require_once '../config/config.php';
require_once "./support/autoload.php";
$db = Database::getDB();
$password = password_hash("test@123", PASSWORD_DEFAULT); // Hash the password
$query = "INSERT INTO users (email, password) VALUES (:email, :password)";
$stmt = $db->prepare($query);
$stmt->execute([
    ':email' => 'test',
    ':password' => $password
]);
echo "User inserted successfully!";
?>
