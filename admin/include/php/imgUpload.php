<?php
session_start();
require "../../../php/connection.php";


if (isset($_POST['update'])) {
    $target_directory = '../../../img/avatars/';

    // Retrieve the agent from session
    $agent = $_SESSION['agent'];

    $profile_pic = null;

    // Check if 'profilePic' file is uploaded
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_profile = $_FILES['profilePic']['tmp_name']; 
        $profile_pic = $_FILES['profilePic']['name'];

        // Move the uploaded 'profilePic' file to the target directory
        $target_path_profile = $target_directory . $profile_pic;

        if (!move_uploaded_file($tmp_name_profile, $target_path_profile)) {
            $_SESSION['insert'] = false;
            exit();
        }
    }

    // Database update logic using prepared statements
    $sql = "UPDATE users SET img = ? WHERE firstName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $profile_pic, $agent);

    if ($stmt->execute()) {

        $sql_role = "SELECT role FROM users WHERE firstName = ?";
        $stmt_role = $conn->prepare($sql_role);
        $stmt_role->bind_param("s", $agent);
        $stmt_role->execute();
        $stmt_role->bind_result($role);
        $stmt_role->fetch();
        $stmt_role->close();

        if ($role === "SA1" || $role === "SA2") {
            header("Location: ../../../pages/pages-profile.php");
        } else {
            header("Location: ../../../pages/pages-profile-imp.php");
        }

    } else {
        // Update failed
        $_SESSION['insert'] = false;
    }
    $stmt->close();
}
?>