<?php
ini_set("SMTP", "smtp.hostinger.com");
ini_set("smtp_port", "587");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];

    // Set up the recipient email address
    $recipient_email = "book@bookmydandeli.com"; // Change this to your actual recipient email address

    // Set up the email subject and body
    $subject = "Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nPhone no.: $number\n\nMessage:\n$message";

    // Set up the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($recipient_email, $subject, $body, $headers)) {
        // Email sent successfully
        http_response_code(200); // Set response code to 200 (OK)
        echo "success";
    } else {
        // Failed to send the email
        http_response_code(500); // Set response code to 500 (Internal Server Error)
        echo "error";
    }
} else {
    // If the form was not submitted properly, return a bad request response
    http_response_code(400); // Set response code to 400 (Bad Request)
    echo "bad request";
}
?>
