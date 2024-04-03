<?php

$sql_profile = "SELECT img FROM users WHERE ID = '$user_id'";
$res_profile = mysqli_query($conn, $sql_profile);

if ($res_profile && mysqli_num_rows($res_profile) > 0) {
    $row = mysqli_fetch_assoc($res_profile);
    $profile_img_path = $row['img'];

    // Check if profile image path is not empty
    if (!empty($profile_img_path)) {
        // Concatenate the filename to the path
        $profile_img_path = "../img/avatars/" . $profile_img_path;
    } else {
        // Set default profile image path
        $profile_img_path = "../img/avatars/default/default-profile-blue.png"; // Adjust the path to include the 'avatars' folder
    }
} else {
    // Handle case when no image is found
    $profile_img_path = "../img/avatars/default/default-profile-blue.png"; // Set default profile image path
}



$sql_notif = "SELECT *, DATE_FORMAT(timestamp, '%h:%i %p') AS time_only FROM notifications WHERE user_id = '$id' AND read_status = '0' LIMIT 5 ";
$res_notif  = mysqli_query($conn, $sql_notif);
$count_notif  = mysqli_num_rows($res_notif);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <li class="nav-item dropdown mx-2">
        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
            <div class="position-relative">
                <i class="align-middle" data-feather="bell"></i>
                <span class="indicator"><?php echo $count_notif ?></span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
            <div class="dropdown-menu-header">
                <?php echo $count_notif ?> New Notifications
            </div>

            <div class="list-group">

                <?php
                while ($row_notif = mysqli_fetch_assoc($res_notif)) {

                ?>
                    <div class="list-group-item" onclick="markAsRead(<?php echo $row_notif['notification_id']; ?>)" style="cursor: pointer;">
                        <div class="row g-1 align-items-center">
                            <div class="col-2">
                                <i class="text-success" data-feather="check-circle"></i>
                            </div>
                            <div class="col-10">
                                <div class="text-dark">Approved Booking</div>
                                <div class="text-muted small mt-1"><?php echo $row_notif['message']; ?></div>
                                <div class="text-muted small mt-1"><?php echo $row_notif['time_only']; ?></div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
            <div class="dropdown-menu-footer">
                <a href="pages-notifications.php" class="text-muted">Show all notifications</a>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown">

        <img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle d-none d-sm-inline-block" width="25" height="25" />
        <a class="nav-link dropdown-toggle d-sm-inline-block me-2" href="#" data-bs-toggle="dropdown">

            <span class="text-dark">

                <?php
                echo $user_fullname;
                ?>

            </span>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="<?php echo ($agent_role === 'SA1' || $agent_role === 'SA2') ? 'pages-profile.php' : 'pages-profile-imp.php'; ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
            <a class="dropdown-item" href="pages-statistics.php"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-settings.php"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logoutModal">Log out</a>

        </div>
    </li>


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