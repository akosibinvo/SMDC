<?php
	require "../php/connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo.png" />


	<title>Profile | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
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
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="../img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">
									<?php
										echo $fullname
									?>
								</span>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../php/logout.php">Log out</a>
							</div>
						</li>
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
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="../img/avatars/default-profile-blue.png" alt="Default Profile" class="img-fluid rounded-circle mb-2" width="128" height="128" />

									<h5 class="card-title mt-3 mb-2"><?php echo $fullname;?></h5>
									<div class="text-muted mb-3"><?php echo $role;?></div>

									<div>
										<button class="btn btn-primary btn-sm px-2 editProfile"><span data-feather="edit"></span> Edit</button>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Bio</h5>
									<textarea class="form-control non-resizable border-0 bg-white" id="permanentAddress" name="permanentAddress" rows="3" disabled></textarea>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> Contact <a href="#"> </a></li>
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">Pasig</a></li>
										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">Easysell</a></li>
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
							<div class="card bg-transparent" style="box-shadow: none;">
									<h5 class="card-title mb-0">Acount Status</h5>
								<div class="card-body mb-0">
									<div class="row mb-3">
										<div class="col-md-3 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Total Sales</h5>
														</div>
													</div>
													<?php
														$sql_total_sales = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked' AND agent = '$firstname' ";
														$res_total_sales = mysqli_query($conn, $sql_total_sales);

														if ($res_total_sales) {
															$row = mysqli_fetch_assoc($res_total_sales);
															$total_amount = $row['total_amount'];
													

														} else {
															echo "Error: " . mysqli_error($conn);
														}
													?>

													<h1 class="mt-1 mb-3 text-center" style="font-weight: bold;"><strong class="title-dashboard">₱</strong> <?php echo number_format($total_amount) ?></h1>
												</div>
											</div>
										</div>

										<div class="col-md-3 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Commissions</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> 1,000,000 </h1>
												</div>
											</div>
										</div>

										<div class="col-md-3 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Unit Sold</h5>
														</div>
													</div>

													<?php
														$sql_booked = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND agent = '$firstname' ";
														$res_booked = mysqli_query($conn, $sql_booked);
														$count_booked = mysqli_num_rows($res_booked);
													?>

													<h1 class="mt-1 mb-3 text-center" style="font-weight: bold;"> <?php echo $count_booked ?> </h1>

												</div>
											</div>
										</div>

										<div class="col-md-3 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Status</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> <?php echo $role;?> </h1>
												</div>
											</div>
										</div>

												<?php
													$sql_total_sales = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked' AND agent = '$firstname'";
													$res_total_sales = mysqli_query($conn, $sql_total_sales);

													if ($res_total_sales) {
														$row = mysqli_fetch_assoc($res_total_sales);
														$total_amount = $row['total_amount'];

														// Calculate progress percentage
														$target_sales = 500000000; // Example target sales
														$progress_percentage = ($total_amount / $target_sales) * 100;

															// Update agent status if total amount is greater than or equal to target amount
														if ($total_amount >= $target_sales) {
															$sql_update_status = "UPDATE users SET role = 'SA2' WHERE firstname = '$firstname'";
														} else {
															mysqli_error($conn);
														}
													}
												?>

										<div class="col-md-12 col-xl-12 px-4">
											<div class="col-md-12 rounded-pill mb-2" style="background: rgba(0, 48, 255, 0.5);">
												<div class="progress" style="height: 12px;">
												
														<div class="progress-bar px-2 rounded-pill text-white text-center" role="progressbar" style="width: <?php echo $progress_percentage; ?>%; height: 12px; font-size: .65em; background: #0030ff;" aria-valuenow="<?php echo $progress_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($progress_percentage, 2); ?>%</div>
											
												</div>
											</div>
											<h5 class="text-center text-muted" style="font-size: .75em;"><?php echo number_format($total_amount); ?> / <?php echo number_format($target_sales); ?></h5>
										</div>
										

									</div>

									<div class="row mb-3">
										<div class="col-12 col-md-12 d-flex">
											<div class="card flex-fill">
												<div class="card-header">
				
													<h5 class="card-title mb-0">Transaction History</h5>
												</div>
												<table class="table table-hover my-0">
													<thead>
														<tr class="text-center">
															<th>Name</th>
															<th>Unit Code</th>
															<th>Amount</th>
															<th>Date</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody>
														<tr class="text-center">
															<td>Sample</td>
															<td>Unit 1</td>
															<td>2,500,000</td>
															<td>03/14/2024</td>
															<td>Booked</td>
														</tr>
													</tbody>
												</table>
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/app.js"></script>
    <script>
         $(document).ready(function () {
         
             $('.editProfile').on('click', function () {
         
                 $('#editProfileModal').modal('show');
         
				 var $cardBody = $(this).closest('.card-body');
         
				 var profileName = $cardBody.find('.card-title').text().trim();
         
                 console.log(data);
         
                 $('#firstname').val(data(profileName));

             });
			 
         });
      </script>


</body>

</html>