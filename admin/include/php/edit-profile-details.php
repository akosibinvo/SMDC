<?php
session_start();
require "../../../php/connection.php";


if (isset($_POST['update'])) {
    $target_directory = '../../../img/avatars/';

    // Retrieve the agent from session
    $agent = $_SESSION['agent'];
    $id = $_SESSION['user_id'];
    

    // Check if 'profilePic' file is uploaded
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
        
        $tmp_name_profile = $_FILES['profilePic']['tmp_name'];
        $profile_pic = $_FILES['profilePic']['name'];

        $filename = pathinfo($profile_pic, PATHINFO_FILENAME);
        $extension = pathinfo($profile_pic, PATHINFO_EXTENSION);

        $agent_name = $agent;

        $unique_filename = $filename . '_' . $agent_name . '.' . $extension;

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
    $sql = "UPDATE users SET img = ? WHERE ID = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $unique_filename, $id);

    if ($stmt->execute()) {

        $sql_role = "SELECT role FROM users WHERE ID = ?";
        $stmt_role = $conn->prepare($sql_role);
        $stmt_role->bind_param("s", $agent);
        $stmt_role->execute();
        $stmt_role->bind_result($role);
        $stmt_role->fetch();
        $stmt_role->close();

        if ($role === "SA1" || $role === "SA2") {

            $_SESSION['notification'] = array(
                'title' => 'Success!!',
                'status' => 'success',
                'description' => 'You\'ve successfully updated your profile.'
            );

            header("Location: ../../../pages/pages-profile.php");
        } else {

            $_SESSION['notification'] = array(
                'title' => 'Success!!',
                'status' => 'success',
                'description' => 'You\'ve successfully updated your profile.'
            );

            header("Location: ../../../pages/pages-profile-imp.php");
        }

    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!!',
            'status' => 'error',
            'description' => 'Error in updating your profile.'
        );
    }
    $stmt->close();
}
?>