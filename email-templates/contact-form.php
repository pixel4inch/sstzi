<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// -------------------------
// Debug & Error Reporting
// -------------------------
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Force JSON response
header('Content-Type: application/json');

// -------------------------
// Load PHPMailer
// -------------------------
require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';

// -------------------------
// Load Mail Config
// -------------------------
$configFile = __DIR__ . '/../config/mail.php';
if (!file_exists($configFile)) {
    echo json_encode([
        'alert' => 'alert-danger',
        'message' => 'Mail config file missing'
    ]);
    exit;
}

$config = require $configFile;
$requiredKeys = ['host','username','password','encryption','port'];
foreach ($requiredKeys as $key) {
    if (!isset($config[$key]) || empty($config[$key])) {
        echo json_encode([
            'alert' => 'alert-danger',
            'message' => "Mail config key missing: $key"
        ]);
        exit;
    }
}

// -------------------------
// Validate Request
// -------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'alert' => 'alert-danger',
        'message' => 'Invalid request method'
    ]);
    exit;
}

// -------------------------
// Sanitize Inputs
// -------------------------
$name    = htmlspecialchars(trim($_POST['name'] ?? ''));
$email   = htmlspecialchars(trim($_POST['email'] ?? ''));
$phone   = htmlspecialchars(trim($_POST['phone'] ?? ''));
$company = htmlspecialchars(trim($_POST['company'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

if (!$name || !$email || !$phone || !$message) {
    echo json_encode([
        'alert' => 'alert-danger',
        'message' => 'Please fill all required fields'
    ]);
    exit;
}

// -------------------------
// Send Email
// -------------------------
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['encryption'];
    $mail->Port       = $config['port'];

    // Enable debug output for troubleshooting
    // Set to 0 for production
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';

    $mail->setFrom($config['username'], 'Pixello9 Website');
    $mail->addAddress('contact@pixello9.com', 'Pixello9');
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "
        <h2>New Contact Request</h2>
        <table border='1' cellpadding='8' cellspacing='0'>
            <tr><td><strong>Name</strong></td><td>$name</td></tr>
            <tr><td><strong>Email</strong></td><td>$email</td></tr>
            <tr><td><strong>Phone</strong></td><td>$phone</td></tr>
            <tr><td><strong>Company</strong></td><td>$company</td></tr>
            <tr><td><strong>Message</strong></td><td>$message</td></tr>
        </table>
    ";

    $mail->send();

    echo json_encode([
        'alert' => 'alert-success',
        'message' => 'Your message has been sent successfully!'
    ]);

} catch (Exception $e) {
    // Log error to server log for debugging
    error_log('PHPMailer Error: ' . $mail->ErrorInfo);

    echo json_encode([
        'alert' => 'alert-danger',
        'message' => 'Mailer Error: ' . $mail->ErrorInfo
    ]);
    exit;
}
