<?php
include "../php/session.php";
require "../php/connection.php";
include "../admin/include/php/client_info.php";
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

    <title>Booking | SMDC JQB</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
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

                    <h1 class="h3 mb-3 px-3"><strong class="title-dashboard">Book</strong> Now</h1>

                    <div class="row d-flex justify-content-center">
                        <div class="row">
                            <div class="col-12 col-md-12 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header mb-4">
                                        <h5 class="card-title text-center mb-0 text-uppercase text-white">Buyer Information</h5>
                                    </div>

                                    <form action="../admin/include/php/transaction.php" method="post" enctype="multipart/form-data" class="px-4 needs-validation" novalidate>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-4">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" name="firstname" pattern="[A-Za-z\s]+" placeholder="Enter your first name" required>
                                                <div class="invalid-feedback">
                                                    Please enter First Name.
                                                </div>

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Middle Name</label>
                                                <input class="form-control" type="text" name="middlename" pattern="[A-Za-z\s]+" placeholder="Enter your middle name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Middle Name.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" name="lastname" pattern="[A-Za-z\s]+" placeholder="Enter your last name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Last Name.
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
                                                <div class="invalid-feedback">
                                                    Please select Date of Birth.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Place of Birth</label>
                                                <input class="form-control" type="text" name="birthplace" placeholder="Enter place of birth" required>
                                                <div class="invalid-feedback">
                                                    Please enter Place of Birth.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="form-group col-md-3">
                                                <label class="form-label">TIN No: </label>
                                                <input class="form-control" type="text" name="tinNo" placeholder="Enter your TIN number" required>
                                                <div class="invalid-feedback">
                                                    Please enter TIN Number.
                                                </div>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select" id="selectGender" name="gender" required>
                                                    <option selected disabled value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Gender.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Civil Status</label>
                                                <select class="form-select" id="selectCivilStatus" name="civilstatus" required>
                                                    <option selected disabled value="">Select Civil Status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Separated">Separated</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Civil Status.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Citizenship</label>
                                                <select class="form-select" id="selectCitizenship" name="citizenship" required>
                                                    <option selected disabled value="">Select Citizenship</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select Citizenship.
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-4">
                                                <label class="form-label">E-mail</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter your e-mail" required>
                                                <div class="invalid-feedback">
                                                    Please enter valid E-mail.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Phone Number</label>
                                                <input class="form-control" type="text" name="phonenumber" placeholder="Enter your phone number" required>
                                                <div class="invalid-feedback">
                                                    Please enter Phone Number.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="form-label">Passport No:</label>
                                                <input class="form-control" type="text" name="passportnumber" placeholder="Enter your passport number" required>
                                                <div class="invalid-feedback">
                                                    Please enter Passport Number.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Present Address</label>
                                                <textarea class="form-control" id="presentAddress" name="presentAddress" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter Present Address.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Permanent Address</label>
                                                <textarea class="form-control" id="permanentAddress" name="permanentAddress" rows="3" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter Permanent Address.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Employer Name</label>
                                                <input class="form-control" type="text" name="employerName" pattern="[A-Za-z\s]+" placeholder="Enter your employer name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Employer Name.
                                                </div>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Work Address</label>
                                                <textarea class="form-control" id="presentAddress" name="workAddress" rows="1" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter Work Address.
                                                </div>
                                            </div>

                                        </div>








                                        <div class="container-fluid mb-4">
                                            <div class="row justify-content-center align-items-center " style="height:35px; background-color: #2f6cff; border-radius: .3em;">
                                                <div class="col">
                                                    <p class="card-title text-center mb-0 text-uppercase text-white">Unit Information</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-5">

                                            <label for="inputPassword" class="col-sm-2 col-form-label">Project Name</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="projectName" placeholder="Enter project name" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid Project Name.
                                                </div>
                                            </div>

                                            <label for="inputPassword" class="col-sm-2 col-form-label">Unit Code</label>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" name="unitCode" placeholder="Enter unit code" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid Unit Code.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container-fluid mb-4">
                                            <div class="row justify-content-center align-items-center " style="height:35px; background-color: #2f6cff; border-radius: .3em;">
                                                <div class="col">
                                                    <p class="card-title text-center mb-0 text-uppercase text-white">The Four(4) Documents</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-6">

                                            <div class="form-group col-md-3">
                                                <label for="fileInput" class="form-label">Reservation Agreement</label>
                                                <input class="form-control" type="file" name="RA" id="fileInput" accept=".png, .jpg, .jpeg" required>
                                                <div class="invalid-feedback">
                                                    Please select a file.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Holding</label>
                                                <input class="form-control" type="file" name="Holding" accept=".png, .jpg, .jpeg" required>
                                                <div class="invalid-feedback">
                                                    Please select a file.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Reservation Fee</label>
                                                <input class="form-control" type="file" name="RF" accept=".png, .jpg, .jpeg" required>
                                                <div class="invalid-feedback">
                                                    Please select a file.
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label class="form-label">Valid IDs with Specimen</label>
                                                <input class="form-control" type="file" name="ID" accept=".png, .jpg, .jpeg" required>
                                                <div class="invalid-feedback">
                                                    Please select a file.
                                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script>
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {

                const countryNames = data.map(country => country.name.common);

                countryNames.sort();

                const selectCitizenship = document.getElementById('selectCitizenship');

                countryNames.forEach(countryName => {
                    const option = document.createElement('option');
                    option.value = countryName;
                    option.textContent = countryName;
                    selectCitizenship.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching country data:', error);
            });
    </script>

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

</body>

</html>