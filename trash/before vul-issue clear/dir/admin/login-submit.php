<?php
require_once '../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->login($email, $password)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
