<?php
// --- DATABASE CONNECTION ---

// Server details
$servername = "localhost"; // This is the standard for XAMPP
$username = "root";      // This is the standard username for XAMPP
$password = "";          // XAMPP's root user has no password by default
$dbname = "vibecraft_db";    // The name of the database we created

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // If connection fails, stop the script and show the error
    die("Connection failed: " . $conn->connect_error);
}

// If the script reaches here, the connection was successful!
?>
