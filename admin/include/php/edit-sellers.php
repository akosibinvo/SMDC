<?php
session_start();

require "../../../php/connection.php";



if (isset($_POST['updateSellers'])) {

    $update_id = $_POST['update_id'];
    $sellersRole = $_POST['sellersRole'];

    // Database update logic using prepared statements
    $sql = "UPDATE users SET role = ?, team_id = CASE WHEN role = 'IMP' THEN ? ELSE team_id END WHERE ID = ?";
    $stmt = $conn->prepare($sql);

    // If role is IMP, set team_id to the provided update_id, otherwise keep team_id unchanged
    if ($sellersRole === 'IMP') {
        $stmt->bind_param("sii", $sellersRole, $update_id, $update_id);
    } else {
        $stmt->bind_param("sii", $sellersRole, $update_id, $update_id);
    }
    
    if ($stmt->execute()) {

        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully updated the role.'
        );

        header("Location: ../../pages/pages-manage-sellers.php");
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in updating the role.'
        );
    }
    $stmt->close();
}

?>

