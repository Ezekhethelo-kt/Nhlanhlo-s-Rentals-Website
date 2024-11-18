<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhlanhlo's Rentals - Homepage</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #DCEEF8;
        }

        .navbar {
            display: flex;
            background-color: #457DB0;
            overflow: hidden;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
            display: block;
        }

        .navbar a:hover {
            background-color: #DCEEF8;
        }

        .navbar .active {
            background-color: #575757;
        }

        h1 {
            text-align: center;
        }

        /* Slideshow container with centered and smaller width */
        .slideshow-container {
            max-width: 50%;
            margin: auto;
            position: relative;
            border-radius: 10px;
        }

        /* Slideshow images */
        .mySlides {
            display: none;
        }

        .mySlides img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Slideshow text below */
        .slideshow-text {
            text-align: center;
            padding: 20px;
            color: #333;
        }

        /* CSS for footer */
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #302f49;
            padding: 40px 80px;
        }

        .footer .copy {
            color: #fff;
        }

        .bottom-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 40px 0;
        }

        .bottom-links .links {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
        }

        .bottom-links .links span {
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
            margin: 10px 0;
        }

        .bottom-links .links a {
            text-decoration: none;
            color: #a1a1a1;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Main content -->
    <div>
        <h1>Welcome to Nhlanhlo's Rentals</h1>
        
        <!-- Slideshow Container -->
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="uploads/nhlanhlo's_rental.jpeg" alt="Property 1">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC1.jpg" alt="Property 2">
            </div>
            <div class="mySlides">
                <img src="pictures/Owner.jpeg" alt="Londeka with Nonhanhla: Owner">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC4.jpg" alt="Property 3">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC5.jpg" alt="Back View">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC6.jpg" alt="Back Entrance">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC7.jpg" alt="Kitchen">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC8.jpg" alt="Side View">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC10.jpg" alt="Bathroom">
            </div>
            <div class="mySlides">
                <img src="uploads/PIC11.jpg" alt="Entrance">
            </div>
        </div>

        <!-- Slideshow text description -->
        <div class="slideshow-text">
            <p>Nhlanhlo’s Rentals offers cozy, affordable housing options with modern amenities, perfect for young professionals and families alike. Book a viewing with ease on our platform and make yourself at home!</p>
        </div>
    </div>

    <footer class="footer">
        <div class="copy">&copy; 2022 Nhlanhlo's Rentals</div>

        <div class="bottom-links">
            <div class="links">
                <span>More Info</span>
                <a href="index.php">Home</a>
                <a href="About.php">About</a>
                <a href="contact.php">Contact Us</a>
            </div>
            <div class="links">
                <span>Social Links</span>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
    </script>
</body>
</html>

