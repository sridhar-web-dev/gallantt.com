<?php require_once '../../config/config.php'; ?>
<?php

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
        .line-input {
            border: 0;
            border-bottom: 1px solid #adb5bd;
            border-radius: 0;
            background-color: #f8f9fa;
            padding-left: 0;
            padding-right: 0;
        }
        .form-label {
            font-weight: 700;
        }
        .line-input::placeholder {
            color: #6c757d;
        }
        .line-input:focus {
            border-bottom-color: #0d6efd;
            box-shadow: 0 1px 0 #0d6efd;
        }
        .login-loader {
            position: fixed;
            inset: 0;
            z-index: 1050;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(248, 249, 250, 0.86);
            backdrop-filter: blur(3px);
        }
        .login-loader-card {
            width: min(90vw, 330px);
            padding: 28px;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12);
            text-align: center;
        }
        .wireframe-line {
            height: 10px;
            margin: 10px auto;
            border-radius: 5px;
            background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%);
            background-size: 200% 100%;
            animation: wireframe-shimmer 1.2s linear infinite;
        }
        .wireframe-line.short { width: 58%; }
        .wireframe-line.long { width: 84%; }
        @keyframes wireframe-shimmer {
            from { background-position: 200% 0; }
            to { background-position: -200% 0; }
        }
        .login-loader-text {
            margin-top: 18px;
            color: #495057;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div id="loginLoader" class="login-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="login-loader-card">
        <div class="wireframe-line short"></div>
        <div class="wireframe-line long"></div>
        <div class="wireframe-line long"></div>
        <div class="login-loader-text">Signing you in...</div>
    </div>
</div>

<div class="login-container text-center">
    <img src="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" alt="Logo" class="logo">
    <h2 class="mb-4">Login</h2>
    <div id="message" class="alert mt-3 d-none" role="alert"></div>
    <form id="loginForm">
        <div class="mb-3 text-start">
            <label for="email" class="form-label">User Name</label>
            <input type="text" id="email" name="email" class="form-control line-input" placeholder="Enter email" required>
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control line-input" placeholder="Enter password" required>
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="showPassword">
                <label class="form-check-label" for="showPassword">Show password</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    
</div>
<script src="jquery.3.6.1.js"></script>
<script>
$(document).ready(function() {
    function showMessage(message, alertType) {
        $("#message")
            .removeClass("d-none alert-danger alert-warning")
            .addClass("alert-" + alertType)
            .html(message + '<button type="button" class="btn-close float-end" aria-label="Close"></button>');
    }

    $(document).on("click", "#message .btn-close", function() {
        $("#message").addClass("d-none");
    });

    $("#showPassword").on("change", function() {
        $("#password").attr("type", this.checked ? "text" : "password");
    });

    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        const loader = $("#loginLoader");
        loader.css("display", "flex").attr("aria-hidden", "false");
        submitButton.prop("disabled", true).text("Signing in...");
        $.ajax({
            url: "login-submit.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.status === "success") {
                    window.location.href = "index.php";
                } else if (response.status === "locked") {
                    loader.hide().attr("aria-hidden", "true");
                    submitButton.prop("disabled", false).text("Login");
                    showMessage("Account temporarily locked. Please try again after 15 minutes.", "warning");
                } else {
                    loader.hide().attr("aria-hidden", "true");
                    submitButton.prop("disabled", false).text("Login");
                    var remainingAttempts = response.remaining_attempts;
                    var attemptMessage = remainingAttempts > 0
                        ? " You have " + remainingAttempts + " attempt" + (remainingAttempts === 1 ? "" : "s") + " remaining."
                        : " Your account is now temporarily locked.";
                    showMessage("Invalid Email or Password." + attemptMessage, "danger");
                }
            },
            error: function() {
                loader.hide().attr("aria-hidden", "true");
                submitButton.prop("disabled", false).text("Login");
                showMessage("Unable to process login. Please try again.", "danger");
            }
        });
    });
});
</script>


<script src="../../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
