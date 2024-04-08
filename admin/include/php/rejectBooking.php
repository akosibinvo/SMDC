<?php
require "../../../php/connection.php";

if(isset($_POST['delete']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM transaction_booking WHERE client_id='$id'";
    
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../../pages/pages-booking-approval.php");
    }
    else
    {

    }
}

?>