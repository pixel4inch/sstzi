<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Receiver email (domain email)
    $toEmail = "contact@pixello9.com";
    $toName  = "Pixello9 Website";

    // Sanitize inputs
    $name    = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email   = htmlspecialchars(trim($_POST["email"] ?? ""));
    $phone   = htmlspecialchars(trim($_POST["phone"] ?? ""));
    $company = htmlspecialchars(trim($_POST["company"] ?? ""));
    $message = htmlspecialchars(trim($_POST["message"] ?? ""));

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo json_encode([
            "alert" => "alert-danger",
            "message" => "Please fill all required fields."
        ]);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // 🔐 SMTP settings (DOMAIN EMAIL)
        $mail->isSMTP();
        $mail->Host       = 'mail.pixello9.com';   // 🔴 Check hosting mail server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@pixello9.com'; // 🔴 Domain email
        $mail->Password   = 'EMAIL_PASSWORD';       // 🔴 Domain email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // or 465 (SSL)

        // ✅ IMPORTANT: setFrom MUST match SMTP email
        $mail->setFrom('contact@pixello9.com', 'Pixello9 Website');
        $mail->addAddress($toEmail, $toName);
        $mail->addReplyTo($email, $name); // user reply

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission - Pixello9";

        $mail->Body = "
        <h3>New Contact Request</h3>
        <table cellpadding='8' cellspacing='0' border='1'>
            <tr><td><strong>Name</strong></td><td>$name</td></tr>
            <tr><td><strong>Email</strong></td><td>$email</td></tr>
            <tr><td><strong>Phone</strong></td><td>$phone</td></tr>
            <tr><td><strong>Company</strong></td><td>$company</td></tr>
            <tr><td><strong>Message</strong></td><td>$message</td></tr>
        </table>
        ";

        $mail->send();

        echo json_encode([
            "alert" => "alert-success",
            "message" => "Your message has been sent successfully!"
        ]);

    } catch (Exception $e) {
        echo json_encode([
            "alert" => "alert-danger",
            "message" => "Mailer Error: {$mail->ErrorInfo}"
        ]);
    }
}
