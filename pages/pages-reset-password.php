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

	<title>Reset Password | SDMC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<!-- <link href="css/style.css" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- CSS Simple Notify -->
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
                                <div class="row d-flex justify-content-center mb-3">
									<div class="col-8">
										<img src="../img/icons/logo.png" alt="logo" class="img-fluid">
									</div>
								</div>
							</div>
							<div class="card-body">
                                <div class="text-center mb-2">
									<p class="fs-2 fw-bold mb-0">
										Password Reset
									</p>
                                    <div class="d-flex justify-content-center">
                                        <p class="fs-6 lead col-8">
                                            Enter your new password then confirm it.
                                        </p>
                                    </div>
								</div>
								<div class="pb-2 px-3">
									<form action="../php/resetPassword.php" method="post" class="needs-validation" novalidate>
										<div class="mt-3">
											<label class="form-label">New Password</label>
											<input class="form-control form-control-lg" type="password" name="new-pass" placeholder="Enter your new password" required>
											<div id="validationNewPass" class="invalid-feedback">
												Please enter your new password.
											</div>
										</div>

                                        <div class="my-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="confirm-new-pass" placeholder="Confirm your new password" required>
											<div id="validationConfirmNewPass" class="invalid-feedback">
												Please confirm your new password.
											</div>
										</div>

										<div class="mb-3">
											<button type="submit" name="reset-password" class="btn btn-lg btn-primary w-100">Save Password</button>
										</div>

                                        <div class="row d-flex justify-content-start mt-4">
                                            <div class="col-auto d-flex justify-content-start">
                                                <p class="me-1">Back to</p>
                                                <a class="text-decoration-none" style="color: #0030ff;" href="pages-sign-in.php">
                                                    Sign in
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

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>