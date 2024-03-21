<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Function to verify OTP
    function verifyOTP($userOTP) {
        // Check if OTP is stored in session or database (replace this with your implementation)
        $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;

        if ($storedOTP === $userOTP) {
            return true;
        } else {
            return false;
        }
    }

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
}