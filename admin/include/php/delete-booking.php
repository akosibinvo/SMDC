<?php
session_start();
require "../../../php/connection.php";

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM archives_booking WHERE client_id='$id'";
    
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully deleted the booking.'
        );
        header("Location: ../../pages/pages-archives.php");
    }
    else
    {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in deleting the booking.'
        );
    }
}

?>