<?php
require "../../php/connection.php";

session_start();

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
    $amount = mysqli_real_escape_string($conn, $_POST['price']);

    // Prepare and execute the SQL query
    $query = "UPDATE transaction_booking SET Amount=? WHERE client_id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $amount, $addprice_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['edit'] = true;
            header("Location: ../pages/pages-add-projects.php");
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