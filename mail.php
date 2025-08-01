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

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = 'smtp.gmail.com';
        $mail->Username   = 'rajeshhaldar187@gmail.com'; // Replace with your email
        $mail->Password   = 'ohiuvnhjgfktyijx';    // Replace with your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('rajeshhaldar187@gmail.com', 'Rajesh IT');
        $mail->addAddress('developerraj143@gmail.com', 'Rajesh IT'); // Replace with your email
        $mail->addAddress($email, 'Rajesh IT'); // Replace with your email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Inquiry from Rajesh IT Contact Form';
        $mail->Body = "<h3>Hello, you got a new inquiry mail</h3>
                       <h4>Fullname: {$name}</h4>
                       <h4>Email: {$email}</h4>
                       <h4>Subject: {$subject}</h4>
                       <h4>Message: {$message}</h4>";

        if ($mail->send()) {
            $_SESSION['status'] = "Thank you for contacting us!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        } else {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header('location: index.php');
    exit();
}