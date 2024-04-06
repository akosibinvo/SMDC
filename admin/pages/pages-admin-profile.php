<?php
include "../../php/session.php";
require "../../php/connection.php";
include "../../admin/include/php/modal.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/icons/logo-square.png" />


    <title>Profile | SMDC JQB</title>

    <link href="../../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

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

                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle fw-bold">Profile</h1>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="card-title mb-0 text-white">Profile Details</h5>
                                    <!-- <h5 class="mb-0" title="Edit Profile Details"><span data-feather="edit-3" class="feather-sm" style="color: #fff; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editProfileDetails"></span></h5> -->
                                </div>
                                <div class="card-body text-center">

                                    <div class="profile-pic-img">
                                        <img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle" width="160" height="160" />

                                        <div class="camera-input-hide">
                                            <label class="camera-icon-hide" style="cursor: pointer;" title="Add Photo" data-bs-toggle="modal" data-bs-target="#editAdminProfileDetails">
                                                <i class="align-middle" data-feather="camera"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <h1 class="h5 fw-bold mt-4 mb-2"><?php echo $admin_fullname; ?></h1>
                                    <h1 class="h5 text-muted fw-bold mb-0"><?php echo $admin_role; ?></h1>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header bg-white d-flex justify-content-between mb-0">
                                    <h5 class="card-title mb-0">Account Details</h5>
                                    <h5 class="mb-0" title="Edit Account Details"><span data-feather="edit-3" class="feather-sm" style="color: #0030ff; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#"></span></h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">

                                        <li class="mb-2">
                                            <div class="row gx-2 mb-3">
                                                <div class="col">
                                                    <span class="fw-bold">First Name</span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $admin_firstname; ?></span>
                                                </div>
                                            </div>

                                            <div class="row gx-2 mb-3">
                                                <div class="col">
                                                    <span class="fw-bold">Last Name</span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $admin_lastname; ?></span>
                                                </div>
                                            </div>

                                            <div class="row gx-2 mb-3">
                                                <div class="col">
                                                    <span class="fw-bold">Contact No.</span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $admin_contact; ?></span>
                                                </div>
                                            </div>

                                            <div class="row gx-2 mb-3">
                                                <div class="col">
                                                    <span class="fw-bold">Joined</span>
                                                </div>
                                                <div class="col">
                                                    <span><?php echo $formatted_date; ?></span>
                                                </div>
                                            </div>

                                        </li>

                                    </ul>


                                </div>

                            </div>
                        </div>

                        <div class="col-md-8 col-xl-8">
                            <div class="card mb-3">
                                <div class="card-header bg-white">
                                    <h5 class="card-title mb-1">Account Status</h5>
                                </div>
                                <div class="card-body mb-0">
                                    <div class="row">

                                        <div class="col-md-6 col-lg-6 mx-auto">
                                            <div class="card unit-bg">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col mt-0">
                                                            <h5 class="card-title text-white" style="font-size: .9em;">Overall Sales</h5>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $sql_overall_sales = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked'";
                                                    $res_overall_sales = mysqli_query($conn, $sql_overall_sales);

                                                    if ($res_overall_sales) {
                                                        $row = mysqli_fetch_assoc($res_overall_sales);
                                                        $overall_amount = $row['total_amount'];
                                                    }

                                                    ?>

                                                    <h1 class="mt-0 mb-3 text-center text-white fw-bold">₱ <?php echo number_format($overall_amount) ?> </h1>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mx-auto">
                                            <div class="card">
                                                <div class="card-body status-bg">
                                                    <div class="row">
                                                        <div class="col mt-0">
                                                            <h5 class="card-title text-white" style="font-size: .9em;">Total Unit Sold</h5>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $sql_booked = "SELECT * FROM transaction_booking WHERE status = 'Booked' ";
                                                    $res_booked = mysqli_query($conn, $sql_booked);
                                                    $count_booked = mysqli_num_rows($res_booked);
                                                    ?>

                                                    <h1 class="mb-3 text-center text-white fw-bold"> <?php echo $count_booked ?> </h1>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-12 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-header">

                                            <h5 class="card-title mb-0 text-white">Transaction History</h5>
                                        </div>
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Name</th>
                                                    <th>Unit Code</th>
                                                    <th>Amount</th>
                                                    <th>Commission</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <?php
                                            $results_per_page = 5;
                                            $sql_profile = "SELECT * FROM transaction_booking WHERE status = 'Booked'";
                                            $res_profile = mysqli_query($conn, $sql_profile);

                                            if ($res_profile == TRUE) {
                                                $total_results = mysqli_num_rows($res_profile);
                                                $total_pages = ceil($total_results / $results_per_page);
                                                // Check current page and set offset
                                                if (!isset($_GET['page'])) {
                                                    $page = 1;
                                                } else {
                                                    $page = $_GET['page'];
                                                }
                                                $offset = ($page - 1) * $results_per_page;

                                                // Fetch data for the current page
                                                $sql_profile .= " LIMIT $offset, $results_per_page";
                                                $res_profile = mysqli_query($conn, $sql_profile);

                                                if ($res_profile && mysqli_num_rows($res_profile) > 0) {
                                            ?>

                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($res_profile)) {
                                                    ?>
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td> <?php echo $row['firstname']; ?> </td>
                                                                <td> <?php echo $row['Unit_code']; ?> </td>
                                                                <td><?php echo '₱' . ' ' . number_format($row['Amount'], 0, '.', ','); ?></td>
                                                                <td><?php echo '₱' . ' ' . number_format($row['Commissions'], 0, '.', ','); ?></td>
                                                                <td><?php echo $row['Transaction_date']; ?></td>
                                                                <td class="text-success fw-bold"><?php echo $row['status']; ?></td>
                                                            </tr>
                                                        <?php
                                                    }
                                                        ?>

                                                <?php
                                                } else {
                                                    echo "<tr class='text-center'>";
                                                    echo "<td colspan='12' style='cursor: default'>You have no transactions yet. Start booking now!</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                                ?>
                                                        </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                            <div class="row mt-n3 mb-3">
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
                    </div>


                </div>
            </main>

        </div>
    </div>


    <script src="../../js/app.js"></script>
    <script>
        $(document).ready(function() {

            $('.editProfile').on('click', function() {

                $('#editProfileModal').modal('show');

                var $cardBody = $(this).closest('.card-body');

                var profileName = $cardBody.find('.card-title').text().trim();

                console.log(data);

                $('#firstname').val(data(profileName));

            });

        });
    </script>


    <script>
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


</body>

</html>