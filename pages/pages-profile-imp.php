<?php
include "../php/session.php";
require "../php/connection.php";
include "../admin/include/php/modal.php";

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$url = "https://";
else
	$url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= "/SMDC_JQB/pages/pages-sign-up.php?ref=";

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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
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
											<label class="camera-icon-hide" style="cursor: pointer;" title="Add Photo" data-bs-toggle="modal" data-bs-target="#editProfileDetails">
												<i class="align-middle" data-feather="camera"></i>
											</label>
										</div>
									</div>

									<h1 class="h5 fw-bold mt-4 mb-2"><?php echo $fullname; ?></h1>
									<h1 class="h5 text-muted fw-bold mb-0"><?php echo $agent_role; ?></h1>
								</div>

							</div>

							<div class="card mb-3">
								<div class="card-header bg-white d-flex justify-content-between mb-0">
									<h5 class="card-title mb-0">Account Details</h5>
									<h5 class="mb-0" title="Edit Account Details"><span data-feather="edit-3" class="feather-sm" style="color: #0030ff; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editAccountDetails"></span></h5>
								</div>
								<div class="card-body">
									<ul class="list-unstyled mb-0">

										<li class="mb-2">
											<div class="row gx-2 mb-3">
												<div class="col">
													<span class="fw-bold">First Name</span>
												</div>
												<div class="col">
													<span><?php echo $firstname; ?></span>
												</div>
											</div>

											<div class="row gx-2 mb-3">
												<div class="col">
													<span class="fw-bold">Last Name</span>
												</div>
												<div class="col">
													<span><?php echo $lastname; ?></span>
												</div>
											</div>

											<div class="row gx-2 mb-3">
												<div class="col">
													<span class="fw-bold">Contact No.</span>
												</div>
												<div class="col">
													<span><?php echo $contact; ?></span>
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
									<h5 class="card-title mb-0">Acount Status</h5>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body unit-bg">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title text-white" style="font-size: .9em;">Override Commissions</h5>
														</div>
													</div>

													<?php

													$sql_overcoms = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND agent_role != 'IMP' AND team_id = '$id'";
													$res_overcoms = mysqli_query($conn, $sql_overcoms);

													if ($res_overcoms) {
														// Initialize total commission variable
														$total_overcoms_coms = 0;

														while ($rows_overcoms = mysqli_fetch_assoc($res_overcoms)) {
															$overcoms_role = $rows_overcoms['agent_role'];
															$overcoms_amount = $rows_overcoms['Amount'];
															$overcoms_date = $rows_overcoms['Transaction_date'];

															// Define commission rates
															$overcoms_rates = [
																'SA1' => 0.015,
																'SA2' => 0.01
															];

															if (array_key_exists($overcoms_role, $overcoms_rates)) {
																$overcoms_rate = $overcoms_rates[$overcoms_role];
															} else {
																exit("Error: Commission rate for role '$overcoms_role' is not defined");
															}

															// Calculate individual commission
															$overcoms_vat = 0.12;

															$overcoms_coms = $overcoms_amount * $overcoms_rate;
															$deducted_overcoms =  $overcoms_coms * $overcoms_vat;

															$accumulated_overcoms = $overcoms_coms - $deducted_overcoms;


															// Accumulate individual commission to total commission
															$total_overcoms_coms += $accumulated_overcoms;
														}
													} else {
														// Handle query error
														echo "Error in fetching data from database.";
													}

													?>

													<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;">₱ <?php echo number_format($total_overcoms_coms) ?></h1>
												</div>
											</div>
										</div>


										<div class="col-md-6 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body status-bg">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title text-white" style="font-size: .9em;">Status</h5>
														</div>
													</div>
													<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;"> <?php echo $agent_role; ?> </h1>
												</div>
											</div>
										</div>


									</div>

								</div>
							</div>

							<div class="col-md-12 col-xl-12">
								<div class="card" style="position: relative;">
									<div class="card-body">
										<div class="row">
											<div class="col mt-0 mb-3">
												<h1 class="h4 mb-3"><strong class="title-dashboard">Recruit</strong> Affiliates </h1>
												<h4 class="fw-bold mb-3"> Earn Commission Based Points </h4>
												<p class="mb-0" style="font-size: .85em;"> Earn 1.5% Commission for any affiliates under you.</p>
												<p class="mb-4" style="font-size: .85em;"> As your affiliates generate sales or meet performance targets, you'll earn points based on <br> their success. </p>
												<div class="container mb-4 p-0">
													<div class="row">
														<div class="col text-start">
															<div hidden>
																<div data-name="popover-content" style="max-width: 750px;" id="popoverContent">
																	<p>
																		Copy and share your referral link to invite new affiliates!
																	</p>

																	<div class="input-group">

																		<input type="text" class="form-control form-control-sm" id="referral_link" placeholder="Search" value="<?php echo $url . $id; ?>" name="search" style="max-width: 80%; width: 80%;" readonly>
																		<div class="input-group-btn">

																			<button class="btn btn-primary" onclick="copy()">

																				<i class="align-middle" data-feather="copy"></i> <span class="align-middle">

																			</button>

																		</div>

																	</div><br>
																	<div id="copy_message" style="display:none">
																		Copied to clipboard!
																	</div>
																</div>
															</div>

															<a id="example" tabindex="0" class="btn btn-primary background-blue rounded-pill" role="button" data-bs-toggle="popover" title="Recruit Affiliates!">Join the Affiliate Program</a>
														</div>
													</div>
												</div>
												<p class="mb-n3" style="font-size: .85em;"> Up to max 12% per affiliates. Join Now! </p>

												<div class="col text-end">
													<img src="../img/photos/referral-2.png" alt="" class="referral-img">
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

	<script src="../js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

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

	<script type='text/javascript'>
		function copy() {
			var copyText = document.getElementById("referral_link");
			copyText.select();
			copyText.setSelectionRange(0, 99999);
			navigator.clipboard.writeText(copyText.value);

			var copyMessage = document.getElementById('copy_message');
			copyMessage.style.display = 'block';

			setTimeout(function() {
				copyMessage.style.display = 'none';
			}, 2000);
		}




		$(document).ready(function() {
			var options = {
				html: true,
				title: "Copy and share your referral link to invite new affiliates!",
				content: $('#popoverContent') // Use the class name instead of data-name attribute
			};

			var exampleEl = document.getElementById('example');
			var popover = new bootstrap.Popover(exampleEl, options);

			// Function to handle click outside of anchor or popover
			$(document).on('click', function(event) {
				var target = $(event.target);
				var anchor = $('#example');
				var popoverContent = $('.popover-content');

				// Check if the click is not inside the anchor or popover content
				if (!target.is(anchor) && !target.closest(anchor).length && !target.closest(popoverContent).length) {
					// Hide the popover
					popover.hide();
				}
			});

			// Function to prevent hiding the popover when clicking inside the popover content
			$(document).on('click', '.popover', function(event) {
				event.stopPropagation(); // Prevent event from bubbling up and closing the popover
			});
		});
	</script>

</body>

</html>