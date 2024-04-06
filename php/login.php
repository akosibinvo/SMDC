<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists in admin_account table
    $stmt_admin = $conn->prepare("SELECT admin_id, firstName, lastName, role, password FROM admin_account WHERE email = ?");
    $stmt_admin->bind_param("s", $email);
    $stmt_admin->execute();
    $stmt_admin->store_result(); // Store the result for counting rows
    $stmt_admin->bind_result($admin_id, $agent, $lastname, $agent_role, $hashed_password_admin);
    $stmt_admin->fetch();

    // Verify password for admin
    if ($stmt_admin->num_rows > 0 && password_verify($password, $hashed_password_admin)) {
        // Password is correct, start admin session

        // Set a cookie if "Remember Me" is checked
        if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
            // Set a cookie to remember the admin for 30 days (2592000 seconds)
            setcookie('remember_me_cookie', $email, time() + 2592000, '/');
        } else {
            // Remove any existing remember me cookie
            setcookie('remember_me_cookie', '', time() - 3600, '/');
        }

        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['email'] = $email;
        $_SESSION['lastName'] = $lastname;
        $_SESSION['role'] = $agent_role;
        $_SESSION['agent'] = $agent;

        // Notification
        $_SESSION['notification'] = array(
            'title' => 'Login successful',
            'status' => 'success',
            'description' => 'Welcome, ' . $agent . ' ' . $lastname . '!'
        );

        // Redirect to admin dashboard
        header('Location: ../admin/index.php');
        exit;
    }

    $stmt_admin->close(); // Close admin account query

    // Check if email exists in users table
    $stmt_user = $conn->prepare("SELECT ID, firstName, lastName, role, password FROM users WHERE email = ?");
    $stmt_user->bind_param("s", $email);
    $stmt_user->execute();
    $stmt_user->store_result(); // Store the result for counting rows
    $stmt_user->bind_result($user_id, $agent_user, $lastname_user, $agent_role_user, $hashed_password_user);
    $stmt_user->fetch();

    // Verify password for user
    if ($stmt_user->num_rows > 0 && password_verify($password, $hashed_password_user)) {
        // Password is correct, start user session

        // Set a cookie if "Remember Me" is checked
        if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
            // Set a cookie to remember the user for 30 days (2592000 seconds)
            setcookie('remember_me_cookie', $email, time() + 2592000, '/');
        } else {
            // Remove any existing remember me cookie
            setcookie('remember_me_cookie', '', time() - 3600, '/');
        }

        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['lastName'] = $lastname_user;
        $_SESSION['role'] = $agent_role_user;
        $_SESSION['agent'] = $agent_user;

        // Notification
        $_SESSION['notification'] = array(
            'title' => 'Login successful',
            'status' => 'success',
            'description' => 'Welcome, ' . $agent_user . ' ' . $lastname_user . '!'
        );

        // Redirect to main application page
        header('Location: ../index.php');
        exit;
    }

    $stmt_user->close(); // Close user account query

    // Invalid username or password for both admin and user
    $_SESSION['notification'] = array(
        'title' => 'Invalid Credentials',
        'status' => 'error',
        'description' => 'Incorrect email or password. Please try again.'
    );
    header('Location: ../pages/pages-sign-in.php');
    exit;
}
