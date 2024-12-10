<?php
session_start();
require_once 'db_config.php';  // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check if the user exists
    $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // If user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        // Start session and store user information
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];  // Ensure fullname is set
        $_SESSION['email'] = $user['email'];  // Ensure email is set
        $_SESSION['phone'] = $user['phone'];  // Ensure phone is set
        $_SESSION['dob'] = $user['dob'];  // Ensure dob is set
        $_SESSION['nationality'] = $user['nationality'];  // Ensure nationality is set
        $_SESSION['marital_status'] = $user['marital_status'];  // Ensure marital status is set
        $_SESSION['degree'] = $user['degree'];  // Ensure degree is set
        $_SESSION['institution'] = $user['institution'];  // Ensure institution is set
        $_SESSION['soft_skills'] = $user['soft_skills'];  // Ensure soft_skills is set
        $_SESSION['languages_known'] = $user['languages_known'];  // Ensure languages_known is set
        $_SESSION['hobbies'] = $user['hobbies'];  // Ensure hobbies is set

        // Redirect to biodata.php
        header("Location: biodata.php");
        exit;
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}
?>
