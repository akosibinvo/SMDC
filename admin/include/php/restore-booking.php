<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['restore'])) {
    $id = $_POST['restore_id'];

    $move_query = "INSERT INTO transaction_booking SELECT * FROM archives_booking WHERE client_id='$id'";
    $move_result = mysqli_query($conn, $move_query);

    if ($move_result) {
        $delete_query = "DELETE FROM archives_booking WHERE client_id='$id'";
        $delete_result = mysqli_query($conn, $delete_query);

        if ($delete_result) {

            $update_query = "UPDATE transaction_booking SET status='Pending' WHERE client_id='$id'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                $_SESSION['notification'] = array(
                    'title' => 'Success!',
                    'status' => 'success',
                    'description' => 'You\'ve successfully restored the booking.'
                );
            }
            
            header("Location: ../../pages/pages-archives.php");
        }
        
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'success',
            'description' => 'Error in restoring the data.'
        );
    }
}
