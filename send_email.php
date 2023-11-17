<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "guptaakshat1709@gmail.com";
    $subject = "Contact Form Submission";
    
    $clientemail = $_POST["clientemail"];
    $clientphone = $_POST["clientphone"];
    $isclient = isset($_POST["isclient"]) ? "Yes" : "No";

    $message = "Email: $clientemail\nPhone: $clientphone\nWant to collaborate: $isclient";

    // Use mail() function to send the email
    mail($to, $subject, $message);

    // Redirect back to the contact form or any other page after submission
    header("Location: index.html");
    exit();
}

?>
