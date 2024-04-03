<?php

session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateUserPassword'])) {
        $currentPassword = $_POST['profile-current-password'];
        $newPassword = $_POST['profile_new_password'];
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("SELECT password FROM users WHERE ID = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $stmt->bind_result($storedHashedPassword);
        $stmt->fetch();
        $stmt->close();

        if ($storedHashedPassword) {
            if (password_verify($currentPassword, $storedHashedPassword)) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $result = $stmt->execute([$hashedPassword, $user_id]);

                if ($result) {
                    $_SESSION['notification'] = array(
                        'title' => 'Successfully Upadated!',
                        'status' => 'success',
                        'description' => 'Password updated successfully!',
                    );
                } else {
                    $_SESSION['notification'] = array(
                        'title' => 'Error in Upadating',
                        'status' => 'error',
                        'description' => 'Error updating password!',
                    );
                }

                header('Location: ../pages/pages-settings.php');
                exit;
            } else {
                $_SESSION['notification'] = array(
                    'title' => 'Invalid Password',
                    'status' => 'error',
                    'description' => 'Current password do not match',
                );

                header('Location: ../pages/pages-settings.php');
                exit;
            }
        }
    }
}
