<?php
require_once '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
$db = Database::getDB();
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';
error_log(print_r($_POST, true));
if ($name && $email && $phone && $subject && $message) {
    try {
        // Insert into DB
        $stmt = $db->prepare("INSERT INTO web_contactform (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $phone, $subject, $message]);
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        $userMail = new PHPMailer(true);
        // SMTP Config (Update with your SMTP info)
        $mail->isSMTP();
        $mail->Host = MAILER_SMTP;
        $mail->SMTPAuth = true;
        $mail->Username = MAILER_USER;
        $mail->Password = MAILER_PASS;
        $mail->SMTPSecure = MAILER_SECURE;
        $mail->Port = MAILER_PORT;
        // Admin Email
        $mail->setFrom(MAILER_FROM_EMAIL, 'Website Form');
        $mail->addAddress(BACKOFFICE_MAIL_ID , COMPANY_NAME); 

        $mail->isHTML(true);
        $mail->Subject = "New Form Submission from $name";
        $mail->Body = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    color: #333;
                    margin: 0;
                    padding: 20px;
                    background-color: #f8f9fa;
                }
                .email-container {
                    max-width: 600px;
                    margin: auto;
                    background: #ffffff;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                }
                .email-header {
                    background-color:#471a1a;
                    padding: 20px;
                    text-align: center;
                }
                .email-header img {
                    max-height: 50px;
                }
                .email-body {
                    padding: 20px;
                }
                h2 {
                    color: #007bff;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 15px;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #eee;
                }
                th {
                    background-color: #f5f5f5;
                    color: #333;
                    width: 30%;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <img src='" . ABS_URL . "assets/home/gallantt-group-of-industries.svg' alt='Company Logo'>
                </div>
                <div class='email-body'>
                    <h2>New Contact Form Submission</h2>
                    <table>
                        <tr>
                            <th>Name</th><td>$name</td>
                        </tr>
                        <tr>
                            <th>Email</th><td>$email</td>
                        </tr>
                        <tr>
                            <th>Phone</th><td>$phone</td>
                        </tr>
                        <tr>
                            <th>Subject</th><td>$subject</td>
                        </tr>
                        <tr>
                            <th>Message</th><td>$message</td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>
        </html>
        ";
        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        error_log("Mailer Error: " . $e->getMessage());
        echo 'fail';
    } catch (PDOException $e) {
        error_log("DB Error: " . $e->getMessage());
        echo 'fail';
    }
} else {
    echo 'fail';
}
