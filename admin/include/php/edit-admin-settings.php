<?php
session_start();

require "../../../php/connection.php";


if (isset($_POST['edit_admin_settings'])) {

    $admin_id = $_SESSION['admin_id'];

    $settings_firstname = $_POST['settings_firstname'];
    $settings_lastname = $_POST['settings_lastname'];
    $settings_contact = $_POST['settings_contact'];
    $settings_email = $_POST['settings_email'];


    // Database update logic using prepared statements
    $sql = "UPDATE admin_account SET firstName = ?, lastName =?, contactNo = ?, email= ? WHERE admin_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $settings_firstname, $settings_lastname, $settings_contact, $settings_email, $admin_id);

    if ($stmt->execute()) {

        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully updated your personal details.'
        );

        header("Location: ../../pages/pages-admin-settings.php");

    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in updating your personal details.'
        );
    }
    $stmt->close();
}
