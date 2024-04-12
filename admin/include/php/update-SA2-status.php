<?php

session_start();

require "../../../php/connection.php";


if (isset($_POST['congrats_SA2'])) {

    $id = $_SESSION['user_id'];
    $sql_update_status2 = "UPDATE users SET role = 'IMP', team_id = '$id' WHERE ID = '$id' ";

    if (mysqli_query($conn, $sql_update_status2)) {


        $sql_role = "SELECT role FROM users WHERE ID = ?";
        $stmt_role = $conn->prepare($sql_role);
        $stmt_role->bind_param("i", $id);
        $stmt_role->execute();
        $stmt_role->bind_result($role);
        $stmt_role->fetch();
        $stmt_role->close();

        if ($role === "SA1" || $role === "SA2") {
            $_SESSION['notification'] = array(
                'title' => 'Success!',
                'status' => 'success',
                'description' => 'Congratulations, you are now a SA2.'
            );

            header("Location: ../../../pages/pages-profile.php");
            unset($_SESSION['sa2_target_sales_met']);
            
        } else if ($role === "IMP") {

            $_SESSION['notification'] = array(
                'title' => 'Success!',
                'status' => 'success',
                'description' => 'Congratulations, you are now a IMP.'
            );

            header("Location: ../../../pages/pages-profile-imp.php");
            unset($_SESSION['sa2_target_sales_met']);

        } else {
            unset($_SESSION['notification']);
        }
    } else {
        echo "Error updating role: " . mysqli_error($conn);
    }
}