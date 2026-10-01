<?php
require_once '../../config/config.php';  // Adjust path

if (!isset($_SESSION['user_id'])) {
    header("Location: " . ABS_URL . "dir/admin/login.php");
    exit();
}
session_start(); // Start session if not already started
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $currentPass = $_POST['current_password'] ?? '';
    $newPass = $_POST['new_password'] ?? '';
    $confirmPass = $_POST['confirm_password'] ?? '';
    if (!$email || !$currentPass || !$newPass || !$confirmPass) {
        $message = "Please fill all fields.";
    } elseif ($newPass !== $confirmPass) {
        $message = "New password and confirm password do not match.";
    } else {
        try {
            $db = Database::getDB();
            $stmt = $db->prepare("SELECT id, password FROM web_users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                $message = "User not found.";
            } elseif (!password_verify($currentPass, $user['password'])) {
                $message = "Current password is incorrect.";
            } else {
                // Update password
                $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);
                $updateStmt = $db->prepare("UPDATE web_users SET password = ? WHERE id = ?");
                $updateStmt->execute([$hashedNewPass, $user['id']]);
                clearVarnishCache();
                // Destroy session and redirect
                unset($_SESSION['user_id']);
                                // Show the completion loader before redirecting to login.
                                echo '<style>
                                                body { margin: 0; }
                                                .password-success-loader { position: fixed; inset: 0; z-index: 1050; display: flex; align-items: center; justify-content: center; background: rgba(248, 249, 250, .92); font-family: Arial, sans-serif; }
                                                .password-success-card { width: min(90vw, 330px); padding: 28px; background: #fff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 8px 28px rgba(0, 0, 0, .12); text-align: center; }
                                                .password-success-line { height: 10px; margin: 10px auto; border-radius: 5px; background: linear-gradient(90deg, #e9ecef 25%, #f8f9fa 50%, #e9ecef 75%); background-size: 200% 100%; animation: password-success-shimmer 1.2s linear infinite; }
                                                .password-success-line.short { width: 58%; }
                                                .password-success-line.long { width: 84%; }
                                                .password-success-text { margin-top: 18px; color: #495057; font-weight: 600; }
                                                @keyframes password-success-shimmer { from { background-position: 200% 0; } to { background-position: -200% 0; } }
                                            </style>
                                            <div class="password-success-loader" role="status" aria-live="polite">
                                                <div class="password-success-card">
                                                    <div class="password-success-line short"></div>
                                                    <div class="password-success-line long"></div>
                                                    <div class="password-success-line long"></div>
                                                    <div class="password-success-text">Password updated. Redirecting...</div>
                                                </div>
                                            </div>
                                            <script>setTimeout(function () { window.location.href = "login.php"; }, 1800);</script>';
                exit;
            }
        } catch (PDOException $e) {
            $message = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./components/navbar/header.css">
    <link rel="stylesheet" href="<?php echo ABS_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ABS_URL ?>assets/home/gallantt-group-of-industries.svg">
    <style>
        .card {
            padding: 20px;
            border-radius: 10px;
        }
        .password-loader {
            position: fixed;
            inset: 0;
            z-index: 1050;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(248, 249, 250, 0.86);
            backdrop-filter: blur(3px);
        }
        .password-loader-card {
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
        .password-loader-text {
            margin-top: 18px;
            color: #495057;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div id="passwordLoader" class="password-loader" role="status" aria-live="polite" aria-hidden="true">
    <div class="password-loader-card">
        <div class="wireframe-line short"></div>
        <div class="wireframe-line long"></div>
        <div class="wireframe-line long"></div>
        <div class="password-loader-text">Updating password...</div>
    </div>
</div>
<?php require_once ABS_PATH . 'dir/admin/components/navbar/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
        <div class="card">
    <div class="card-header bg-light">
    <h5>Change Password</h5>
    </div>
    <div class="card-body">
    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form method="POST" action="" id="changePasswordForm">
        <div class="mb-3">
            <label for="email" class="form-label">User Name</label>
            <input type="text" id="email" name="email" required class="form-control" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
        </div>
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" required class="form-control" />
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="showCurrentPassword">
                <label class="form-check-label" for="showCurrentPassword">Show current password</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" required class="form-control" />
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary" id="changePasswordButton">Update Password</button>
    </form>
    </div>
</div>
        </div>
    </div>
</div>
</body>
<script src="<?php echo ABS_URL ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('showCurrentPassword').addEventListener('change', function () {
    document.getElementById('current_password').type = this.checked ? 'text' : 'password';
});

document.getElementById('changePasswordForm').addEventListener('submit', function () {
    document.getElementById('passwordLoader').style.display = 'flex';
    document.getElementById('passwordLoader').setAttribute('aria-hidden', 'false');
    document.getElementById('changePasswordButton').disabled = true;
    document.getElementById('changePasswordButton').textContent = 'Updating...';
});
</script>
</html>
