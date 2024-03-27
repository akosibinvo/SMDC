<?php
include "../php/session.php";
require "../php/connection.php";
include "../admin/include/php/modal.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/icons/logo-square.png" />

    <title>Sales | SMDC JQB</title>

    <link href="../css/app.css" rel="stylesheet">

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

                    <h1 class="h3"><strong class="title-dashboard">Sales</strong> Dashboard</h1>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col text-end">
                                <a href="#" class="btn btn-danger "><i class="align-middle me-1" data-feather="trash-2"></i>Clear All</a>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 col-md-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0 text-white">Notifications</h5>
                                </div>

                                <?php

                                $sql_notif = "SELECT *, DATE_FORMAT(timestamp, '%h:%i %p') AS time_only FROM notifications WHERE user_id = '$id' AND (read_status = '0' OR read_status = '1') ";
                                $res_notif  = mysqli_query($conn, $sql_notif);
                                $count_notif  = mysqli_num_rows($res_notif);

                                ?>

                                <div class="card-body">
                                    <div class="list-group">

                                        <?php
                                        if (mysqli_num_rows($res_notif) > 0) {

                                            while ($row_notif = mysqli_fetch_assoc($res_notif)) {

                                        ?>
                                                <div class="list-group-item">
                                                    <div class="row g-1 text-center">
                                                        <div class="col-1">
                                                            <i class="text-success" data-feather="check-circle"></i>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="text-dark">Approved Booking</div>

                                                        </div>

                                                        <div class="col-7">
                                                            <div class="text-muted small mt-1"><?php echo $row_notif['message']; ?></div>
                                                        </div>

                                                        <div class="col-1">
                                                            <div class="text-muted small mt-1"><?php echo $row_notif['time_only']; ?></div>
                                                        </div>

                                                        <div class="col-1">
                                                            <div class="text-muted small mt-1"><i class="align-middle me-1 trash-icon" data-feather="trash-2" data-bs-toggle="modal" data-bs-target="#deleteNotificationModal"></i></div>
                                                            <span class="notification-id" style="display: none;"><?php echo $row_notif['notification_id']; ?></span>
                                                        </div>


                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        } else {

                                            echo "<div class='text-center text-muted' >No new notifications</div>";
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>



                </div>
            </main>


        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('.trash-icon').on('click', function() {
                $('#deleteNotificationModal').modal('show');

                var notificationId = $(this).closest('.list-group-item').find('.notification-id').text();
                $('#delete_notif_id').val(notificationId);
            });
        });
    </script>

</body>

</html>