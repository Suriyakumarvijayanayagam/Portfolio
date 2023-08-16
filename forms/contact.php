<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'suriyakumar.vijayanayagam@gmail.com';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate form data (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Error: Please fill all the required fields.";
        exit;
    }

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message: $message\n";

    // Set email headers
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($receiving_email_address, $subject, $email_message, $headers)) {
        echo "OK";
    } else {
        echo "Error: Failed to send email. Please try again later.";
    }
} else {
    // If the form is not submitted using POST method, display an error
    echo "Error: Invalid request method.";
}
?>
