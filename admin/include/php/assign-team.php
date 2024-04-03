<?php
session_start();

require "../../../php/connection.php";



if (isset($_POST['assignTeambtn'])) {

    $assign_id = $_POST['assign_id'];
    $assignTeam = $_POST['assignTeam'];


    // Database update logic using prepared statements
    $sql = "UPDATE users SET team_id = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $assignTeam, $assign_id);

    if ($stmt->execute()) {

        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully assigned a seller to a team.'
        );

        header("Location: ../../pages/pages-assign-team.php");
    } else {
        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in assigning a seller to a team.'
        );
    }
    $stmt->close();
}
