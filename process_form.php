<?php
// Database connection parameters
$servername = "127.0.0.1";
$username = "akshat1709";
$password = "";
$dbname = "contact_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["clientemail"];
    $phone = $_POST["clientphone"];
    $collaborate = isset($_POST["isclient"]) ? 1 : 0;

    // Insert data into the database
    $sql = "INSERT INTO contacts (email, phone, collaborate) VALUES ('$email', '$phone', $collaborate)";
    if ($conn->query($sql) === TRUE) {
        // Send email notification
        $to = "guptaakshat1709@gmail.com"; 
        $subject = "New Contact Form Submission";
        $message = "Someone tried contacting you:\n\n";
        $message .= "Email: $email\n";
        $message .= "Phone: $phone\n";
        $message .= "Collaborate: " . ($collaborate ? "Yes" : "No") . "\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        mail($to, $subject, $message, $headers);

        echo "Form submitted successfully. You will receive an email notification.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

// Enable CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
?>