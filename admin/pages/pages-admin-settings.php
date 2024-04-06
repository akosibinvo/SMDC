<?php
include '../../php/session.php';
require "../../php/connection.php";
include '../include/php/modal.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="shortcut icon" href="../img/icons/logo-square.png" />

    <title>Settings | SMDC JQB</title>


    <link href="../../css/app.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
    <script src="https://kit.fontawesome.com/ca3839150d.js" crossorigin="anonymous"></script>

</head>

<style>
    .wrong .fa-check {
        display: none;
    }

    .good .fa-times {
        display: none;
    }
</style>

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
                        <h1 class="h3 d-inline align-middle fw-bold">Settings</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 col-xl-3 mb-3">
                                    <div class="list-group d-flex list-responsive" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-personal-detail" data-bs-toggle="list" href="#personal-detail"> Personal Details </a>
                                        <a class="list-group-item list-group-item-action" id="list-manage-password" data-bs-toggle="list" href="#manage-password"> Manage Password </a>
                                    </div>
                                </div>


                                <div class="col-12 col-xl-9">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="personal-detail" role="tabpanel">

                                                    <form action="../include/php/edit-admin-settings.php" method="post" enctype="multipart/form-data" id="editForm" class="needs-validation" novalidate>
                                                        <input type="hidden" name="edit_id" id="edit_id">

                                                        <div class="row">
                                                            <?php
                                                            $sql_profile = "SELECT * FROM admin_account WHERE admin_id = '$admin_id'";
                                                            $res_profile = mysqli_query($conn, $sql_profile);

                                                            if ($res_profile && mysqli_num_rows($res_profile) > 0) {
                                                                $row = mysqli_fetch_assoc($res_profile);
                                                                $profile_firstname = $row['firstName'];
                                                                $profile_lastname = $row['lastName'];
                                                                $profile_join = $row['dateJoined'];
                                                                $profile_contact = $row['contactNo'];
                                                                $profile_email = $row['email'];
                                                            } else {
                                                                // Handle error or default values
                                                            }
                                                            ?>

                                                            <div class="col-sm-12 col-md-12 px-4">
                                                                <h5 class="card-title mb-4">Personal Details</h5>
                                                                <div class="row mb-3">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label" for="firstname">First Name</label>
                                                                        <input class="form-control" type="text" pattern="[A-Za-z\s]+" name="settings_firstname" value="<?php echo $profile_firstname ?>" id="settings_firstname">
                                                                        <div class="invalid-feedback">
                                                                            Invalid First Name
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label class="form-label">Last Name</label>
                                                                        <input class="form-control" type="text" pattern="[A-Za-z\s]+" name="settings_lastname" value="<?php echo $profile_lastname ?>" id="settings_lastname">
                                                                        <div class="invalid-feedback">
                                                                            Invalid Last Name
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group mb-3">
                                                                        <label class="form-label">Contact No.</label>
                                                                        <input class="form-control" type="text" name="settings_contact" pattern="[0-9]*" value="<?php echo $profile_contact ?>" id="settings_contact">
                                                                        <div class="invalid-feedback">
                                                                            Invalid Contact No.
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="form-group mb-3">
                                                                        <label class="form-label">E-mail</label>
                                                                        <input class="form-control" type="text" name="settings_email" value="<?php echo $profile_email ?>" id="settings_email">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="mt-3">
                                                                <button type="submit" name="edit_admin_settings" class="btn btn-primary" id="saveButton">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>

                                                <div class="tab-pane fade" id="manage-password" role="tabpanel">
                                                    <form action="../../php/changeAdminPassword.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                                                        <div class="row">

                                                            <div class="col-sm-12 col-md-12 px-4">
                                                                <h5 class="card-title mb-4">Manage Password</h5>



                                                                <div class="row mb-4">
                                                                    <div class="form-group mb-3">
                                                                        <label class="form-label">Current Password</label>
                                                                        <div class="input-group has-validation">
                                                                            <input class="form-control border border-end-0" id="oldPasswordAdmin" type="password" name="profile-current-password" required>
                                                                            <button type="button" class="btn border border-start-0" id="toggleOldPassword">
                                                                                <i class="fa-regular fa-eye"></i>
                                                                            </button>
                                                                            <div class="invalid-feedback">
                                                                                Please provide current password
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="form-group">
                                                                        <label class="form-label">New Password</label>
                                                                        <div class="input-group has-validation">
                                                                            <input class="form-control border border-end-0" id="newPasswordAdmin" type="password" name="profile_new_password" required>
                                                                            <button type="button" class="btn border border-start-0" id="toggleNewPassword">
                                                                                <i class="fa-regular fa-eye"></i>
                                                                            </button>
                                                                            <div class="invalid-feedback" id="newPasswordError">
                                                                                Please provide new password
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-6 mt-xxl-0 w-auto h-auto">
                                                                                <div class="alert px-4 py-3 mb-0 bg-dark text-white rounded-4 shadow-lg position-absolute d-none" style="--bs-bg-opacity: .9; z-index: 1000;" role="alert" data-mdb-color="warning" id="new-password-alert">
                                                                                    <ul class="list-unstyled mb-0 text-sm">
                                                                                        <li class="requirements leng">
                                                                                            <i class="fas fa-check text-success me-2"></i>
                                                                                            <i class="fas fa-times text-danger me-3"></i>
                                                                                            Your password must have at least 8 characters
                                                                                        </li>
                                                                                        <li class="requirements big-letter">
                                                                                            <i class="fas fa-check text-success me-2"></i>
                                                                                            <i class="fas fa-times text-danger me-3"></i>
                                                                                            Your password must have at least 1 big letter.
                                                                                        </li>
                                                                                        <li class="requirements num">
                                                                                            <i class="fas fa-check text-success me-2"></i>
                                                                                            <i class="fas fa-times text-danger me-3"></i>
                                                                                            Your password must have at least 1 number.
                                                                                        </li>
                                                                                        <li class="requirements special-char">
                                                                                            <i class="fas fa-check text-success me-2"></i>
                                                                                            <i class="fas fa-times text-danger me-3"></i>
                                                                                            Your password must have at least 1 special character.
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="form-group mb-3">
                                                                        <label class="form-label">Confirm Password</label>
                                                                        <div class="input-group has-validation">
                                                                            <input class="form-control border border-end-0" id="confirmNewPasswordAdmin" type="password" name="profile_cpassword" required>
                                                                            <button type="button" class="btn border border-start-0" id="toggleConfirmNewPassword">
                                                                                <i class="fa-regular fa-eye"></i>
                                                                            </button>
                                                                            <div class="invalid-feedback" id="confirmNewPassError">
                                                                                Please confirm new password
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>



                                                        <div class="modal-footer">
                                                            <div class="mt-3">
                                                                <button id="updateAdminPassword" type="submit" name="updateAdminPassword" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

    <script>
        (() => {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    //	form.classList.add('was-validated');

                    // Update validation classes for all form elements
                    Array.from(form.elements).forEach(element => {
                        if (element.checkValidity()) {
                            element.classList.remove('is-invalid');
                            element.classList.add('is-valid');
                        } else {
                            element.classList.remove('is-valid');
                            element.classList.add('is-invalid');
                        }
                    });
                }, false);

                // Update validation classes as admin types
                Array.from(form.elements).forEach(element => {
                    element.addEventListener('input', () => {
                        if (element.checkValidity()) {
                            element.classList.remove('is-invalid');
                            element.classList.add('is-valid');
                        } else {
                            element.classList.remove('is-valid');
                            element.classList.add('is-invalid');
                        }
                    });
                });
            });
        })();
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

    <script>
        const toggleNewPassword = document.getElementById('toggleNewPassword');
        const newPasswordInput = document.getElementById('newPasswordAdmin');

        toggleNewPassword.addEventListener('click', function() {
            const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            newPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
        });

        const toggleOldPassword = document.getElementById('toggleOldPassword');
        const oldPasswordInput = document.getElementById('oldPasswordAdmin');

        toggleOldPassword.addEventListener('click', function() {
            const type = oldPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            oldPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
        });

        const toggleConfirmNewPassword = document.getElementById('toggleConfirmNewPassword');
        const confirmNewPasswordInput = document.getElementById('confirmNewPasswordAdmin');

        toggleConfirmNewPassword.addEventListener('click', function() {
            const type = confirmNewPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmNewPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
        });
    </script>

    <script>
        addEventListener("DOMContentLoaded", (event) => {
            const password = document.getElementById("newPasswordAdmin");
            const confirmPassword = document.getElementById("confirmNewPasswordAdmin");
            const passwordAlert = document.getElementById("new-password-alert");
            const requirements = document.querySelectorAll(".requirements");
            const leng = document.querySelector(".leng");
            const bigLetter = document.querySelector(".big-letter");
            const num = document.querySelector(".num");
            const specialChar = document.querySelector(".special-char");

            requirements.forEach((element) => element.classList.add("wrong"));

            var errorMessageNewPass = $('#newPasswordError');

            password.addEventListener("focus", () => {
                passwordAlert.classList.remove("d-none");
            });

            password.addEventListener("blur", () => {
                passwordAlert.classList.add("d-none");
            });

            var errorMessageElement = $('#confirmNewPassError');

            password.addEventListener("input", () => {
                const value = password.value;
                const isLengthValid = value.length >= 8;
                const hasUpperCase = /[A-Z]/.test(value);
                const hasNumber = /\d/.test(value);
                const hasSpecialChar = /[!@#$%^&*()\[\]{}\\|;:'",<.>/?`~]/.test(value);

                leng.classList.toggle("good", isLengthValid);
                leng.classList.toggle("wrong", !isLengthValid);
                bigLetter.classList.toggle("good", hasUpperCase);
                bigLetter.classList.toggle("wrong", !hasUpperCase);
                num.classList.toggle("good", hasNumber);
                num.classList.toggle("wrong", !hasNumber);
                specialChar.classList.toggle("good", hasSpecialChar);
                specialChar.classList.toggle("wrong", !hasSpecialChar);

                const isPasswordValid = isLengthValid && hasUpperCase && hasNumber && hasSpecialChar;

                if (isPasswordValid) {
                    password.classList.remove("is-invalid");
                    password.classList.add("is-valid");

                    requirements.forEach((element) => {
                        element.classList.remove("wrong");
                        element.classList.add("good");
                    });

                    passwordAlert.classList.remove("alert-warning");
                    passwordAlert.classList.add("alert-success");

                    $('#updateAdminPassword').prop('disabled', false);

                } else {
                    password.classList.remove("is-valid");
                    password.classList.add("is-invalid");
                    $('#newPasswordError').text('');

                    passwordAlert.classList.add("alert-warning");
                    passwordAlert.classList.remove("alert-success");

                    $('#updateAdminPassword').prop('disabled', true);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#confirmNewPasswordAdmin').on('keyup', function() {
                var password = $('#newPasswordAdmin').val();
                var confirmPassword = $(this).val();
                var errorMessageElement = $('#confirmNewPassError');

                if (password.length == 0) {
                    $('#confirmNewPasswordAdmin').addClass('is-invalid').removeClass('is-valid');
                    errorMessageElement.text('Please provide new password first');
                } else {
                    if (confirmPassword.length > 0) {
                        if (password === confirmPassword) {
                            $('#confirmNewPasswordAdmin').removeClass('is-invalid').addClass('is-valid');
                            errorMessageElement.text('');
                            $('#updateAdminPassword').prop('disabled', false);
                        } else {
                            $('#confirmNewPasswordAdmin').removeClass('is-valid').addClass('is-invalid');
                            errorMessageElement.text('Passwords do not match');
                            $('#updateAdminPassword').prop('disabled', true);
                        }
                    } else {
                        errorMessageElement.text('Please confirm new password');
                    }
                }

            });
        });
    </script>

    <!-- <script>
		$(document).ready(function() {
			// Get the active tab from local storage if available
			var activeTab = localStorage.getItem('activeTab');
			if (activeTab) {
				$('#list-tab a[href="' + activeTab + '"]').tab('show');
				
			}

			// Store the active tab in local storage when a new tab is shown
			$('#list-tab a').on('shown.bs.tab', function(e) {
				var tab = $(e.target).attr('href');
				localStorage.setItem('activeTab', tab);
			});
		});
	</script> -->

    <script>
        $(document).ready(function() {
            // Get initial values
            var initialValues = {
                settings_firstname: $('#settings_firstname').val(),
                settings_lastname: $('#settings_lastname').val(),
                settings_contact: $('#settings_contact').val(),
                settings_email: $('#settings_email').val(),
            };

            // Function to check if there are changes
            function checkChanges() {
                var currentValues = {
                    settings_firstname: $('#settings_firstname').val(),
                    settings_lastname: $('#settings_lastname').val(),
                    settings_contact: $('#settings_contact').val(),
                    settings_email: $('#settings_email').val(),
                };

                return JSON.stringify(initialValues) === JSON.stringify(currentValues);
            }

            // Disable the button if there are no changes
            $('#editForm input').on('input', function() {
                if (checkChanges()) {
                    $('#saveButton').prop('disabled', true);
                } else {
                    $('#saveButton').prop('disabled', false);
                }
            });

            // Initially disable the button if there are no changes
            if (checkChanges()) {
                $('#saveButton').prop('disabled', true);
            }
        });
    </script>



</body>

</html>