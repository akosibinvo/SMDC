<?php
session_start();
require "../../../php/connection.php";


if (isset($_POST['admin_update'])) {
    $target_directory = '../../../img/avatars/admin/';

    // Retrieve the admin from session
    $admin_firstname = $_SESSION['firstName'];
    $admin_id = $_SESSION['admin_id'];


    // Check if 'profilePic' file is uploaded
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {

        $tmp_name_profile = $_FILES['profilePic']['tmp_name'];
        $profile_pic = $_FILES['profilePic']['name'];

        $filename = pathinfo($profile_pic, PATHINFO_FILENAME);
        $extension = pathinfo($profile_pic, PATHINFO_EXTENSION);

        $admin = $admin_firstname;

        $unique_filename = $filename . '_' . $admin . '.' . $extension;

        // Move the uploaded 'profilePic' file to the target directory
        $target_path_profile = $target_directory . $unique_filename;

        if (!move_uploaded_file($tmp_name_profile, $target_path_profile)) {
            $_SESSION['insert'] = false;
            exit();
        }
    } else {
        echo "No file was uploaded.";
    }

    // Database update logic using prepared statements
    $sql = "UPDATE admin_account SET img = ? WHERE admin_id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $unique_filename, $admin_id);

    if ($stmt->execute()) {

        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully updated your profile.'
        );

        header("Location: ../../pages/pages-admin-profile.php");
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in updating your profile.'
        );
    }
    $stmt->close();
}
