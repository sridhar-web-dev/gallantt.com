<?php
require_once '../config/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
$adminEmail = 'HRIS.Admin@gallantt.com';
$fromEmail = MAILER_FROM_EMAIL;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobId = $_POST['job_id'];
    $jobTitle = $_POST['job_title'];
    $name = $_POST['name'];
    $email = strtolower(trim($_POST['email'] ?? ''));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: " . ABS_URL . "careers?status=invalid_email");
        exit;
    }

    $db = Database::getDB();
    $duplicateStmt = $db->prepare("SELECT id FROM web_jobapplication WHERE LOWER(TRIM(email)) = ? LIMIT 1");
    $duplicateStmt->execute([$email]);
    if ($duplicateStmt->fetchColumn()) {
        header("Location: " . ABS_URL . "careers?status=already_applied");
        exit;
    }

    $resumePath = '';
    $resumeName = '';
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/resumes/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
        $randomNumber = rand(100, 999);
        $safeName = preg_replace('/[^a-zA-Z0-9]/', '-', strtoupper($name));
        $safeJob = preg_replace('/[^a-zA-Z0-9]/', '-', strtoupper($jobTitle));
        $ext = strtoupper($ext); // also capitalize the file extension
        $resumeName = $safeName . '-' . $safeJob . '-' . $randomNumber . '.' . $ext;
        $resumePath = $uploadDir . $resumeName;
        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
    }
    // Store data into database
    try {
        $stmt = $db->prepare("INSERT INTO web_jobapplication
 (job_id, job_title, name, email, resume_file) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$jobId, $jobTitle, $name, $email, $resumeName]);
    } catch (PDOException $e) {
        die("Database insert failed: " . $e->getMessage());
    }
    // Send Emails
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
         $mail->Host = MAILER_SMTP;
        $mail->SMTPAuth = true;
        $mail->Username = MAILER_USER;
        $mail->Password = MAILER_PASS;
        $mail->SMTPSecure = MAILER_SECURE;
        $mail->Port = MAILER_PORT;
        // Admin Email
        $mail->setFrom($fromEmail, COMPANY_NAME);
        $mail->addAddress($adminEmail, COMPANY_NAME);
        $mail->isHTML(true);
        $mail->Subject = "New Application for $jobTitle";
        $mail->Body = '
        <div style="font-family: Arial, sans-serif; padding: 20px; background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 8px;">
            <h2 style="color: #0066A4;">New Job Application Received</h2>
            <p><strong>Name:</strong> '.htmlspecialchars($name).'</p>
            <p><strong>Email:</strong> '.htmlspecialchars($email).'</p>
            <p><strong>Job Title:</strong> '.htmlspecialchars($jobTitle).'</p>
            <p><strong>Job ID:</strong> '.htmlspecialchars($jobId).'</p>
            <p style="margin-top: 20px; font-size: 13px; color: #555;">Sent from your Careers page.</p>
        </div>';
        if (!empty($resumePath)) {
            $mail->addAttachment($resumePath, $resumeName);
        }
        $mail->send();
        // User Email
        $mail->clearAddresses();
        $mail->addAddress($email);
        $mail->setFrom($fromEmail, 'HR Team');
        $mail->Subject = "Thank you for applying to $jobTitle";
        $mail->Body = '
        <div style="font-family: Arial, sans-serif; padding: 20px; background-color: #f0f8ff; border: 1px solid #b3d1ff; border-radius: 8px;">
            <h2 style="color: #0066A4;">Thank you for applying!</h2>
            <p style="margin: 10px 0;">Hi <strong>'.htmlspecialchars($name).'</strong>,</p>
            <p style="margin: 10px 0;">Thank you for your interest in the <strong>'.htmlspecialchars($jobTitle).'</strong> role.</p>
            <p style="margin: 10px 0;">Our HR team has received your application and will review it shortly.</p>
            <p style="margin: 20px 0;">If you\'re shortlisted, we\'ll contact you via email or phone.</p>
            <p style="color: #666; font-size: 12px;">This is an automated confirmation. Please do not reply to this email.</p>
            <hr style="border-top: 1px solid #ccc;">
            <p style="font-size: 12px; color: #888;">&copy; '.date("Y").' Gallantt Group. All rights reserved.</p>
        </div>';
        $mail->send();
        // echo "<script>alert('Application submitted successfully!'); window.location.href='careers.php';</script>";
        header("Location: " . ABS_URL . "careers?status=success");
exit;
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
