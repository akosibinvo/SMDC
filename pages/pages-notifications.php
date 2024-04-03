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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

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

                    <h1 class="h3"><strong class="title-dashboard">Notifications</strong> Dashboard</h1>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col text-end">
                                <button class="btn btn-danger clearAll"><i class="align-middle me-1" data-feather="trash-2"></i>Clear All</button>
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

                                $sql_notif = "SELECT *, DATE_FORMAT(timestamp, '%h:%i %p') AS time_only FROM notifications WHERE user_id = '$id' AND (read_status = '0' OR read_status = '1') ORDER BY read_status ";
                                $res_notif  = mysqli_query($conn, $sql_notif);
                                $count_notif  = mysqli_num_rows($res_notif);

                                ?>

                                <div class="card-body">
                                    <div class="list-group">

                                        <?php
                                        if (mysqli_num_rows($res_notif) > 0) {

                                            while ($row_notif = mysqli_fetch_assoc($res_notif)) {
                                                $listGroupClass = ($row_notif['read_status'] == 0) ? 'list-group-item custom-notif-bg rounded-2 border-0' : 'list-group-item';
                                                $textColor = ($row_notif['read_status'] == 0) ? 'custom-notif-color' : 'text-dark';
                                                $iconColor = ($row_notif['read_status'] == 0) ? 'custom-notif-color' : 'text-success';
                                                $onClickAttr = ($row_notif['read_status'] == 0) ? 'onclick="markAsRead(' . $row_notif['notification_id'] . ')"' : 'onclick="myFunction()"';

                                        ?>
                                                <div class="<?php echo $listGroupClass; ?> mb-2 rounded-2 border-1" <?php echo $onClickAttr; ?> style="cursor: pointer;">
                                                    <div class="row text-center d-flex align-items-center justify-content-center">
                                                        <div class="col-1 col-md-1 col-xl-1">
                                                            <i class="<?php echo $iconColor; ?>" data-feather="check-circle"></i>
                                                        </div>
                                                        <div class="col-12 col-md-2 col-xl-2 d-none d-md-block d-xl-block">
                                                            <div class="<?php echo $textColor; ?>">Approved Booking</div>
                                                        </div>

                                                        <div class="col-10 col-md-7 col-xl-7">
                                                            <div class="<?php echo $textColor; ?> small mt-1"><?php echo $row_notif['message']; ?></div>
                                                        </div>

                                                        <div class="col-12 col-md-1 col-xl-1 d-none d-md-block d-xl-block">
                                                            <div class="<?php echo $textColor; ?> small mt-1"><?php echo $row_notif['time_only']; ?></div>
                                                        </div>

                                                        <div class="col-1 col-md-1 col-xl-1">
                                                            <div class="<?php echo $textColor; ?> mt-1"><i class="align-middle me-1 trash-icon" data-feather="trash-2" data-bs-toggle="modal" data-bs-target="#deleteNotificationModal"></i></div>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

    <?php
    // Check if there is a notification in the session
    if (isset($_SESSION['notification'])) {
        // Get notification details
        $title = $_SESSION['notification']['title'];
        $status = $_SESSION['notification']['status'];
        $description = $_SESSION['notification']['description'];
        // Clear the notification from the session
        unset($_SESSION['notification']);
    }
    ?>

    <script>
        pushNotify("<?php echo $status; ?>", "<?php echo $title; ?>", "<?php echo $description; ?>");

        function pushNotify(status, title, description) {
            new Notify({
                status: status,
                title: title,
                text: description,
                effect: 'slide',
                speed: 600,
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
            $('.trash-icon').on('click', function() {
                $('#deleteNotificationModal').modal('show');

                var notificationId = $(this).closest('.list-group-item').find('.notification-id').text();
                $('#delete_notif_id').val(notificationId);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.clearAll').on('click', function() {
                $('#deleteAllModal').modal('show');

                var notificationId = $(this).closest('.list-group-item').find('.notification-id').text();
                $('#delete_all_id').val(notificationId);
            });
        });
    </script>

    <script>
        function markAsRead(notificationId) {
            // Send AJAX request to mark notification as read
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../admin/include/php/mark_as_read.php?notification_id=' + notificationId, true);
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Redirect to the notifications page after marking as read
                    window.location.href = 'pages-notifications.php';
                } else {
                    // Handle errors if any
                    console.error('Error marking notification as read:', xhr.statusText);
                }
            };
            xhr.send();
        }
    </script>

</body>

</html>