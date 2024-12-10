<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.html");  // Redirect to home if not logged in
    exit();
}

// Retrieve user data from session
$user = $_SESSION;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Biodata</title>
    <style>
        /* General Styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar-right {
            float: right;
        }

        /* Main Container */
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        li:last-child {
            border-bottom: none;
        }

        strong {
            color: #2c3e50;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Logout Button */
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="biodata.php">Your Biodata</a>
        <a href="index.html">Home</a>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="navbar-right">Logout</a>
        <?php else: ?>
            <a href="index.html#login-form" class="navbar-right">Login</a>
        <?php endif; ?>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($user['fullname']); ?>!</h1>
        <h2>Your Biodata</h2>
        <ul>
            <li><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></li>
            <li><strong>Full Name:</strong> <?php echo htmlspecialchars($user['fullname']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
            <li><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></li>
            <li><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dob']); ?></li>
            <li><strong>Nationality:</strong> <?php echo htmlspecialchars($user['nationality']); ?></li>
            <li><strong>Marital Status:</strong> <?php echo htmlspecialchars($user['marital_status']); ?></li>
            <li><strong>Degree:</strong> <?php echo htmlspecialchars($user['degree']); ?></li>
            <li><strong>Institution:</strong> <?php echo htmlspecialchars($user['institution']); ?></li>
            <li><strong>Soft Skills:</strong> <?php echo htmlspecialchars($user['soft_skills']); ?></li>
            <li><strong>Languages Known:</strong> <?php echo htmlspecialchars($user['languages_known']); ?></li>
            <li><strong>Hobbies:</strong> <?php echo htmlspecialchars($user['hobbies']); ?></li>
        </ul>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</body>
</html>
