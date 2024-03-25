<?php

    session_start();

    require "../../php/connection.php";


    if (isset($_GET['client_id'])) {

        $status_id = $_GET['client_id'];

        $sql = "UPDATE `transaction_booking` SET `status` = 'Booked' WHERE client_id = '$status_id'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {

            session_start();
            $_SESSION['approved'] = true;
        } else {

            $_SESSION['not_approve'] = 'Activation failed.';
        }
    } else {

        $_SESSION['not_approve'] = 'Invalid request.';
    }

    // Go back to course-page.php
    header('Location: ../pages/pages-booking-approval.php');
