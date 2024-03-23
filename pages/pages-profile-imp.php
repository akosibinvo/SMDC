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

	<title>Profile | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
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
									<h5 class="mb-0" title="Edit Profile Details"><span data-feather="edit-3" class="feather-sm" style="color: #fff; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editProfileDetails"></span></h5>
								</div>
								<div class="card-body text-center">

									<img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="object-fit-cover rounded-circle mb-2" width="160" height="160" />

									<h1 class="h5 fw-bold mt-3 mb-2"><?php echo $fullname;?></h1>
									<h1 class="h5 text-muted fw-bold mb-0"><?php echo $agent_role;?></h1>
									
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
												<span class="fw-bold" >First Name</span>
											</div>
											<div class="col">
												<span><?php echo $firstname;?></span>
											</div>
										</div>

										<div class="row gx-2 mb-3">
											<div class="col">
												<span class="fw-bold">Last Name</span>
											</div>
											<div class="col">
												<span><?php echo $lastname;?></span>
											</div>
										</div>

										<div class="row gx-2 mb-3">
											<div class="col">
												<span class="fw-bold">Contact No.</span>
											</div>
											<div class="col">
												<span><?php echo $contact;?></span>
											</div>
										</div>

										<div class="row gx-2 mb-3">
											<div class="col">
												<span class="fw-bold">Joined</span>
											</div>
											<div class="col">
												<span><?php echo $formatted_date;?></span>
											</div>
										</div>
											
									</li>
									
								</ul>

									
								</div>
								
							</div>
						</div>

						<div class="col-md-8 col-xl-8">
							<div class="card">

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
															$sql_total_coms = "SELECT SUM(Commissions) AS total_coms FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
															$res_total_coms = mysqli_query($conn, $sql_total_coms);

															if ($res_total_coms) {
																$row = mysqli_fetch_assoc($res_total_coms);
																$total_coms = $row['total_coms'];
														

															} else {
																echo "Error: " . mysqli_error($conn);
															}
														?>

													<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;">₱ <?php echo number_format($total_coms) ?></h1>
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
													<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;"> <?php echo $agent_role;?> </h1>
												</div>
											</div>
										</div>

										
									</div>

								</div>
							</div>

								<div class="col-md-12 col-xl-12">
									<div class="card" style="position: relative;">
										<div class="card-body" >
											<div class="row">
												<div class="col mt-0 mb-3">
													<h1 class="h4 mb-3"><strong class="title-dashboard">Recruit</strong> Affiliates </h1>
													<h4 class="fw-bold mb-3"> Earn Commission Based Points </h4>
													<p class="mb-0" style="font-size: .85em;"> Earn 1.5% Commission for any affiliates under you.</p>
													<p class="mb-4" style="font-size: .85em;"> As your affiliates generate sales or meet performance targets, you'll earn points based on <br> their success. </p>
													<div class="container mb-4 p-0">
														<div class="row">
															<div class="col text-start">
																<a href="#" class="btn btn-primary background-blue rounded-pill">Join the Affiliate Program</a>
															</div>
														</div>
													</div>
													<p class="mb-n3" style="font-size: .65em;"> Up to max 12% per affiliates. Join Now!  </p>

													<div class="col text-end">
														<img src="../img/photos/referral-2.png" alt="" class="referral-img">
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 col-md-12 d-flex">
										<div class="card flex-fill">
											<div class="card-header">
												<h5 class="card-title mb-0 text-white">Manage Affiliates</h5>
											</div>
											<table class="table table-hover my-0">
												<thead>
													<tr class="text-center">
														<th>Name</th>
														<th>Status</th>
														<th>Unit Sold</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<tr class="text-center">
														<td>Sample</td>
														<td>Unit 1</td>
														<td>31/06/2023</td>
														<td>Vanessa Tucker</td>
													</tr>
													
													
												</tbody>
											</table>
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


</body>

</html>