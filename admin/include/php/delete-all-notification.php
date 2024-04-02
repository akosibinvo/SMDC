<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['delete_all'])) {

    $notif_id = $_POST['delete_all_id'];

    $user_id = $_SESSION['user_id'];


    // Check if there are any rows in the table
    $check_query = "SELECT COUNT(*) as total_rows FROM notifications WHERE user_id = '$user_id' ";
    $check_result = mysqli_query($conn, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $total_rows = $row['total_rows'];

    if ($total_rows > 0) {
        // Delete all rows from the table
        $query = "DELETE FROM notifications WHERE user_id = '$user_id'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['notification'] = array(
                'title' => 'Success!',
                'status' => 'success',
                'description' => 'You\'ve successfully deleted all the notifications.'
            );
        } else {
            $_SESSION['notification'] = array(
                'title' => 'Error!',
                'status' => 'error',
                'description' => 'Error in deleting all the notifications.'
            );
        }
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'There are no notifications to delete.'
        );
    }

    header("Location: ../../../pages/pages-notifications.php");
    exit;
}
