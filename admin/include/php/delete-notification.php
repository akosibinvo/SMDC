<?php
require "../../../php/connection.php";

if (isset($_POST['delete_notif'])) {
    // Get the notification ID to be deleted
    $id = $_POST['delete_notif_id'];

    // Prepare the SQL query to delete the notification
    $query = "DELETE FROM notifications WHERE notification_id = '$id'";

    // Execute the query
    $query_run = mysqli_query($conn, $query);

    // Check if the query execution was successful
    if ($query_run) {
        // If successful, redirect to the notifications page
        header("Location: ../../../pages/pages-notifications.php");
        exit; // Ensure that script execution stops after redirection
    } else {
        // Handle error if query execution failed
        echo "Error deleting notification: " . mysqli_error($conn);
    }
}
