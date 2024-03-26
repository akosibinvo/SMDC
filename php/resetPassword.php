<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset-password'])) {
        $newPassword = $_POST['new-pass'];
        $confirmNewPassword = $_POST['confirm-new-pass'];

        //validate new password
        if ($newPassword !== $confirmNewPassword) {
            $_SESSION['notification'] = array(
                'title' => 'Invalid Password',
                'status' => 'error',
                'description' => 'Passwords do not match',
            );
    
            // Redirect to login page
            header('Location: ../pages/pages-reset-password.php');
            exit;
        } else {
            $email = $_SESSION['email-forgot'];
            $password_hashed = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $password_hashed, $email);
            if ($stmt->execute()) {
                $_SESSION['notification'] = array(
                    'title' => 'Password Updated',
                    'status' => 'success',
                    'description' => 'Your password has been successfully updated.',
                );
            } else {
                $_SESSION['notification'] = array(
                    'title' => 'Password Update Failed',
                    'status' => 'error',
                    'description' => 'Failed to update your password. Please try again later.',
                );
            }

            //unset email session
            unset($_SESSION['email-forgot']);

            // Redirect to appropriate page after password update
            header('Location: ../pages/pages-sign-in.php');
            exit;
        }
    }
}