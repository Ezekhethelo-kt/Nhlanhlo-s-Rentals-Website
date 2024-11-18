
<!-- process_appointment.php -->
<!-- Feedback Display -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Feedback</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="content">
        <h1>Booking Feedback</h1>
        
    </div>
</body>
</html>
<?php
include 'db_connect.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare and execute SQL query to insert appointment data
    $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, date, time, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $message);

    if ($stmt->execute()) {
        echo "<p>Thank you, $name. Your appointment has been booked successfully. We will get back to you shortly.</p>";
    } else {
        echo "<p>Sorry, there was an error processing your request. Please try again later.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

