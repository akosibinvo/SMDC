<?php
require "../php/connection.php";

session_start(); // Start session at the beginning of the script

if (isset($_POST['book'])) {
    $target_directory = '../img/documents/';


    $firstname = $_POST['firstname'];
    $unitcode = $_POST['unitCode'];
    $agent = $_SESSION['agent'];
    $status = 'Pending';

    // Check if 'ra' file is uploaded
    if (isset($_FILES['RA']) && $_FILES['RA']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_ra = $_FILES['RA']['tmp_name']; 
        $filename_ra = $_FILES['RA']['name'];

        // Move the uploaded 'ra' file to the target directory
        $target_path_ra = $target_directory . $filename_ra;

        if (!move_uploaded_file($tmp_name_ra, $target_path_ra)) {
            // File upload failed for RA
            $_SESSION['insert'] = false;
            // Redirect or handle error as needed
            exit(); // Exit script if file upload fails
        }
    }

    // Check if 'rf' file is uploaded
    if (isset($_FILES['RF']) && $_FILES['RF']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_rf = $_FILES['RF']['tmp_name']; 
        $filename_rf = $_FILES['RF']['name'];

        // Move the uploaded 'rf' file to the target directory
        $target_path_rf = $target_directory . $filename_rf;

        if (!move_uploaded_file($tmp_name_rf, $target_path_rf)) {
            // File upload failed for RF
            $_SESSION['insert'] = false;
            // Redirect or handle error as needed
            exit(); // Exit script if file upload fails
        }
    }

    // Check if 'holding' file is uploaded
    if (isset($_FILES['Holding']) && $_FILES['Holding']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_holding = $_FILES['Holding']['tmp_name']; 
        $filename_holding = $_FILES['Holding']['name'];

        // Move the uploaded 'rf' file to the target directory
        $target_path_holding = $target_directory . $filename_holding;

        if (!move_uploaded_file($tmp_name_holding, $target_path_holding)) {
            // File upload failed for RF
            $_SESSION['insert'] = false;
            // Redirect or handle error as needed
            exit(); // Exit script if file upload fails
        }
    }

    // Check if 'ID' file is uploaded
    if (isset($_FILES['ID']) && $_FILES['ID']['error'] === UPLOAD_ERR_OK) {
        $tmp_name_id = $_FILES['ID']['tmp_name']; 
        $filename_id = $_FILES['ID']['name'];

        // Move the uploaded 'rf' file to the target directory
        $target_path_id = $target_directory . $filename_id;

        if (!move_uploaded_file($tmp_name_id, $target_path_id)) {
            // File upload failed for RF
            $_SESSION['insert'] = false;
            // Redirect or handle error as needed
            exit(); // Exit script if file upload fails
        }
    }

    // Database insertion logic using prepared statements
    $sql = "INSERT INTO transaction_booking (firstname, Unit_code, RA, Holding, RF, ID, agent, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $firstname, $unitcode, $filename_ra, $filename_rf, $filename_holding, $filename_id, $agent, $status);

    if ($stmt->execute()) {
        // Insertion successful
        $_SESSION['insert'] = true;
    } else {
        // Insertion failed
        $_SESSION['insert'] = false;
    }
    $stmt->close();
}
?>