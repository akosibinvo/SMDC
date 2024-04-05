<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['reject'])) {
    $id = $_POST['reject_id'];

    $move_query = "INSERT INTO archives_booking SELECT * FROM transaction_booking WHERE transaction_id = '$id'";
    $move_result = mysqli_query($conn, $move_query);

    if ($move_result) {
        $delete_query = "DELETE FROM transaction_booking WHERE transaction_id = '$id'";
        $delete_result = mysqli_query($conn, $delete_query);

        if ($delete_result) {

            $update_query = "UPDATE archives_booking SET status='Removed' WHERE transaction_id = '$id'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                $_SESSION['notification'] = array(
                    'title' => 'Success!',
                    'status' => 'success',
                    'description' => 'You\'ve successfully removed the booking.'
                );
            }

            header("Location: ../../pages/pages-booking-approval.php");
        }
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in removing the data.'
        );
    }
}
