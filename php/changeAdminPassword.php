<?php

session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateAdminPassword'])) {
        $currentPassword = $_POST['profile-current-password'];
        $newPassword = $_POST['profile_new_password'];
        $admin_id = $_SESSION['admin_id'];

        $stmt = $conn->prepare("SELECT password FROM admin_account WHERE admin_id = ?");
        $stmt->bind_param("s", $admin_id);
        $stmt->execute();
        $stmt->bind_result($storedHashedPassword);
        $stmt->fetch();
        $stmt->close();

        if ($storedHashedPassword) {
            if (password_verify($currentPassword, $storedHashedPassword)) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("UPDATE admin_account SET password = ? WHERE admin_id = ?");
                $result = $stmt->execute([$hashedPassword, $admin_id]);

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

                header('Location: ../admin/pages/pages-admin-settings.php');
                exit;
            } else {
                $_SESSION['notification'] = array(
                    'title' => 'Invalid Password',
                    'status' => 'error',
                    'description' => 'Current password do not match',
                );

                header('Location: ../admin/pages/pages-admin-settings.php');
                exit;
            }
        }
    }
}
