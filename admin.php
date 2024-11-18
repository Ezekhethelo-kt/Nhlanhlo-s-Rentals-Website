<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Login container */
        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 40px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        /* Header styling */
        .login-container h2 {
            font-size: 1.8em;
            color: #457DB0;
            margin-bottom: 20px;
        }

        /* Label styling */
        .login-container label {
            font-weight: 600;
            display: block;
            color: #333;
            margin-bottom: 5px;
            text-align: left;
        }

        /* Input field styling */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #457DB0;
            outline: none;
        }

        /* Button styling */
        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #457DB0;
            color: white;
            font-size: 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #366A8A;
        }

        /* Extra spacing below the login form */
        .login-container p {
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }

        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: center;
            background-color: #457DB0;
            padding: 10px 0;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .navbar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 1.1em;
        }

        .navbar a:hover {
            background-color: #DCEEF8;
            color: #333;
        }
        
        .navbar .active {
            background-color: #575757;
        } 
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>For any assistance, please contact Nonhlanhla Ngcobo: (072) 744 3788.</p>
    </div>
</body>
</html>


