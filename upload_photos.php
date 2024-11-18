<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_dashboard.php");
    exit;
}

include 'db_connect.php';

$message = "";

// Handle file upload
if (isset($_POST['upload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        $message = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $message = "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $description = $_POST['description'];
            $sql = "INSERT INTO gallery (image_path, description) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $target_file, $description);
            if ($stmt->execute()) {
                $message = "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

// Handle description update
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $sql = "UPDATE gallery SET description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $description, $id);
    if ($stmt->execute()) {
        $message = "Description updated successfully.";
    } else {
        $message = "Sorry, there was an error updating the description.";
    }
    $stmt->close();
}

// Handle delete request
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Get the image path before deleting it
    $sql = "SELECT image_path FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($image_path);
    $stmt->fetch();
    $stmt->close();

    // Delete the image file from the server
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Delete the record from the database
    $sql = "DELETE FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Image deleted successfully.";
    } else {
        $message = "Sorry, there was an error deleting the image.";
    }
    $stmt->close();
}

// Fetch all images and descriptions
$sql = "SELECT * FROM gallery";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photos</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #DCEEF8;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #457DB0;
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            margin-bottom: 15px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #2a5671;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            overflow-y: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group input[type="file"],
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #AAAAAA;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #f7f7f7;
        }

        .form-group button {
            background-color: #457DB0;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #2a5671;
        }

        .gallery-container {
            margin-top: 30px;
        }

        .gallery-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 12px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
        }

        .gallery-item img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .gallery-item form {
            flex-grow: 1;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .gallery-item textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #AAAAAA;
            border-radius: 6px;
            margin-bottom: 10px;
            background-color: #f7f7f7;
        }

        .gallery-item .buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-basis: 25%;
        }

        .gallery-item button {
            background-color: #457DB0;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .gallery-item button:hover {
            background-color: #2a5671;
        }

        .gallery-item .delete-button {
            background-color: #ff4b5c;
            color: white;
        }

        .gallery-item .delete-button:hover {
            background-color: #e6001a;
        }

        .gallery-item .update-button {
            background-color: #f39c12;
            color: white;
        }

        .gallery-item .update-button:hover {
            background-color: #f1c40f;
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h3 style="text-align:center;">Admin Menu</h3>
        <a href="manage_appointments.php">Manage Appointments</a>
        <a href="upload_photos.php">Upload Photos</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <h2>Upload Photos and Descriptions</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="upload_photos.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" name="image" id="image" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="upload">Upload Photo</button>
            </div>
        </form>

        <div class="gallery-container">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="gallery-item">
                    <img src="<?php echo $row['image_path']; ?>" alt="Gallery Image">
                    <form action="upload_photos.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <textarea name="description" rows="4"><?php echo $row['description']; ?></textarea>
                        <div class="buttons">
                            <button type="submit" name="edit" class="update-button">Update Description</button>
                            <form action="upload_photos.php" method="post" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="delete-button">Delete Image</button>
                            </form>
                        </div>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>




