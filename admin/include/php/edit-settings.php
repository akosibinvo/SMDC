<?php
session_start();

require "../../../php/connection.php";


if (isset($_POST['edit_settings'])) {

    $id = $_SESSION['user_id'];

    $settings_firstname = $_POST['settings_firstname'];
    $settings_lastname = $_POST['settings_lastname'];
    $settings_contact = $_POST['settings_contact'];
    $settings_email = $_POST['settings_email'];


    // Database update logic using prepared statements
    $sql = "UPDATE users SET firstName = ?, lastName =?, contactNo = ?, email= ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $settings_firstname, $settings_lastname, $settings_contact, $settings_email, $id);

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