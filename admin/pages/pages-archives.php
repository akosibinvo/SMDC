<?php
session_start();

include '../../php/connection.php';
include '../include/php/modal.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Archives | SMDC JQB</title>


    <link href="../../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

    <style>
        .popUp {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;

        }

        /* Pop-up Content */
        .popUp-contents {
            width: 1200px;
            height: 600px;
            z-index: 10000;

        }

        .closeBtn {
            position: absolute;
            top: 20px;
            right: 50px;
            font-size: 30px;
            cursor: pointer;
            color: white;
            border-radius: 50%;
            padding: 0;
            z-index: 10001;
        }

        .closeBtn:hover {
            color: red;
        }
    </style>


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

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">User</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../php/logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong class="title-dashboard">Booking</strong> Archives</h1>

                    <div class="container mb-4">
                        <div class="row">
                            <div class="col text-end">
                                <button class="btn btn-danger clearAll"><i class="align-middle me-1" data-feather="trash-2"></i>Empty Archives</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title text-white mb-0">Archives List</h5>
                                </div>
                                <table class="table table-hover my-0">
                                    <thead>

                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Unit Code</th>
                                            <th>Amount</th>
                                            <th>RA</th>
                                            <th>Holding</th>
                                            <th>RF</th>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Agent</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Pagination configuration


                                        $results_per_page = 5;
                                        $sql_restore = "SELECT * FROM archives_booking WHERE status = 'Removed' ";
                                        $res_restore = mysqli_query($conn, $sql_restore);

                                        if ($res_restore == TRUE) {
                                            $total_results = mysqli_num_rows($res_restore);
                                            $total_pages = ceil($total_results / $results_per_page);

                                            // Check current page and set offset
                                            if (!isset($_GET['page'])) {
                                                $page = 1;
                                            } else {
                                                $page = $_GET['page'];
                                            }
                                            $offset = ($page - 1) * $results_per_page;

                                            // Fetch data for the current page
                                            $sql_restore .= " LIMIT $offset, $results_per_page";
                                            $res_restore = mysqli_query($conn, $sql_restore);

                                            if ($res_restore && mysqli_num_rows($res_restore) > 0) {
                                        ?>
                                                <?php while ($rows_restore = mysqli_fetch_assoc($res_restore)) { ?>

                                                    <tr class="text-center">
                                                        <td class="d-none"><?php echo $rows_restore['transaction_id']; ?></td>
                                                        <td><?php echo $rows_restore['firstname']; ?></td>
                                                        <td><?php echo $rows_restore['Unit_code']; ?></td>
                                                        <td><?php echo '₱' . ' ' . number_format($rows_restore['Amount'], 0, '.', ','); ?></td>
                                                        <td class="text-center"> <img src="../../img/documents/<?php echo $rows_restore['RA']; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $rows_restore['RA']; ?>')"></td>
                                                        <td class="text-center"> <img src="../../img/documents/<?php echo $rows_restore['Holding']; ?>" alt="Holding Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $rows_restore['Holding']; ?>')"></td>
                                                        <td class="text-center"> <img src="../../img/documents/<?php echo $rows_restore['RF']; ?>" alt="RF Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $rows_restore['RF']; ?>')"></td>
                                                        <td class="text-center"> <img src="../../img/documents/<?php echo $rows_restore['ID']; ?>" alt="ID Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $rows_restore['ID']; ?>')"></td>
                                                        <td><?php echo $rows_restore['Transaction_date']; ?></td>
                                                        <td><?php echo $rows_restore['agent']; ?></td>
                                                        <td><?php echo $rows_restore['status']; ?></td>

                                                        <td>
                                                            <button class="btn btn-primary restorebtn">Restore</button>
                                                            <button class="btn btn-danger deletebtn">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                    </tbody>
                            <?php
                                            } else {
                                                echo "<tr class='text-center'>";
                                                echo "<td colspan='12' style='cursor: default'>There is nothing on archives table.</td>";
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

    <!-- Pop-up to display the expanded image -->
    <div id="imageModal" class="popUp" style="display: none;">
        <span class="closeBtn" onclick="closeModal()">&times;</span>
        <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <img class="popUp-contents" id="expandedImage">
        </div>
    </div>

    <script>
        function enlargeImg(imgSrc) {
            var modal = document.getElementById('imageModal');
            var modalImg = document.getElementById('expandedImage');
            modal.style.display = 'block';
            modalImg.src = imgSrc;
        }

        document.getElementsByClassName('closeBtn')[0].onclick = function() {
            document.getElementById('imageModal').style.display = 'none';
        };
    </script>



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

            $('.deletebtn').on('click', function() {

                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('.restorebtn').on('click', function() {

                $('#restoreModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#restore_id').val(data[0]);
                $('#firstname').val(data[1]);
                $('#unitcode').val(data[2]);
                $('#amount').val(data[3]);
                $('#RA').val(data[4]);
                $('#Holding').val(data[5]);
                $('#RF').val(data[6]);
                $('#ID').val(data[7]);
                $('#Transaction_date').val(data[8]);
                $('#agent').val(data[9]);
                $('#status').val(data[10]);


            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.clearAll').on('click', function() {
                $('#clearArchivesModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#clear_all_id').val(notificationId);
            });
        });
    </script>





</body>

</html>