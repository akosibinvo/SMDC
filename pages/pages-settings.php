<?php
include "../php/session.php";
require "../php/connection.php";
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

	<title>Settings | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">

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

													<form action="../admin/include/php/edit-settings.php" method="post" enctype="multipart/form-data" id="editForm" class="needs-validation" novalidate>
														<input type="hidden" name="edit_id" id="edit_id">

														<div class="row">
															<?php
															$sql_profile = "SELECT * FROM users WHERE ID = '$id'";
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
																<button type="submit" name="edit_settings" class="btn btn-primary" id="saveButton">Save</button>
															</div>
														</div>
													</form>


												</div>

												<div class="tab-pane fade" id="manage-password" role="tabpanel">
													<form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
														<input type="hidden" name="update_id" id="update_id">

														<div class="row">

															<div class="col-sm-12 col-md-12 px-4">
																<h5 class="card-title mb-4">Manage Password</h5>
																<div class="row">
																	<div class="form-group mb-3">
																		<label class="form-label">Password</label>
																		<input class="form-control" type="text" name="profile_password" value="">
																	</div>
																</div>

																<div class="row mb-3">
																	<div class="form-group mb-3">
																		<label class="form-label">Confirm Password</label>
																		<input class="form-control" type="text" name="profile_cpassword" value="">
																	</div>
																</div>


															</div>

														</div>



														<div class="modal-footer">
															<div class="mt-3">
																<button type="submit" name="update" class="btn btn-primary">Save</button>
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