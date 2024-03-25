<?php
include "../../../php/session.php";
require "../../../php/connection.php";

// Check if start_month and end_month are set and not empty
if (isset($_POST['start_month']) && isset($_POST['end_month']) && !empty($_POST['start_month']) && !empty($_POST['end_month'])) {
    // Sanitize input to prevent SQL injection
    $start_month = mysqli_real_escape_string($conn, $_POST['start_month']);
    $end_month = mysqli_real_escape_string($conn, $_POST['end_month']);

    // Query to fetch total sum amount for the selected months
    $query = "SELECT SUM(Amount) AS total_amount 
                FROM transaction_booking 
                WHERE status = 'Booked' AND user_id = '$id'
                AND MONTH(Transaction_date) IN ($start_month, $end_month)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Initialize variables to store total sum amount for start and end months
        $start_amount = 0;
        $end_amount = 0;

        // Fetch and store total sum amounts
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['month'] == $start_month) {
                $start_amount = $row['total_amount'];
            } elseif ($row['month'] == $end_month) {
                $end_amount = $row['total_amount'];
            }
        }

        // Prepare response array
        $response = array(
            'start_amount' => $start_amount,
            'end_amount' => $end_amount
        );

        // Send response as JSON
        echo json_encode($response);
    } else {
        // Error occurred while fetching data
        echo json_encode(array('error' => 'Failed to fetch total sum amount.'));
    }
} else {
    // Invalid or missing start_month or end_month
    echo json_encode(array('error' => 'Invalid or missing start_month or end_month.'));
}
