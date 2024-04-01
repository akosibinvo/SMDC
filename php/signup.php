<?php
session_start();
include 'functions.php';

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $referrer_id = $_POST['team'] ?? 0;
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
        $referrer_id = 0;
    }

    // If no errors, create account
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "SA1";

        // Store POST values in session
        $_SESSION['signup_data'] = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $hashed_password,
            'contactNo' => $contactNo,
            'role' => $role,
            'referrer_id' => $referrer_id
        );

        // Insert user into database
        // $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ? ,?, ?, ?)");
        // $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashed_password, $role);
        // $stmt->execute();
        // $stmt->close();

        // Generate a random 6-digit OTP code
        $otpCode = sprintf("%06d", mt_rand(0, 999999));
        $_SESSION['email-verify'] = $email;

        if (sendEmailWithOTP($email, $otpCode)) {
            $_SESSION['otp'] = $otpCode;
        }

        $_SESSION['notification'] = array(
            'title' => 'OTP successfully sent',
            'status' => 'success',
            'description' => 'Please verify your email to continue',
        );

        // Redirect to login page
        header('Location: ../pages/pages-validate-email.php');
        exit;
    }
}
