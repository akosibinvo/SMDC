<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['delete_all'])) {

    $query = "DELETE FROM notifications";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully deleted all the notifications.'
        );

        header("Location: ../../../pages/pages-notifications.php");
        exit;
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in deleting all the notifications.'
        );
    }
}
