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
									<h5 class="card-title mb-0">Profile Details</h5>
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
														$sql_total_sales = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked' AND agent = '$fullname' ";
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

										<div class="col-md-3 col-lg-6 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Unit Sold</h5>
														</div>
													</div>

													<?php
														$sql_booked = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND agent = '$fullname' ";
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
													$sql_total_sales = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked' AND agent = '$fullname'";
													$res_total_sales = mysqli_query($conn, $sql_total_sales);

													if ($res_total_sales) {
														$row = mysqli_fetch_assoc($res_total_sales);
														$total_amount = $row['total_amount'];

														// Calculate progress percentage
														$target_sales = 500000000; // Example target sales
														$progress_percentage = ($total_amount / $target_sales) * 100;

															// Update agent status if total amount is greater than or equal to target amount
														if ($total_amount >= $target_sales) {
															$sql_update_status = "UPDATE users SET role = 'SA2' WHERE firstname = '$fullname'";
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