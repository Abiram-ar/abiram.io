<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Set the recipient email address
    $to = "arngl5675@gmail.com"; // Replace with your email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Create email subject and body
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Email sent successfully
        http_response_code(200); // Success response
        echo json_encode(["status" => "success", "message" => "Your message has been sent. Thank you!"]);
    } else {
        // Email sending failed
        http_response_code(500); // Server error response
        echo json_encode(["status" => "error", "message" => "Oops! Something went wrong. Please try again later."]);
    }
} else {
    // Not a POST request
    http_response_code(405); // Method not allowed
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
