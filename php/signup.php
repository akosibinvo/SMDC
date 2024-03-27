<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $referrer_id = $_POST['team'] ?? 0;

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

        $_SESSION['notification'] = array(
            'title' => 'Invalid Password',
            'status' => 'error',
            'description' => 'Passwords do not match',
        );

        // Redirect to login page
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
        $errors[] = "Email address already exists";

        $_SESSION['notification'] = array(
            'title' => 'Invalid Email',
            'status' => 'error',
            'description' => 'Email address already exists',
        );
        // Redirect to login page
        header('Location: ../pages/pages-sign-up.php');
        exit;
    }
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE ID = ?");
    $stmt->bind_param("i", $referrer_id);
    $stmt->execute();
    $stmt->bind_result($referrer_count);
    $stmt->fetch();
    $stmt->close();

    if ($referrer_count == 0) {
        // Set $referrer_id to 0 if it doesn't match any existing user's ID
        $referrer_id = 0;
    }
    // If no errors, create account
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "SA1";

        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, contactNo, role , team_id) VALUES (?, ? ,?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashed_password, $contactNo, $role, $referrer_id);
        $stmt->execute();
        $stmt->close();

        $_SESSION['notification'] = array(
            'title' => 'Registered successfully',
            'status' => 'success',
            'description' => 'Please sign in your account',
        );

        // Redirect to login page
        header('Location: ../pages/pages-sign-in.php');
        exit;
    }
}
