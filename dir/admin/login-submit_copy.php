<?php
require_once '../../config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $result = $user->login($email, $password);
    if ($result === true) {
        echo "success";
    } elseif ($result === "locked") {
        echo "locked";
    } else {
        echo "error";
    }
}
?>
