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
        echo "Form submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
