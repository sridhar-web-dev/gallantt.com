<?php
require_once '../../config/config.php'; // Adjust path to your autoload file
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email_address'] ?? ''));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email) {
        try {
            $db = Database::getDB();

            // ✅ Check if email already exists
            $checkStmt = $db->prepare("SELECT COUNT(*) FROM web_subscribers WHERE LOWER(TRIM(email)) = LOWER(TRIM(:email))");
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();

            if ($count > 0) {
                echo "<script type='text/javascript'>
                        alert('❌ This email ID is already subscribed.');
                        window.history.back();
                      </script>";
                exit();
            }

            // ✅ Insert new email
            $stmt = $db->prepare("INSERT INTO web_subscribers (email) VALUES (:email)");
            $stmt->bindParam(':email', $email);
            try {
                $stmt->execute();
            } catch (PDOException $e) {
                if ((int) $e->errorInfo[1] === 1062) {
                    echo "<script>alert('❌ This email ID is already subscribed.'); window.history.back();</script>";
                    exit();
                }
                throw $e;
            }

            // ✅ Send email to admin
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = MAILER_SMTP;
            $mail->SMTPAuth = true;
            $mail->Username = MAILER_USER;
            $mail->Password = MAILER_PASS;
            $mail->SMTPSecure = MAILER_SECURE;
            $mail->Port = MAILER_PORT;

            $mail->setFrom(MAILER_FROM_EMAIL, 'Website Subscription');
            $mail->addAddress(BACKOFFICE_MAIL_ID, COMPANY_NAME);
            $mail->isHTML(true);
            $mail->Subject = 'New Subscriber Notification';
            $mail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
                    .container { background-color: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
                    h2 { color: #333; }
                    p { font-size: 16px; }
                    .email-header {
                        background-color:#471a1a;
                        padding: 20px;
                        text-align: center;
                    }
                    .email-header img {
                        max-height: 50px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='email-header'>
                        <img src='" . ABS_URL . "assets/home/gallantt-group-of-industries.svg' alt='Company Logo'>
                    </div>
                    <h2>New Subscriber Alert</h2>
                    <p><strong>Email:</strong> {$email}</p>
                </div>
            </body>
            </html>";

            $mail->send();

            // ✅ Success message
            echo "<script type='text/javascript'>
                    alert('✅ Subscription Successful! Redirecting to homepage...');
                    window.location.href = '" . ABS_URL . "/index.php';
                  </script>";
            exit();

        } catch (Exception $e) {
            error_log("Mailer Error: " . $e->getMessage());
            echo "<script type='text/javascript'>
                    alert('❌ Mail error occurred. Please try again later.');
                  </script>";
        } catch (PDOException $e) {
            error_log("DB Error: " . $e->getMessage());
            echo "<script type='text/javascript'>
                    alert('❌ Database error occurred.');
                  </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('❌ Invalid email address.');
              </script>";
    }
}
?>
