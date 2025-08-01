<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submitContact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['massage'];
    function sendEmailOTP($recipientEmail, $otp) {

    $mail = new PHPMailer(true);

    
    try {
        // SMTP Server Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host (e.g., Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'rajeshhaldar187@gmail.com'; // Your email address
        $mail->Password = 'XXXXXXXXXXXXXXXX'; // Your email password or app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Email Settings
        $mail->setFrom('rajeshhaldar187@gmail.com', 'Rajesh IT'); // Sender info
        $mail->addAddress($recipientEmail); // Recipient email

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: <b>$otp</b>";
        
        // Send email
        $mail->send();
        if ($mail->send()) {
            $_SESSION['status'] = "OTP sent successfully to $recipientEmail";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            $_SESSION['status'] = "OTP could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
        echo "OTP sent successfully to $recipientEmail";
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }

}
// Generate OTP
$otp = random_int(100000, 999999); // Generate a 6-digit OTP

// Example: Send OTP to a recipient
sendEmailOTP($email, $otp);


} else {
    header('location: index.php');
    exit();
}