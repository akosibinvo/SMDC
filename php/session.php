<?php
session_start();

require "connection.php";


if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE ID = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $user_id = $row["ID"];

            $user_fullname = $row["firstName"] . " " . $row["lastName"];

            $firstname = $row["firstName"];
            $lastname = $row["lastName"];
            $email = $row["email"];
            $contact = $row["contactNo"];
            $agent_role = $row["role"];
            $dateJoined = $row['dateJoined'];
            $formatted_date = date("F j, Y", strtotime($dateJoined));
            $team_id = $row['team_id'];
        }
    }
} else if (isset($_SESSION['admin_id'])) {

    $admin_id = $_SESSION['admin_id'];

    $sql = "SELECT * FROM admin_account WHERE admin_id = $admin_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $admin_id = $row["admin_id"];

            $admin_fullname = $row["firstName"] . " " . $row["lastName"];

            $admin_firstname = $row["firstName"];
            $admin_lastname = $row["lastName"];
            $admin_email = $row["email"];
            $admin_contact = $row["contactNo"];
            $admin_role = $row["role"];
            $dateJoined = $row['dateJoined'];
            $formatted_date = date("F j, Y", strtotime($dateJoined));
        }
    } else {
        header('Location: pages-sign-in.php');
        exit();
    }
}
