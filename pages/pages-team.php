<?php
include "../php/session.php";
require "../php/connection.php";

// if (isset($_SESSION['user_id'])) {
//     // Get the user ID from the session
//     $user_id = $_SESSION['user_id'];

//     // Now $user_id contains the current session's user ID
//     echo "User ID: $user_id";
// } else {
//     // Handle the case where the user ID is not set in the session
//     echo "User ID not found in session.";
// }





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/icons/logo.png" />

    <title>Statistics | SMDC JQB</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <?php
        include "sidebar.php";
        ?>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <?php
                        include "navbar.php";
                        ?>

                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong class="title-dashboard">Team</strong> Dashboard</h1>

                    <div class="row mb-0">
                        <div class="col-12 col-md-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">

                                    <h5 class="card-title mb-0 text-white">Team Overview</h5>
                                </div>
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Date Joined</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                            $team_id = $_SESSION['user_id'];

                                            $sql = "SELECT * FROM users WHERE team_id = ?";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("i", $team_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                // Output the data in each row inside the HTML table

                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr class='text-center'>";
                                                    echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
                                                    echo "<td>" . $row['role'] . "</td>";
                                                    echo "<td>" . $row['dateJoined'] . "</td>";
                                                    if ($row['active'] == "1") {
                                                        echo "<td>Yes</td>";
                                                    } else {
                                                        echo "<td>No</td>";
                                                    }

                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "No users found for team ID: $team_id";
                                            }

                                            // Close the prepared statement and database connection
                                            $stmt->close();
                                            $conn->close();
                                        } else {
                                            echo "User ID not found in session. Please log in.";
                                        } ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>



                </div>
            </main>

        </div>
    </div>

    <script src="../js/app.js"></script>
    <script src="../js/script.js"></script>


</body>

</html>