<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $contactNo = $_POST['contact-number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $agree_to_terms = isset($_POST['terms-and-condition']) ? 1 : 0;

    //validate password
    if ($password !== $confirm_password) {
        $_SESSION['notification'] = array(
            'title' => 'Password Mismatch',
            'status' => 'error',
            'description' => 'Passwords do not match'
        );

        // Redirect to signup page
        header('Location: ../pages/pages-sign-up.php');
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['notification'] = array(
            'title' => 'Invalid Email',
            'status' => 'error',
            'description' => 'Email address already registered'
        );
        // Redirect to login page
        header('Location: ../pages/pages-sign-in.php');
        exit;
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "SA1";

        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ? ,?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashed_password, $role);
        $stmt->execute();
        $stmt->close();

        $_SESSION['notification'] = array(
            'title' => 'Successfully Registered',
            'status' => 'success',
            'description' => 'You successfully registered. Please login'
        );

        // Redirect to login page
        header('Location: ../pages/pages-sign-in.php');
        exit;
    }
}