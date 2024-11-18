<!-- contact.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Nhlahlo's Rental</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F8FC;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1, h2 {
            color: #457DB0;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 1.1em;
            margin: 8px 0;
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

        /* Map Container */
        .map-container {
            margin: 20px 0;
            border: 2px solid #457DB0;
            border-radius: 8px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 450px;
            border: none;
        }

        /* Footer */
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
        <h1>Contact Us</h1>
        
        <!-- Contact Information -->
        <h2>Our Contact Information</h2>
        <p><strong>Email:</strong> nonhlanhlaruthngcobo@gmail.com</p>
        <p><strong>Phone:</strong> 072 744 3788</p>
        <p><strong>Address:</strong> H805 Sofasonke Road, Mpumalanga Township, Hammersdale, Unit 6, 3699</p>
        
        <!-- Google Map Embed -->
        <h2>Find Us Here</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3461.3217680872112!2d30.647683374051475!3d-29.82613272118441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ef6f116bf74daf5%3A0xfa5d26d5c898d68e!2sSofasonke%20Rd%2C%20Mpumalanga%20H%2C%20Mpumalanga%2C%203699!5e0!3m2!1sen!2sza!4v1723220668145!5m2!1sen!2sza" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <div class="footer">
        &copy; 2024 Nhlahlo's Rental. All Rights Reserved.
    </div>
</body>
</html>

