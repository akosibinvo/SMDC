<?php
session_start();
include 'functions.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['get-code'])) {
        $email = $_POST['email-forgot-pass'];

        // Check if email exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        
        if ($count > 0) {
            // Generate a random 6-digit OTP code
            $otpCode = sprintf("%06d", mt_rand(0, 999999));
            $_SESSION['email-forgot'] = $email;
    
            if (sendEmailWithOTP($email, $otpCode)) {
                $_SESSION['otp'] = $otpCode;
            }

            // Redirect to the OTP code page
            header('Location: ../pages/pages-otp-code.php');
            exit;
        } else {
            $_SESSION['notification'] = array(
                'title' => 'Invalid Email',
                'status' => 'error',
                'description' => 'Email does not exist'
            );
    
            // Redirect to the same page
            header('Location: ../pages/pages-forgot-password.php');
            exit;
        }
    }
}

//Resend OTP Code
if ($_GET['action'] === 'resend') {
    $email = $_SESSION['email-forgot'];

    // Generate new random 6-digit OTP code
    $otpCode = sprintf("%06d", mt_rand(0, 999999));

    if (sendEmailWithOTP($email, $otpCode)) {
        $_SESSION['otp'] = $otpCode;
    }

    // Redirect to the OTP code page
    header('Location: ../pages/pages-otp-code.php');
    exit;
        
}

//Resend OTP Code
if ($_GET['action'] === 'resend-email-verify') {
    $email = $_SESSION['email-verify'];

    // Generate new random 6-digit OTP code
    $otpCode = sprintf("%06d", mt_rand(0, 999999));

    if (sendEmailWithOTP($email, $otpCode)) {
        $_SESSION['otp'] = $otpCode;
    }

    // Redirect to the OTP code page
    header('Location: ../pages/pages-validate-email.php');
    exit;
        
}


