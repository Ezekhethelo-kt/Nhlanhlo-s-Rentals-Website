<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_dashboard.php");
    exit;
}
include 'db_connect.php';

$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f5f7;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #457DB0;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar h3 {
            font-size: 1.5em;
            color: #DCEEF8;
            margin-bottom: 1em;
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            margin: 8px 0;
            width: 100%;
            text-align: center;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover, .sidebar a:focus {
            background-color: #DCEEF8;
            color: #457DB0;
        }

        .dashboard-container {
            flex-grow: 1;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            border: 1px solid #AAAAAA;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #f2f2f2;
            font-weight: 600;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .cancel-btn {
            background-color: #ff4b5c;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .cancel-btn:hover {
            background-color: #e6001a;
        }

        .upload-container {
            text-align: center;
            margin-top: 30px;
        }

        .upload-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
        }

        .status-scheduled {
            color: #28a745;
            font-weight: bold;
        }

        .status-cancelled {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h3>Admin Menu</h3>
        <!--<a href="admin_dashboard.php">Dashboard</a>-->
        <a href="manage_appointments.php">Manage Appointments</a>
        <a href="upload_photos.php">Upload Photos</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <h2>Admin Dashboard</h2>

        <!-- Booked Appointments -->
        <h3>Booked Appointments</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td class="<?php echo strtolower($row['STATUS']); ?>">
                    <?php echo ucfirst($row['STATUS']); ?>
                </td>
                <td>
                    <form action="admin_dashboard.php" method="post">
                        <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="cancel-btn">Cancel</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>


