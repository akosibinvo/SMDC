<?php
require "../../../php/connection.php";

session_start(); // Start session at the beginning of the script

if (isset($_POST['update'])) {
    $target_directory = '../../../img/avatars/';

    // Retrieve the agent from session
    $agent = $_SESSION['agent'];

    $filename_ra = null;

    // Check if 'profilePic' file is uploaded
    if (isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_ra = $_FILES['profilePic']['tmp_name']; 
        $filename_ra = $_FILES['profilePic']['name'];

        // Move the uploaded 'profilePic' file to the target directory
        $target_path_ra = $target_directory . $filename_ra;

        if (!move_uploaded_file($tmp_name_ra, $target_path_ra)) {
            // File upload failed for profilePic
            $_SESSION['insert'] = false;
            // Redirect or handle error as needed
            exit(); // Exit script if file upload fails
        }
    }

    // Database update logic using prepared statements
    $sql = "UPDATE users SET img = ? WHERE firstName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $filename_ra, $agent);

    if ($stmt->execute()) {
        // Update successful
        header("Location: ../../../pages/pages-profile-imp.php");
    } else {
        // Update failed
        $_SESSION['insert'] = false;
    }
    $stmt->close();
}
?>