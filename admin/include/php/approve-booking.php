<?php
    // Connect to the database
    require "../../php/connection.php";

    session_start();
    // Check if id is set or not if true toggle,
    // else simply go back to the page
    if (isset($_GET['client_id'])){

        // Store the value from get to a
        // local variable "course_id"
        $status_id = $_GET['client_id'];

        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql = "UPDATE `transaction_booking` SET `status` = 'Booked' WHERE client_id = '$status_id'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // If the query is successful, set the session variable 'approve' to true
            session_start();
            $_SESSION['approved'] = true;
        } else {
            // If the query fails, you can set an error session variable or handle it accordingly
            $_SESSION['not_approve'] = 'Activation failed.';
        }
    } else {
        // If id is not set, set an error session variable or handle it accordingly
        $_SESSION['not_approve'] = 'Invalid request.';
    }

    // Go back to course-page.php
    header('Location: ../pages/pages-booking-approval.php');
?>





