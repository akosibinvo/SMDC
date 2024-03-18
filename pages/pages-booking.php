<?php
require "../backend/connection.php";
include "../admin/include/booking.php";
include "../admin/include/imageHandler.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/icons/logo-blue.png" />

    <title>Booking | SMDC JQB</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="../index.php">
                    <span class="d-flex align-middle justify-content-center"> <img class="img-fluid" src="../img/icons/logo-blue.png" alt=""> </span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Reports
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-statistics.php">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistics</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Manage
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-sales.php">
                            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Sales</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="#">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
                        </a>
                    </li>


                    <li class="sidebar-header">
                        Settings
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pages-profile.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

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
                                <span class="text-dark"><?php
                                                        if (isset($_SESSION['user_id'])) {
                                                            $id = $_SESSION['user_id'];
                                                            $sql = "SELECT * FROM users WHERE ID = $id";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                // Output data of each row
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo $row["firstName"];
                                                                }
                                                            }
                                                        } else {
                                                            header("Location: pages/pages-sign-in.php");
                                                        }

                                                        ?></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="../index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../backend/logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3 px-3"><strong class="title-dashboard">Book</strong> Now</h1>

                    <div class="row d-flex justify-content-center">
                        <div class="row">
                            <div class="col-12 col-md-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="container-fluid">
                                            <div class="row justify-content-center align-items-center " style="height: 30px; background-color: #0030FF; border-radius: .3em;">
                                                <div class="col text-center">
                                                    <p class="text-white p-1 text-uppercase font-weight-bold">Buyer Information</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="" method="post" enctype="multipart/form-data" class="px-4">

                                        <div class="row mb-4">
                                            <div class="form-group col-md-4">
                                                <label class="form-label">First Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text background-blue"><i class="align-middle text-white" data-feather="user"></i></span>
                                                    <input class="form-control" type="text" name="firstname" pattern="[A-Za-z\s]+" placeholder="Enter your first name" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Middle Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text background-blue"><i class="align-middle text-white" data-feather="user"></i></span>
                                                    <input class="form-control" type="text" name="middlename" pattern="[A-Za-z\s]+" placeholder="Enter your middle name" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Last Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text background-blue"><i class="align-middle text-white" data-feather="user"></i></i></span>
                                                    <input class="form-control" type="text" name="lastname" pattern="[A-Za-z\s]+" placeholder="Enter your last name" required>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group col-md-3">
                                                <label class="form-label">Suffix</label>
                                                <div class="input-group">
                                                    <span class="input-group-text background-blue"><i class="align-middle text-white" data-feather="user"></i></i></span>
                                                    <input class="form-control" type="text" name="suffix" pattern="[A-Za-z\s]+" placeholder="Enter your suffix" required>
                                                </div>
                                            </div> -->

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Date of Birth</label>
                                                <input class="form-control" type="date" name="birthdate" placeholder="dd/mm/yyy" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Place of Birth</label>
                                                <input class="form-control" type="text" name="birthplace" placeholder="Enter place of birth" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="form-group col-md-3">
                                                <label class="form-label">Tin No: </label>
                                                <input class="form-control" type="text" name="tinNo" placeholder="Enter your TIN number" required>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" id="selectGender" name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Civil Status</label>
                                                <select class="form-select" id="selectCivilStatus" name="civilstatus" required>
                                                    <option value="">Select Civil Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Citizenship</label>
                                                <select class="form-select" id="selectCitizenship" name="citizenship" required>
                                                    <option value="">Select Citizenship</option>
                                                    <option value="Filipino">Filipino</option>
                                                    <option value="Chinese">Chinese</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Phone Number</label>
                                                <input class="form-control" type="text" name="phonenumber" placeholder="Enter your phone number" required>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Passport No:</label>
                                                <input class="form-control" type="text" name="passportnumber" placeholder="Enter your passport number" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Present Address</label>
                                                <textarea class="form-control" id="presentAddress" name="presentAddress" rows="3" required></textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Permanent Address</label>
                                                <textarea class="form-control" id="permanentAddress" name="permanentAddress" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Employer Name</label>
                                                <input class="form-control" type="text" name="employerName" placeholder="Enter your employer name" required>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Work Address</label>
                                                <textarea class="form-control" id="presentAddress" name="workAddress" rows="1" required></textarea>
                                            </div>

                                        </div>








                                        <div class="container-fluid mb-4">
                                            <div class="row justify-content-center align-items-center " style="height: 30px; background-color: #0030FF; border-radius: .3em;">
                                                <div class="col text-center">
                                                    <p class="text-white p-1 text-uppercase font-weight-bold">Unit Information</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Project Name</label>
                                            <div class="col-md-4">
                                                <select class="form-select" id="projectName" name="projectName">
                                                    <option value="">Select Project</option>
                                                    <?php
                                                    $sql_projectName = "SELECT * FROM unit_info";
                                                    $res_projectName = mysqli_query($conn, $sql_projectName);

                                                    if ($res_projectName == TRUE) {
                                                        $count_get = mysqli_num_rows($res_projectName);
                                                        if ($count_get > 0) {
                                                            while ($rows_projectName = mysqli_fetch_assoc($res_projectName)) {
                                                                $projectName = $rows_projectName['Project_name'];
                                                    ?>
                                                                <option value="<?php echo $projectNames; ?>"><?php echo $projectName; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>

                                            <label for="inputPassword" class="col-sm-1 col-form-label">Unit Code</label>
                                            <div class="col-md-4">
                                                <select class="form-select" id="unitCode" name="unitCode">
                                                    <option value="">Select Unit Code</option>
                                                    <?php
                                                    $sql_unitCode = "SELECT * FROM unit_info";
                                                    $res_unitCode = mysqli_query($conn, $sql_projectName);

                                                    if ($res_unitCode == TRUE) {
                                                        $count_get = mysqli_num_rows($res_unitCode);
                                                        if ($count_get > 0) {
                                                            while ($rows_unitCode = mysqli_fetch_assoc($res_unitCode)) {
                                                                $unitCode = $rows_unitCode['Unit_code'];
                                                    ?>
                                                                <option value="<?php echo $unitCode; ?>"><?php echo $unitCode; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>





                                        <div class="container-fluid mb-4">
                                            <div class="row justify-content-center align-items-center " style="height: 30px; background-color: #0030FF; border-radius: .3em;">
                                                <div class="col text-center">
                                                    <p class="text-white p-1 text-uppercase font-weight-bold">The Four(4) Documents</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-6">

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Reservation Agreement</label>
                                                <input class="form-control" type="file" name="RA">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Holding</label>
                                                <input class="form-control" type="file" name="Holding">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Reservation Fee</label>
                                                <input class="form-control" type="file" name="RF">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Valid IDs with Specimen</label>
                                                <input class="form-control" type="file" name="ID">
                                            </div>
                                        </div>

                                        <div class="container mb-4">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" name="book" class="btn btn-primary btn-lg background-blue">Submit</button>
                                                </div>
                                            </div>
                                        </div>



                                    </form>

                                </div>
                            </div>

                        </div>




                    </div>



                </div>
            </main>

        </div>
    </div>

    <script src="../js/app.js"></script>


</body>

</html>