<?php
include 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $marital_status = $_POST['marital_status'];
    $degree = $_POST['degree'];
    $institution = $_POST['institution'];
    $soft_skills = $_POST['soft_skills'];
    $languages_known = $_POST['languages_known'];
    $hobbies = $_POST['hobbies'];

    // Insert into the database
    $sql = "INSERT INTO users (username, password, fullname, email, phone, dob, nationality, marital_status, degree, institution, soft_skills, languages_known, hobbies) 
            VALUES ('$username', '$password', '$fullname', '$email', '$phone', '$dob', '$nationality', '$marital_status', '$degree', '$institution', '$soft_skills', '$languages_known', '$hobbies')";

    if ($conn->query($sql) === TRUE) {
        // Set session variables for the user
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['dob'] = $dob;
        $_SESSION['nationality'] = $nationality;
        $_SESSION['marital_status'] = $marital_status;
        $_SESSION['degree'] = $degree;
        $_SESSION['institution'] = $institution;
        $_SESSION['soft_skills'] = $soft_skills;
        $_SESSION['languages_known'] = $languages_known;
        $_SESSION['hobbies'] = $hobbies;

        // Redirect to biodata.php after successful registration
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
