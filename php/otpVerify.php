<?php
session_start();
include 'functions.php';

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //OTP verification for forgot password
    if (isset($_POST['submit-otp'])) {
        $userOTP = $_POST['userOtp'];

        if (verifyOTP($userOTP)) {
            $_SESSION['notification'] = array(
                'title' => 'OTP code validated',
                'status' => 'success',
                'description' => 'OTP verification success. Please reset your password.',
            );

            //unset otp session
            unset($_SESSION['otp']);

            // Redirect to dashboard or desired page
            header('Location: ../pages/pages-reset-password.php');
            exit;
        } else {
            // Redirect back to the OTP entry page or display an error message
            $_SESSION['notification'] = array(
                'title' => 'Verification Failed',
                'status' => 'error',
                'description' => 'OTP verification failed. Please try again.',
            );
            // Redirect to dashboard or desired page
            header('Location: ../pages/pages-otp-code.php');
            exit;
        }
    }

    //OTP Verification for new user
    if (isset($_POST['submit-otp-validate-email'])) {
        $userOTP = $_POST['userOtp-signup-validation'];

        if (verifyOTP($userOTP)) {
            // Check if signup data is set in session
            if (isset($_SESSION['signup_data'])) {
                // Get signup data
                $signup_data = $_SESSION['signup_data'];

                // Unset the signup data to clear it after use
                unset($_SESSION['signup_data']);

                // Now you can access the signup data and use it as needed
                $firstName = $signup_data['firstName'];
                $lastName = $signup_data['lastName'];
                $email = $signup_data['email'];
                $password = $signup_data['password'];
                $contactNo = $signup_data['contactNo'];
                $role = $signup_data['role'];
                $referrer_id = $signup_data['referrer_id'];

                // Insert user into database
                $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, contactNo, role , team_id) VALUES (?, ? ,?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssss", $firstName, $lastName, $email, $password, $contactNo, $role, $referrer_id);
                $stmt->execute();
                $stmt->close();
            }

            $_SESSION['notification'] = array(
                'title' => 'OTP code validated',
                'status' => 'success',
                'description' => 'OTP verification success. Please sign in your account.',
            );

            //unset otp and email session
            unset($_SESSION['otp']);
            unset($_SESSION['email-verify']);

            // Redirect to dashboard or desired page
            header('Location: ../pages/pages-sign-in.php');
            exit;
        }
    }
}
