<?php
include '../../php/session.php';
include '../../php/connection.php';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    header("Location: ../../pages/pages-sign-in.php");
}

include '../include/php/modal.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="shortcut icon" href="../../img/icons/logo-square.png" />

    <title>Assign Team | SMDC JQB</title>

    <link href="../../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />


</head>

<body>
    <div class="wrapper">

        <?php
        include "admin-sidebar.php";
        ?>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        <?php
                            include "admin-navbar.php";
                        ?>

                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong class="title-dashboard"> Assign </strong> Team </h1>

                    <div class="row">
                        <div class="col-12 col-md-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title text-white mb-0">Assign Team</h5>
                                </div>
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Date Joined</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $results_per_page = 5;
                                        $sql_assign = "SELECT * FROM users WHERE team_id = '0' AND role != 'IMP' ";
                                        $res_assign = mysqli_query($conn, $sql_assign);

                                        if ($res_assign == TRUE) {
                                            $total_results = mysqli_num_rows($res_assign);
                                            $total_pages = ceil($total_results / $results_per_page);

                                            // Check current page and set offset
                                            if (!isset($_GET['page'])) {
                                                $page = 1;
                                            } else {
                                                $page = $_GET['page'];
                                            }
                                            $offset = ($page - 1) * $results_per_page;

                                            // Fetch data for the current page
                                            $sql_assign .= " LIMIT $offset, $results_per_page";
                                            $res_assign = mysqli_query($conn, $sql_assign);


                                            if ($res_assign && mysqli_num_rows($res_assign) > 0) {
                                        ?>
                                                <?php

                                                while ($rows_assign = mysqli_fetch_assoc($res_assign)) {
                                                    $assign_id = $rows_assign['ID'];
                                                    $firstname = $rows_assign['firstName'];
                                                    $lastname = $rows_assign['lastName'];
                                                    $email = $rows_assign['email'];
                                                    $role = $rows_assign['role'];
                                                    $dateJoined = $rows_assign['dateJoined'];

                                                ?>
                                                    <tr class="text-center">
                                                        <td class="d-none"> <?php echo $assign_id ?> </td>
                                                        <td> <?php echo $firstname ?> </td>
                                                        <td> <?php echo $lastname ?> </td>
                                                        <td> <?php echo $email ?> </td>

                                                        <td> <?php echo $dateJoined ?> </td>
                                                        <td class="text-primary fw-bold"><?php echo $role ?></td>
                                                        <td>
                                                            <button class="btn btn-primary assignbtn">Assign</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                    </tbody>
                            <?php
                                            } else {
                                                echo "<tr class='text-center'>";
                                                echo "<td colspan='12' style='cursor: default'>There's nothing here.</td>";
                                                echo "</tr>";
                                            }
                                        }
                            ?>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-n2">
                        <div class="d-flex justify-content-end">

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                                        <a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                                        <a class="page-link" href="?page=<?php echo min($total_pages, $page + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
    <script src="../../js/app.js"></script>

    <script>
        <?php
        // Check if there is a notification in the session
        if (isset($_SESSION['notification'])) {
            // Get notification details
            $title = $_SESSION['notification']['title'];
            $status = $_SESSION['notification']['status'];
            $description = $_SESSION['notification']['description'];
        ?>
            //Display the notification
            pushNotify("<?php echo $status; ?>", "<?php echo $title; ?>", "<?php echo $description; ?>");
        <?php
            // Clear the notification from the session
            unset($_SESSION['notification']);
        }
        ?>

        function pushNotify(status, title, description) {
            new Notify({
                status: status,
                title: title,
                text: description,
                effect: 'slide',
                speed: 800,
                customClass: null,
                customIcon: null,
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 1500,
                gap: 20,
                distance: 20,
                type: 1,
                position: 'x-center top'
            });
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.assignbtn').on('click', function() {

                $('#assignTeamModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#assign_id').val(data[0]);

            });

        });
    </script>



</body>

</html>