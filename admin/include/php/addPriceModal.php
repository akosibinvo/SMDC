<?php
session_start();

require "../../../php/connection.php";



if (isset($_POST['addprice'])) {
    $addprice_id = $_POST['addprice_id'];

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firsname']);
    $unitcode = mysqli_real_escape_string($conn, $_POST['unitcode']);
    $RA = mysqli_real_escape_string($conn, $_POST['RA']);
    $Holding = mysqli_real_escape_string($conn, $_POST['Holding']);
    $RF = mysqli_real_escape_string($conn, $_POST['RF']);
    $ID = mysqli_real_escape_string($conn, $_POST['ID']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $agent = mysqli_real_escape_string($conn, $_POST['agent']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $inputAmount = $_POST['amount'];

    // Check if the input amount contains the peso sign (₱)
    if(strpos($inputAmount, '₱') !== false) {
        // If the peso sign is found, remove it
        $amount = str_replace('₱', '', $inputAmount);
    } else {
        // If no peso sign is found, use the input amount directly
        $amount = $inputAmount;
    }

    // Remove commas from the amount
    $amount = str_replace(',', '', $amount);

    // Sanitize the input amount
    $amount = mysqli_real_escape_string($conn, $amount);

    // Prepare and execute the SQL query
    $query = "UPDATE transaction_booking SET Amount=?, `status` = 'Booked' WHERE client_id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $amount, $addprice_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['edit'] = true;
            header("Location: ../../pages/pages-booking-approval.php");
            exit();
        } else {
            $_SESSION['edit'] = false;
            // Handle error here if needed
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle prepare error here if needed
        $_SESSION['edit'] = false;
    }
}

// Close the database connection
mysqli_close($conn);
?>