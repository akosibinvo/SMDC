<?php

require "../backend/connection.php";


if (isset($_POST['book'])) {
    // Check if 'ra' file is uploaded
    if (isset($_FILES['RA']) && $_FILES['RA']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['RA']['tmp_name'];
        $filename = $_FILES['RA']['name'];

        // Move the uploaded 'ra' file to the target directory
        $target_directory = '../img/';
        $target_path = $target_directory . $filename;

        if (move_uploaded_file($tmp_name, $target_path)) {
            // File uploaded successfully, proceed with database insertion using prepared statement
            $sql = "INSERT INTO image_document (RA) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $filename);
            if ($stmt->execute()) {
                // Insertion successful, set success session variable
                session_start();
                $_SESSION['insert'] = true;
            } else {
                // Insertion failed
                $_SESSION['insert'] = false;
            }
            $stmt->close();
        } else {
            // File upload failed
            $_SESSION['insert'] = false;
        }
    } else {
        // No file uploaded
        $_SESSION['insert'] = false;
    }
}
