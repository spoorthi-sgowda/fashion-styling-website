<?php
// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 1. INCLUDE DATABASE CONNECTION ---
    require 'db_connect.php'; // This connects to your database

    // Sanitize user input (you've already done this well!)
    $name = $_POST["name"];
    $email = $_POST["email"];
    $package = $_POST["package"];
    $notes = $_POST["notes"];

    // --- 2. PREPARE AND EXECUTE THE SQL INSERT STATEMENT ---
    // The '?' are placeholders to prevent SQL injection
    $sql = "INSERT INTO bookings (name, email, package, notes) VALUES (?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the user data to the placeholders
    // "ssss" means all four variables are strings
    $stmt->bind_param("ssss", $name, $email, $package, $notes);
    
    // Execute the query
    $stmt->execute();

    // --- 3. CLOSE THE DATABASE CONNECTION ---
    $stmt->close();
    $conn->close();


    // --- 4. DISPLAY THE CONFIRMATION MESSAGE (Your original code) ---
    // Start of the HTML response
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '  <meta charset="UTF-8">';
    echo '  <title>Booking Received</title>';
    echo '  <link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    echo '  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">';
    echo '  <style>
              body { 
                font-family: "Poppins", sans-serif; 
                color: #4A4A4A; 
                text-align: center; 
                padding: 50px 15px; 
                background-color: #F3E5F5; /* Light Lavender Background */
              }
              .container { 
                background-color: #ffffff; 
                padding: 40px; 
                border-radius: 15px; 
                display: inline-block; 
                max-width: 500px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.1); 
                border-top: 5px solid #7E57C2;
              }
              h1 { 
                color: #512DA8; /* Deep Purple */
                margin-bottom: 1rem;
              }
              p {
                line-height: 1.7;
                margin-bottom: 0.5rem;
              }
              strong { 
                color: #7E57C2; /* Primary Purple */
              }
            </style>';
    echo '</head>';
    echo '<body>';
    
    // We use htmlspecialchars here for security when displaying back the user input
    echo '<div class="container">';
    echo "<h1>Thank You, " . htmlspecialchars($name) . "!</h1>";
    echo "<p>Your booking for the <strong>" . htmlspecialchars($package) . "</strong> package has been received.</p>";
    echo "<p>We will contact you at <strong>" . htmlspecialchars($email) . "</strong> shortly with the next steps.</p>";
    
    if (!empty($notes)) {
      echo "<p><strong>Your Preferences:</strong> " . htmlspecialchars($notes) . "</p>";
    } else {
      echo "<p><strong>Your Preferences:</strong> None provided.</p>";
    }

    echo '</div>';
    echo '</body>';
    echo '</html>';

} else {
    // If someone tries to access the page directly
    echo "<h1>Error</h1>";
    echo "<p>No form data received. Please submit the booking form correctly.</p>";
}
?>