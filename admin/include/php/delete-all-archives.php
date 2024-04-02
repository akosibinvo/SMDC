<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['clear_all'])) {

    // Check if there are any rows in the table
    $check_query = "SELECT COUNT(*) as total_rows FROM archives_booking";
    $check_result = mysqli_query($conn, $check_query);
    $row = mysqli_fetch_assoc($check_result);
    $total_rows = $row['total_rows'];

    if ($total_rows > 0) {
        // Delete all rows from the table
        $query = "DELETE FROM archives_booking";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['notification'] = array(
                'title' => 'Success!',
                'status' => 'success',
                'description' => 'You\'ve successfully deleted all the archives.'
            );
        } else {
            $_SESSION['notification'] = array(
                'title' => 'Error!',
                'status' => 'error',
                'description' => 'Error in deleting all the archives.'
            );
        }
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'There are no archives to delete.'
        );
    }

    header("Location: ../../pages/pages-archives.php");
    exit;
}
