<?php require_once '../../config/config.php'; ?>
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/");
    exit();
}
$userObj = new User();
$userObj->autoResetLockouts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <script src="jquery.3.6.1.js"></script>
    <style>
        body, html {
            height: 100%;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 100px; /* Adjust as needed */
        }
    </style>
</head>
<body>

<div class="login-container text-center">
    <img src="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" alt="Logo" class="logo">
    <h2 class="mb-4">Login</h2>
    <form id="loginForm">
        <div class="mb-3 text-start">
            <label for="email" class="form-label">User Name</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p id="message" class="mt-3 text-danger"></p>
</div>

<script>
$(document).ready(function() {
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "login-submit.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                response = response.trim();
                if (response === "success") {
                    window.location.href = "index.php";
                } else if (response === "locked") {
                    $("#message").html("Account temporarily locked. Please try again after 15 minutes.")
                        .fadeIn().delay(4000).fadeOut();
                } else {
                    $("#message").html("Invalid Email or Password").fadeIn().delay(2000).fadeOut();
                    window.location.href = "login.php";
                }
            }
        });
    });
});
</script>


<script src="../../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
