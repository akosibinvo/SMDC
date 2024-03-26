<?php
	require "../php/connection.php";
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo-square.png" />

	<title>Sign Up | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<!-- <link href="../css/style.css" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- Notify Js -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
	<!-- Font Awesome Icons -->
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
	<main class="d-flex w-100" style="background: linear-gradient(rgba(0, 48, 255, .15), rgba(0, 48, 255, .15)), url(&quot;../img/bg/bg.jpg&quot;);
		background-size: cover;
		background-position: center;">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-8 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
							<div class="card-header py-0" style="background-color: #0030FF;">
								<div class="row">
									<div class="col-4">
										<img src="../img/icons/logo.png" alt="logo" class="img-fluid">
									</div>
									<div class="col-8 text-white d-flex align-items-center">
										<div class="row">
											<h1 class="h2 text-white mb-0">Create New Account</h1>
											<p class="lead fs-6 mb-0">
												Lets get started by registering your informations.
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="m-sm-3 px-xl-3">
									<form action="../php/signup.php" method="post" class="needs-validation" novalidate>
										<div class="row g-4 my-3">
											<div class="col-xl-6">
												<label class="form-label">First Name</label>
												<input type="text" class="form-control form-control-lg" name="firstname" placeholder="Enter your First name" aria-label="First name" required>
												<div id="validationFirstName" class="invalid-feedback">
													Please provide First Name.
												</div>
											</div>
											<div class="col-xl-6">
												<label class="form-label">Last Name</label>
												<input type="text" class="form-control form-control-lg" name="lastname" placeholder="Enter your Last name" aria-label="Last name" required>
												<div id="validationLastName" class="invalid-feedback">
													Please provide Last Name.
												</div>
											</div>
										</div>

										<div class="row g-4 mb-3">
											<div class="col-xl-6">
												<label class="form-label">Email</label>
												<input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your Email Address" aria-label="email" required>
												<div id="validationEmail" class="invalid-feedback">
													Please provide E-mail Address.
												</div>
											</div>
											<div class="col-xl-6">
												<label class="form-label">Contact No.</label>
												<input type="tel" class="form-control form-control-lg" name="contact-number" placeholder="Enter your Contact Number" aria-label="Contact Number" required>
												<div id="validationFContact" class="invalid-feedback">
													Please provide Contact Number.
												</div>
											</div>
										</div>

										<div class="row g-4 mb-3 d-relative">
											<div class="col-xl-6">
												<label class="form-label">Password</label>
												<div class="input-group has-validation">
													<input id="passwordUser" type="password" class="form-control form-control-lg" name="password" placeholder="Enter your Password" aria-label="password" required>
													<button type="button" class="btn btn-primary" id="togglePassword">
														<i class="fa-regular fa-eye"></i>
													</button>
													<div id="validationPass" class="invalid-feedback">
														Please provide Password.
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<label class="form-label">Confirm Password</label>
												<div class="input-group has-validation">
													<input id="confirmPasswordUser" type="password" class="form-control form-control-lg" name="confirm-password" placeholder="Confirm Password" aria-label="Confirm Password" required>
													<button type="button" class="btn btn-primary" id="toggleConfirmPassword">
														<i class="fa-regular fa-eye"></i>
													</button>
													<div id="validationCPass" class="invalid-feedback">
														Please confirm your Password.
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-6 mt-xxl-0 w-auto h-auto">
												<div
													class="alert px-4 py-3 mb-0 bg-dark text-white rounded-4 shadow-lg position-absolute d-none"
													style="--bs-bg-opacity: .9;"
													role="alert"
													data-mdb-color="warning"
													id="password-alert"
												>
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

										<div class="row d-flex justify-content-between px-3">
											<div class="form-check col-xl-12 col-sm-12 col-md-12">
												<input id="invalidCheck" type="checkbox" class="form-check-input" value="" name="terms-and-condition" required checked>
												<label class="form-check-label text-small" for="invalidCheck">Creating an account means you agree you agree with our<a href="" class="ms-1"> Terms and Condition</a></label>
											</div>
										</div>

										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Register</button>
										</div>

										<div class="row d-flex justify-content-start mt-4">
											<div class="col-auto d-flex justify-content-start">
												<p class="me-2">Already have account?</p>
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
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
		// Example starter JavaScript for disabling form submissions if there are invalid fields
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
	<script>
		addEventListener("DOMContentLoaded", (event) => {
			const password = document.getElementById("passwordUser");
			const confirmPassword = document.getElementById("confirmPasswordUser");
			const passwordAlert = document.getElementById("password-alert");
			const requirements = document.querySelectorAll(".requirements");
			const leng = document.querySelector(".leng");
			const bigLetter = document.querySelector(".big-letter");
			const num = document.querySelector(".num");
			const specialChar = document.querySelector(".special-char");

			requirements.forEach((element) => element.classList.add("wrong"));

			password.addEventListener("focus", () => {
				passwordAlert.classList.remove("d-none");
				if (!password.classList.contains("is-valid")) {
					password.classList.add("is-invalid");
				}
			});

			var errorMessageElement = $('#validationCPass');

			confirmPassword.addEventListener("focus", () => {
				if (!password.classList.contains("is-valid")) {
					confirmPassword.classList.add("is-invalid");
					errorMessageElement.text('Please provide a valid password first');
				}
			});

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
				} else {
					password.classList.remove("is-valid");
					password.classList.add("is-invalid");

					passwordAlert.classList.add("alert-warning");
					passwordAlert.classList.remove("alert-success");
				}
			});

			password.addEventListener("blur", () => {
				passwordAlert.classList.add("d-none");
			});
		});
	</script>
	<script>
		$(document).ready(function(){

			$('#confirmPasswordUser').on('keyup', function () {
				var password = $('#passwordUser').val();
				var confirmPassword = $(this).val();
				var errorMessageElement = $('#validationCPass');
				
				if (password === confirmPassword) {
					$('#confirmPasswordUser').removeClass('is-invalid').addClass('is-valid');
					errorMessageElement.text('');
				} else {
					$('#confirmPasswordUser').removeClass('is-valid').addClass('is-invalid');
					errorMessageElement.text('Passwords do not match');
				}
			});
		});
	</script>
	<script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordUser');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
        });

		const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('confirmPasswordUser');

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fa-regular fa-eye"></i>' : '<i class="fa-regular fa-eye-slash"></i>';
        });
    </script>

</body>

</html>