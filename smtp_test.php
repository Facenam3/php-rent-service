<?php
require_once __DIR__ . '/vendor/autoload.php'; // adjust if your autoload.php is in a different path

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = getenv('SMTP_HOST');
    $mail->SMTPAuth = true;
    $mail->Username = getenv('SMTP_USERNAME');
    $mail->Password = getenv('SMTP_PASSWORD');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = getenv('SMTP_PORT');
    $mail->SMTPDebug = 2; // enable debug output
    $mail->Debugoutput = 'echo';

    $mail->setFrom(getenv('FROM_EMAIL'), 'Test');
    $mail->addAddress('r3ntacar3@gmail.com'); // replace with your real email for testing
    $mail->Subject = 'SMTP Connection Test';
    $mail->Body = 'This is a test email sent by PHPMailer to verify SMTP.';

    if ($mail->send()) {
        echo "Test email sent successfully";
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
