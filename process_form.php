<?php

// Configuration
$to_email = 'guptaakshat1709@gmail.com'; // Replace with your email address
$subject = 'Contact Form Submission';

// Get the form data
$name = $_POST['clientemail'];
$message = $_POST['clientmessage'];
$is_client = $_POST['isclient'] ?? false;

// Validate the form data
if (empty($name) || empty($message)) {
    $error = 'Please fill in all the fields.';
} elseif (!filter_var($name, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email address.';
} else {
    // Send the email
    $body = "Name: $name\n";
    $body .= "Message: $message\n";
    $body .= "Is Client: " . ($is_client ? 'Yes' : 'No');

    $headers = "From: $name\r\n";
    $headers .= "Reply-To: $name\r\n";

    if (mail($to_email, $subject, $body, $headers)) {
        $success = 'Thank you for contacting us!';
    } else {
        $error = 'Error sending email.';
    }
}

// Output the result
if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
} elseif (isset($success)) {
    echo "<p style='color: green;'>$success</p>";
}

?>