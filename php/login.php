<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($email == "admin@gmail.com" && $password == "admin") {
        header('Location: ../admin/index.php');
        exit;
    }

    //if email does not exist
    if ($count == 0) {
        $_SESSION['notification'] = array(
            'title' => 'Invalid Email',
            'status' => 'error',
            'description' => 'Email address is not registered',
        );
        // Redirect to login page
        header('Location: ../pages/pages-sign-in.php');
        exit;
    } 

    //If exist Retrieve user from database
    $stmt = $conn->prepare("SELECT ID, firstName, lastName, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $agent, $lastname, $agent_role, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, start session



        // Set a cookie if "Remember Me" is checked
        if (isset($_POST['remember-me']) && $_POST['remember-me'] == 'on') {
            // Set a cookie to remember the user for 30 days (2592000 seconds)
            setcookie('remember_me_cookie', $email, time() + 2592000, '/');
        } else {
            // Set cookie expiration time to a past date
            setcookie('remember_me_cookie', '', time() - 3600, '/');
        }

        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['lastName'] = $lastname;
        $_SESSION['role'] = $agent_role;
        $_SESSION['agent'] = $agent;
        $_SESSION['team_id'] = $team_id;

        //Notification
        $_SESSION['notification'] = array(
            'title' => 'Login successfully',
            'status' => 'success',
            'description' => 'Welcome,' . " " . $agent . " " . $lastname . "!"
        );

        // Redirect to dashboard or desired page
        header('Location: ../index.php');
        exit;
    }

    //Admin Log In (Needs to be removed once configuration of admin is done)
    else {
        // Invalid username or password
        $errors[] = "Invalid password";
        $_SESSION['notification'] = array(
            'title' => 'Password doesn\'t match',
            'status' => 'error',
            'description' => 'Check your Password then try again'
        );
        header('Location: ../pages/pages-sign-in.php');
    }
}
