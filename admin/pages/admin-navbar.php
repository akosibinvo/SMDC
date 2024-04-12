<?php

$sql_profile = "SELECT img FROM admin_account WHERE admin_id = '$admin_id'";
$res_profile = mysqli_query($conn, $sql_profile);

if ($res_profile && mysqli_num_rows($res_profile) > 0) {
    $row = mysqli_fetch_assoc($res_profile);
    $profile_img_path = $row['img'];

    // Check if profile image path is not empty
    if (!empty($profile_img_path)) {
        // Concatenate the filename to the path
        $profile_img_path = "../../img/avatars/admin/" . $profile_img_path;
    } else {
        // Set default profile image path
        $profile_img_path = "../../img/avatars/default/default-profile-blue.png"; // Adjust the path to include the 'avatars' folder
    }
} else {
    // Handle case when no image is found
    $profile_img_path = "../../img/avatars/default/default-profile-blue.png"; // Set default profile image path
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <li class="nav-item dropdown">

        <img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle d-none d-sm-inline-block" width="25" height="25" />
        <a class="nav-link dropdown-toggle d-sm-inline-block me-2" href="#" data-bs-toggle="dropdown">

            <span class="text-dark">

                <?php
                echo $admin_fullname;
                ?>

            </span>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="pages-admin-profile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-admin-settings.php"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#adminNavlogoutModal">Log out</a>

        </div>
    </li>



</body>

</html>