<?php
session_start();

require "../../../php/connection.php";



if (isset($_POST['updateSellers'])) {

    $update_id = $_POST['update_id'];
    $sellersRole = $_POST['sellersRole'];

    // Database update logic using prepared statements
    $sql = "UPDATE users SET role = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $sellersRole, $update_id);

    if ($stmt->execute()) {

        $_SESSION['notification'] = array(
            'title' => 'Updated Successfully',
            'status' => 'success',
            'description' => 'You\'ve successfully updated the role.'
        );

        header("Location: ../../pages/pages-manage-sellers.php");
    } else {
        // Update failed
        $_SESSION['insert'] = false;
    }
    $stmt->close();
}

?>

