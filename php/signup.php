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
        $errors[] = "Passwords do not match";
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $errors[] = "Username already exists";
        echo "Username already exists";
        // Redirect to login page
        header('Location: ../pages/pages-sign-up.php');
        exit;
    }

    // If no errors, create account
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "SA1";

        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ? ,?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashed_password, $role);
        $stmt->execute();
        $stmt->close();

        // Redirect to login page
        header('Location: ../pages/pages-sign-in.php');
        exit;
    }
}