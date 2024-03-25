<?php
session_start();

require "../../../php/connection.php";


if (isset($_POST['edit_settings'])) {

    $id = $_SESSION['user_id'];

    $profile_firstname = $_POST['profile_firstname'];
    $profile_lastname = $_POST['profile_lastname'];
    $profile_contact = $_POST['profile_contact'];
    $profile_email = $_POST['profile_email'];


    // Database update logic using prepared statements
    $sql = "UPDATE users SET firstName = ?, lastName =?, contactNo = ?, email= ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $profile_firstname, $profile_lastname, $profile_contact, $profile_email, $id);

    if ($stmt->execute()) {
        
        $_SESSION['notification'] = array(
            'title' => 'Updated Successfully',
            'status' => 'success',
            'description' => 'You\'ve successfully updated your personal details.'
        );

        header("Location: ../../../pages/pages-settings.php");

    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!!',
            'status' => 'error',
            'description' => 'Error in updating your personal details.'
        );
    }
    $stmt->close();
}

?>