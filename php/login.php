<?php
session_start();

// Include database connection
require_once 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user from database
    $stmt = $conn->prepare("SELECT ID, firstName, lastName, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $agent, $lastname, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if ($hashed_password && password_verify($password, $hashed_password)) {
        // Password is correct, start session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        $_SESSION['lastName'] = $lastname;
        $_SESSION['agent'] = $agent;
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
    else if ($email == "admin@gmail.com" && $password == "admin"){
        header('Location: ../admin/index.php');
    }
    
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