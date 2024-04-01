<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['remove_sellers'])) {

    $id = $_POST['remove_sellers_id'];

    $query = "DELETE FROM users WHERE ID='$id'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully removed the seller.'
        );
        header("Location: ../../pages/pages-manage-sellers.php");
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in removing the seller.'
        );
    }
}
