<?php
require "../../../php/connection.php";

session_start();

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];

    // Sanitize and retrieve form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);

    // Prepare and execute the SQL query
    $query = "UPDATE users SET firstName=? WHERE ID=?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $firstname, $id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['edit'] = true;
            header("Location: ../../../pages/pages-profile.php");
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