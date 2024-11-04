<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'vendor/autoload.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set your SMTP server (e.g., Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'arngl5675@gmail.com'; // Your email address
        $mail->Password = 'iqij usuc mcla elqo'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type
        $mail->Port = 587; // SMTP port for TLS

        // Email settings
        $mail->setFrom($email, $name);
        $mail->addAddress('arngl5675@gmail.com'); // Where the form should send the email

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message';
        $mail->Body    = "<h4>Name: </h4><p>$name</p>
                          <h4>Email: </h4><p>$email</p>
                          <h4>Message: </h4><p>$message</p>";

        // Send email
        if ($mail->send()) {
            echo "Message has been sent!";
        } else {
            echo "Message could not be sent.";
        }

    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
