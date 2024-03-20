<?php
    session_start();
    session_destroy();

    $_SESSION['notification'] = array(
        'title' => 'Successfully Logout',
        'status' => 'success',
        'description' => 'Successfully Logout. We will miss you'
    );

    header("Location: ../pages/pages-sign-in.php");
?>