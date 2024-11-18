<!-- about.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Nhlahlo's Rental</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #F2F8FC;
            color: #333;
            margin: 0;
            padding: 0;
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

        /* Content Styles */
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            font-size: 2em;
            color: #457DB0;
            margin-bottom: 0.5em;
            text-align: center;
        }

        .content h2 {
            color: #457DB0;
            font-size: 1.5em;
            margin-top: 1.5em;
            border-bottom: 2px solid #DCEEF8;
            padding-bottom: 5px;
        }

        .content p, .content ul {
            font-size: 1em;
            line-height: 1.6;
            margin-bottom: 1em;
        }

        .content ul {
            list-style-type: none;
            padding: 0;
        }

        .content li {
            padding: 8px 0;
            border-bottom: 1px solid #DCEEF8;
        }

        .content li:last-child {
            border-bottom: none;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #457DB0;
            color: white;
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>       
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="content">
        <h1>About Us</h1>
        <p style="text-align: center;">Welcome to <strong>Nhlahlo's Rental</strong>, your trusted partner in property rentals.</p>

        <h2>Our Story</h2>
        <p>Nhlahlo's Rental is a property rental business situated in the heart of Hammersdale. Founded and operated by a dedicated nurse, our company is built on the principles of care, trust, and community.</p>
        
        <h2>Our Mission</h2>
        <p>We aim to provide comfortable and affordable housing solutions to individuals and families in Hammersdale and surrounding areas. With a strong commitment to quality and service, we strive to make the rental process seamless and stress-free for our clients.</p>
        
        <h2>Our Values</h2>
        <ul>
            <li><strong>Integrity:</strong> We uphold the highest standards of honesty and transparency in all our dealings.</li>
            <li><strong>Customer Focus:</strong> Our clients are at the center of everything we do. We listen to their needs and work tirelessly to exceed their expectations.</li>
            <li><strong>Community:</strong> We are deeply rooted in the Hammersdale community and believe in giving back through various local initiatives.</li>
        </ul>

        <h2>Meet Our Founder</h2>
        <p>Our founder, a passionate nurse with a heart for service, brings her caring nature and attention to detail into the rental business. Her unique perspective as a healthcare professional ensures that our clients receive the best possible care and attention.</p>
    </div>

    <div class="footer">
        &copy; 2024 Nhlahlo's Rental. All Rights Reserved.
    </div>
</body>
</html>
