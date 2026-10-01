<?php
require_once '../../config/config.php';
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $result = $user->login($email, $password);
    if ($result === true) {
        echo json_encode(['status' => 'success']);
    } elseif (is_array($result)) {
        echo json_encode($result);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
