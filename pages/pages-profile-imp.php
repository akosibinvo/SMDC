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
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0 text-white">Profile Details</h5>
								</div>
								<div class="card-body text-center">

									<img src="<?php echo $profile_img_path; ?>" alt="Default Profile" class="rounded-circle mb-2" width="130" height="130" />

									<h5 class="card-title mt-3 mb-2"><?php echo $fullname;?></h5>
									<div class="text-muted mb-3"><?php echo $role;?></div>

									<div class="mb-3">
										<button type="button" class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#profileModal"> Edit </button>
									</div>

								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">Pasig</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">Easysell</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Philippines</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">staciehall.co</a></li>
										<li class="mb-1"><a href="#">Twitter</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card bg-transparent mb-0" style="box-shadow: none;">

								<div class="card-header bg-transparent mb-0">
									<h5 class="card-title mb-0">Acount Status</h5>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col-md-6 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Override Commissions</h5>
														</div>
													</div>

														<?php
															$sql_total_coms = "SELECT SUM(Commissions) AS total_coms FROM transaction_booking WHERE status = 'Booked' AND agent = '$fullname' ";
															$res_total_coms = mysqli_query($conn, $sql_total_coms);

															if ($res_total_coms) {
																$row = mysqli_fetch_assoc($res_total_coms);
																$total_coms = $row['total_coms'];
														

															} else {
																echo "Error: " . mysqli_error($conn);
															}
														?>

													<h1 class="mt-1 mb-3 text-center" style="font-weight: bold;"><strong class="title-dashboard">₱</strong> <?php echo number_format($total_coms) ?></h1>
												</div>
											</div>
										</div>


										<div class="col-md-6 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body ">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Status</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> <?php echo $role;?> </h1>
												</div>
											</div>
										</div>

										
									</div>

                                    <!-- <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12 ">
                                            <div class="card flex-fill" style="height: 180px;">
                                                <div class="card-header background-blue">
                                                    <h5 class="card-title mb-0 text-white text-center">Referral Code</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-center" style="font-size: .85em;">Share the code below to get commission points</p>
                                                    
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="KYb3HG43n"  id="inputField" style="color:#0030ff; font-weight: bold;" readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" onclick="copyText()" style="font-size: 1.5em;"><i class="align-middle text-white" data-feather="copy"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
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