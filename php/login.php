<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from database
    $stmt = $conn->prepare("SELECT ID, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, start session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        // Redirect to dashboard or desired page
        header('Location: ../index.php');
        exit;
    } else {
        // Invalid username or password
        $errors[] = "Invalid password";
        header('Location: ../pages/pages-sign-in.php');
    }
}