<!-- book_appointment.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Nhlahlo's Rental</title>
	
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #F2F8FC;
        }

        .content {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            color: #457DB0;
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            text-align: center;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            background-color: #457DB0;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #4C89C1;
        }

        .navbar .active {
            background-color: #1E5A82;
        }

        /* Appointment Form Styles */
        .appointment-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .appointment-form label {
            font-weight: bold;
            color: #333;
        }

        .appointment-form input[type="text"],
        .appointment-form input[type="email"],
        .appointment-form input[type="tel"],
        .appointment-form input[type="date"],
        .appointment-form input[type="time"],
        .appointment-form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        .appointment-form textarea {
            resize: vertical;
        }

        .appointment-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            font-size: 1.1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .appointment-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #457DB0;
            color: white;
            margin-top: 40px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
	
    <div class="content">
        <h1>Book an Appointment</h1>
        <p>Schedule a visit to view our properties or meet with us for a consultation. Please fill out the form below to book an appointment. Please note that the owner is available only on weekends.</p>

        <!-- Appointment Booking Form -->
        <form action="process_appointment.php" method="post" class="appointment-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email address">

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">

            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Preferred Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="message">Additional Notes:</label>
            <textarea id="message" name="message" rows="4" placeholder="Any specific requirements or questions?"></textarea>

            <input type="submit" value="Book Appointment">
        </form>
    </div>

    <div class="footer">
        &copy; 2024 Nhlahlo's Rental. All Rights Reserved.
    </div>
</body>
</html>

