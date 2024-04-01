<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['delete_notif'])) {

    $id = $_POST['delete_notif_id'];

    $query = "DELETE FROM notifications WHERE notification_id = '$id'";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {
        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully deleted the notification.'
        );
        
        header("Location: ../../../pages/pages-notifications.php");
        exit;

    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in deleting the notification.'
        );
    }
}
