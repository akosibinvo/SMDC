<?php
session_start();
require "../../../php/connection.php";

if (isset($_POST['team_remove'])) {

    $team_member_id = $_POST['team_remove_id'];

    $sql = "UPDATE users SET team_id = 0 WHERE ID = '$team_member_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        $_SESSION['notification'] = array(
            'title' => 'Success!',
            'status' => 'success',
            'description' => 'You\'ve successfully removed the member.'
        );

        header("Location: ../../pages/pages-team.php");

    } else {

        $_SESSION['notification'] = array(
            'title' => 'Error!',
            'status' => 'error',
            'description' => 'Error in removing the member.'
        );

    }
} else {

    $_SESSION['notification'] = array(
        'title' => 'Error!',
        'status' => 'error',
        'description' => 'Error in removing the member.'
    );

}

// Close the database connection
mysqli_close($conn);
