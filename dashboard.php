<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - All Bookings</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: "Poppins", sans-serif; background-color: #F3E5F5; color: #4A4A4A; padding: 2rem; }
        .container { max-width: 1200px; margin: 0 auto; background-color: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        h1 { color: #512DA8; text-align: center; margin-bottom: 2rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem; border: 1px solid #D1C4E9; text-align: left; }
        th { background-color: #7E57C2; color: #fff; }
        tr:nth-child(even) { background-color: #f9f6ff; }
        .no-bookings { text-align: center; font-size: 1.2rem; padding: 2rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>VibeCraft Studio Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Preferences</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // --- R: READ Operation ---
                
                // Include the database connection
                require 'db_connect.php';

                // SQL query to select all bookings, ordered by the newest first
                $sql = "SELECT id, name, email, package, notes, booking_date FROM bookings ORDER BY id DESC";
                $result = $conn->query($sql);

                // Check if there are any results
                if ($result->num_rows > 0) {
                    // Loop through each row of the result
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["package"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["notes"]) . "</td>";
                        echo "<td>" . $row["booking_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-bookings'>No bookings found yet.</td></tr>";
                }
                
                // Close the connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>