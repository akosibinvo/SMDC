<?php
session_start();

require "../../../php/connection.php";


if (isset($_POST['update_profile'])) {

    $id = $_SESSION['user_id'];

    $profile_firstname = $_POST['profile_firstname'];
    $profile_lastname = $_POST['profile_lastname'];
    $profile_contact = $_POST['profile_contact'];


    // Database update logic using prepared statements
    $sql = "UPDATE users SET firstName = ?, lastName =?, contactNo = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $profile_firstname, $profile_lastname, $profile_contact, $id);

    if ($stmt->execute()) {

        $sql_role = "SELECT role FROM users WHERE id = ?";
        $stmt_role = $conn->prepare($sql_role);
        $stmt_role->bind_param("i", $id);
        $stmt_role->execute();
        $stmt_role->bind_result($role);
        $stmt_role->fetch();
        $stmt_role->close();
        
        if ($role === "SA1" || $role === "SA2") {
            header("Location: ../../../pages/pages-profile.php");
        } else if ($role === "IMP") {
            header("Location: ../../../pages/pages-profile-imp.php");
        } else {
            echo "Error";
        }

    } else {
        // Update failed
        $_SESSION['insert'] = false;
    }
    $stmt->close();
}

?>