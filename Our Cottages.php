<?php
include 'db_connect.php';
$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f5f7;
            color: #333;
            padding: 20px;
            text-align: center;
        }

        /* Slideshow Container */
        .slideshow-container {
            max-width: 800px;
            position: relative;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            overflow: hidden;
        }

        .mySlides {
            display: none;
            animation: fade 1.5s;
        }

        .mySlides img {
            width: 100%;
            border-radius: 8px;
        }

        /* Next and previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            transition: background-color 0.3s ease;
        }
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #333;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Dots */
        .dot-container {
            text-align: center;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            margin-top: 15px;
        }
        .dot {
            cursor: pointer;
            height: 12px;
            width: 12px;
            margin: 0 4px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .active, .dot:hover {
            background-color: #457DB0;
        }

        /* Keyframes for fade animation */
        @keyframes fade {
            from {opacity: 0.4}
            to {opacity: 1}
        }

        /* Navbar */
        .navbar {
            display: flex;
            background-color: #457DB0;
            overflow: hidden;
            justify-content: center;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #DCEEF8;
            color: #333;
        }

        .navbar .active {
            background-color: #575757;
        }

        /* Feature Container */
        .features-container {
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            float: left;
            margin-right: 20px;
            text-align: left;
        }

        .features-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .features-container p {
            color: #555;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        /* Book Button */
        .book-now {
            display: inline-block;
            width: 100px;
            height: 60px;
            line-height: 60px;
            background-color: #ff4c4c;
            color: #fff;
            text-align: center;
            border-radius: 50%;
            font-size: 14px;
            text-decoration: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .book-now:hover {
            background-color: #d43838;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 800px) {
            .features-container, .slideshow-container {
                width: 100%;
                float: none;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Features Section -->
    <article class="features-container">
        <h2>Features</h2>
        <p>The cottages are like a bachelor flat, with a built-in wardrobe, kitchenette with a two-plate stove, and an ensuite bathroom with hot and cold water. We also have parking spaces for vehicles.</p>
        
        <h2>Prices</h2>
        <p>Deposit = 900 (refundable)<br>Rent = 1800 p/m</p>
        <p style="color:red;">To book an appointment for viewing, please press the 'Book Now' button.</p>
        <a href="Book.php" class="book-now">Book Now</a>
    </article>

    <!-- Slideshow -->
    <div class="slideshow-container">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="mySlides">
                <img src="<?php echo $row['image_path']; ?>" alt="Image">
                <div class="text"><?php echo $row['description']; ?></div>
            </div>
        <?php endwhile; ?>
        
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!-- Dots/Circles -->
    <div class="dot-container">
        <?php
        $result->data_seek(0); // Reset result pointer
        $dotCount = 0;
        while ($row = $result->fetch_assoc()) : ?>
            <span class="dot" onclick="currentSlide(<?php echo ++$dotCount; ?>)"></span>
        <?php endwhile; ?>
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
    </script>

</body>
</html>

