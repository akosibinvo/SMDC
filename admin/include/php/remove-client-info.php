<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['remove_info'])) {

    $id = $_POST['remove_info_id'];

    $query = "DELETE FROM client_info WHERE ID='$id'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully removed the clients information.'
        );
        header("Location: ../../index.php");
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in removing the clients information.'
        );
    }
}
