<?php
session_start();

include 'db_connect.php';

$message = "";
$appointments = [];

// Handle the search request
if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];

    if (!empty($search_query)) {
        // Search by name or phone number
        $sql = "SELECT * FROM appointments WHERE (name LIKE ? OR phone LIKE ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $search_param = '%' . $search_query . '%';
            $stmt->bind_param("ss", $search_param, $search_param);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Fetch the results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $appointments[] = $row;
                }
            } else {
                $message = "No appointments found matching your search criteria.";
            }
            $stmt->close();
        } else {
            $message = "Failed to prepare the SQL statement.";
        }
    } else {
        $message = "Please enter a search query.";
    }
}

// Handle the cancel request
if (isset($_POST['cancel'])) {
    $id = $_POST['id'];

    $sql = "UPDATE appointments SET STATUS = 'Cancelled' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $message = "Appointment cancelled successfully.";
        } else {
            $message = "Sorry, there was an error cancelling the appointment.";
        }
        $stmt->close();
    } else {
        $message = "Failed to prepare the SQL statement.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Appointments</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f5f7;
            padding: 20px;
        }

        .appointment-container {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .appointment-list {
            margin-top: 20px;
        }

        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .appointment-item button {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .appointment-item button:hover {
            background-color: #e60000;
        }

        .status {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Include the Navbar -->
    <?php include 'navbar.php'; ?>

    <div class="appointment-container">
        <h2>Check Appointments</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="Check Appointment.php" method="post">
            <div class="form-group">
                <label for="search_query">Search by Name or Phone Number:</label>
                <input type="text" name="search_query" id="search_query" required>
            </div>
            <div class="form-group">
                <button type="submit" name="search">Search</button>
            </div>
        </form>

        <div class="appointment-list">
            <?php foreach ($appointments as $appointment): ?>
            <div class="appointment-item">
                <div>
                    <p><strong>Name:</strong> <?php echo $appointment['name']; ?></p>
                    <p><strong>Phone Number:</strong> <?php echo $appointment['phone']; ?></p>
                    <p><strong>Date:</strong> <?php echo $appointment['date']; ?></p>
					<p><strong>Time:</strong> <?php echo $appointment['time']; ?></p>
                    <p><strong>Status:</strong> <span class="status"><?php echo $appointment['STATUS']; ?></span></p>
                </div>
                <?php if ($appointment['STATUS'] !== 'Cancelled'): ?>
                <form action="Check Appointment.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $appointment['id']; ?>">
                    <button type="submit" name="cancel">Cancel Appointment</button>
                </form>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
