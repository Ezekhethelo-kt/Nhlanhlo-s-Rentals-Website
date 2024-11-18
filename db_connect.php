<!-- db_connect.php -->
<?php
$servername = "localhost"; // Change this if necessary
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "nhlanhlos_rentals";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
