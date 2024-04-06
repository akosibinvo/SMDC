<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="../index.php">
                <span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../../img/icons/logo-blue.png" alt=""> </span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Reports
                </li>

                <li class="sidebar-item <?= $page == "index.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="../index.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Manage
                </li>

                <li class="sidebar-item <?= $page == "pages-booking-approval.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-booking-approval.php">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking Approval</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $page == "pages-approved.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-approved.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $page == "pages-manage-sellers.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-manage-sellers.php">
                        <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Manage Sellers</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Teams
                </li>

                <li class="sidebar-item <?= $page == "pages-assign-team.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-assign-team.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Assign to Team</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $page == "pages-team.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-team.php">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Teams</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Archives
                </li>

                <li class="sidebar-item <?= $page == "pages-archives.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-archives.php">
                        <i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Archives Booking</span>
                    </a>
                </li>


                <li class="sidebar-header">
                    Settings
                </li>

                <li class="sidebar-item <?= $page == "pages-admin-profile.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-admin-profile.php">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $page == "pages-admin-settings.php" ? 'active' : ''; ?>">
                    <a class="sidebar-link" href="pages-admin-settings.php">
                        <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</body>

</html>