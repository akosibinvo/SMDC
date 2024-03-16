<?php
require "../../php/connection.php";

session_start();

if (isset($_POST['updatedata'])) {
    $id = $_POST['update_id'];

    // Sanitize and retrieve form data
    $projectname = mysqli_real_escape_string($conn, $_POST['projectname']);
    $unitcode = mysqli_real_escape_string($conn, $_POST['unitcode']);

    // Prepare and execute the SQL query
    $query = "UPDATE unit_info SET Project_name=?, Unit_code=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $projectname, $unitcode, $id);

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