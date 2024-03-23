<?php
    session_start();
    include "../php/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo-square.png" />

    <title>Sign In | SDMC JQB</title>

    <link href="../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

</head>

<body>
    <main class="d-flex w-100" style="background: linear-gradient(rgba(0, 48, 255, .15), rgba(0, 48, 255, .15)), url(&quot;../img/bg/bg.jpg&quot;);
	background-size: cover;
	background-position: center;">

        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-header pb-0" style="background-color: #0030FF;">
                                <div class="text-center">
                                    <p class="lead fw-bold text-white">
                                        Sign in to your account to continue
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-8">
                                        <img src="../img/icons/logo-blue.png" alt="logo" class="img-fluid">
                                    </div>
                                </div>
                                <div class="m-sm-3">
                                    <form id="loginForm" action="../php/login.php" method="post" class="needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input id="emailUser" class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required>
											<div id="validationLastName" class="invalid-feedback">
													Enter your email
											</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input id="passwordUser" class="form-control form-control-lg <?php echo isset($errors) ? 'is-invalid' : ''; ?>" type="password" name="password" placeholder="Enter your password" required>
											<div id="validationLastName" class="invalid-feedback">
													Enter your password
											</div>
                                            <?php if (isset($errors)) : ?>
                                                <div class="invalid-feedback">
                                                    <?php echo $errors[0]; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="row d-flex justify-content-between px-3">
                                            <div class="form-check col-auto">
                                                <input id="rememberMe" type="checkbox" class="form-check-input" value="remember-me" name="remember-me">
                                                <label class="form-check-label text-small" for="rememberMe">Remember me</label>
                                            </div>
                                            <div class="col-auto">
                                                <a href="pages-forgot-password.php" class="text-decoration-none" style="color: #2f6cff;">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row mt-3 mx-1">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                        </div>

                                        <div class="row d-flex justify-content-start mt-4">
                                            <div class="col-auto d-flex justify-content-start">
                                                <p class="me-2">Dont have account?</p>
                                                <a class="text-decoration-none" style="color: #0030ff;" href="pages-sign-up.php">
                                                    Register Now
                                                </a>
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
    </main>
    

    <script src="../js/app.js"></script>
    <!-- Simple Notify -->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

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
        (() => {
            'use strict'

            // Fetch the form element
            const form = document.getElementById("loginForm");

            // Add event listener to the form for form submission
            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent form submission

                // Get username and password values
                const username = document.getElementById("emailUser").value;
                //const password = document.getElementById("passwordUser").value;

                // If "Remember Me" checkbox is checked, set a cookie with the username
                if (document.getElementById("rememberMe").checked) {
                    setCookie("rememberedUsername", username, 30); // Cookie expires in 30 days
                } else {
                    // If "Remember Me" checkbox is not checked, delete the cookie
                    document.cookie = "rememberedUsername=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }

                // Perform form validation
                Array.from(form.elements).forEach(input => {
                    // Skip the "Remember Me" checkbox
                    if (input.type === 'checkbox' && input.id === 'rememberMe') {
                        return;
                    }

                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid')
                        input.classList.remove('is-valid')
                    } else {
                        input.classList.remove('is-invalid')
                        input.classList.add('is-valid')
                    }
                });

                // Check if the form is valid
                if (form.checkValidity()) {
                    // Optionally, you can submit the form here if needed
                    form.submit();
                }
            }, false);

            // Function to set a cookie
            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }

            // Function to get a cookie
            function getCookie(name) {
                var nameEQ = name + "=";
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    while (cookie.charAt(0) == ' ') {
                        cookie = cookie.substring(1, cookie.length);
                    }
                    if (cookie.indexOf(nameEQ) == 0) {
                        return cookie.substring(nameEQ.length, cookie.length);
                    }
                }
                return null;
            }

            // Function to check if the "Remember Me" cookie exists and set the username field accordingly
            function checkRememberMe() {
                var username = getCookie("rememberedUsername");
                if (username) {
                    document.getElementById("emailUser").value = username;
                    document.getElementById("rememberMe").checked = true;
                }
            }

            // Call checkRememberMe function on page load
            checkRememberMe();
        })();
    </script>

    
</body>

</html>