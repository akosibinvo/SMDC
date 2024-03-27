<?php
session_start();
require "../../../php/connection.php";

// Check if notification_id is provided
if (isset($_GET['notification_id'])) {

    // Sanitize input
    $notification_id = mysqli_real_escape_string($conn, $_GET['notification_id']);

    // Update the read_status column to mark the notification as read
    $sql = "UPDATE notifications SET read_status = '1' WHERE notification_id = '$notification_id'";
    if (!mysqli_query($conn, $sql)) {
        echo "Error updating notification: " . mysqli_error($conn);
    } 
    
    // Close database connection
    mysqli_close($conn);
} else {
    echo "Notification ID not provided";
}
