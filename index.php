<?php
session_start();

require "php/connection.php";

if (isset($_SESSION['user_id'])) {
	$id = $_SESSION['user_id'];
	$sql = "SELECT * FROM users WHERE ID = $id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// Output data of each row
		while ($row = $result->fetch_assoc()) {
			$role = $row["role"];
			$firstname = $row["firstName"];
			$fullname = $row["firstName"] . " " . $row["lastName"];
		}
	}
} 


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/logo.png" />

	<title>Seller Dashboard | SMDC JQB</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="img/icons/logo.png" alt=""> </span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.php">
              			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-statistics.php">
              				<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistics</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-sales.php">
              				<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Sales</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-booking.php">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
            			</a>
					</li>


					<li class="sidebar-header">
						Settings
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="<?php echo ($role === 'SA1' || $role === 'SA2') ? 'pages/pages-profile.php' : 'pages/pages-profile-imp.php'; ?>">
              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
              				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            			</a>
					</li>

				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          			<i class="hamburger align-self-center"></i>
        		</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                			<i class="align-middle" data-feather="settings"></i>
              				</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
            				<span class="text-dark">
								<?php echo $fullname ?>
							</span>
              				</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="php/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3"><strong class="title-dashboard">Overview</strong> Dashboard</h1>

					<div class="container mb-4">
						<div class="row">
							<div class="col text-end">
								<a href="pages/pages-booking.php" class="btn btn-primary btn-lg background-blue">Book Now</a>
							</div>
						</div>
					</div>
					
					<div class="row d-flex justify-content-center">
						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total Sales</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>

									<?php
										$sql_booking = "SELECT SUM(Amount) AS total_amount FROM transaction_booking WHERE status = 'Booked'";
										$res_booking = mysqli_query($conn, $sql_booking);

										if ($res_booking) {
											$row = mysqli_fetch_assoc($res_booking);
											$total_amount = $row['total_amount'];
									

										} else {
											echo "Error: " . mysqli_error($conn);
										}
									?>
									
									<h1 class="mt-1 mb-3" style="font-weight: bold;"><strong class="title-dashboard">₱</strong> <?php echo number_format($total_amount) ?></h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Commissions</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="percent"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3" style="font-weight: bold;"><strong class="title-dashboard">₱</strong> 1,000,000 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Pending Bookings</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="book"></i>
											</div>
										</div>
									</div>

									<?php
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Pending' AND agent = '$firstname'  ";
										$res_booking = mysqli_query($conn, $sql_booking);
										$count_pending = mysqli_num_rows($res_booking);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count_pending ?> </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Unit Sold</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="home"></i>
											</div>
										</div>
									</div>

									<?php
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND agent = '$firstname' ";
										$res_booking = mysqli_query($conn, $sql_booking);
										$count_booked = mysqli_num_rows($res_booking);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count_booked ?> </h1>

									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						
					</div>

					<!-- <div class="row">
						<div class="col-12 col-md-12 d-flex ">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Summary of sales</h5>
								</div>

							</div>
						</div>
					</div> -->

					<div class="row mb-3">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Pending Bookings</h5>
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
									<?php
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Pending'";
										$res_booking = mysqli_query($conn, $sql_booking);

										if ($res_booking == TRUE) {
											$count_get = mysqli_num_rows($res_booking);
											if ($count_get > 0) {
									?>
									<?php
            							while ($row = mysqli_fetch_assoc($res_booking)) {
                					?>
										<tr class="text-center">
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['Unit_code']; ?> </td>
											<td><?php echo '₱' . ' ' . number_format($row['Amount'], 0, '.', ','); ?></td>
											<td><?php echo $row['Transaction_date']; ?></td>
											<td class="text-warning fw-bold"><?php echo $row['status']; ?></td>
										</tr>
										<?php
            							}
            						?>
            						</tbody>
									<?php
    							}
								}
								?>
        						</table>
        						
							</div>
						</div>
						
					</div>


					<div class="row mb-3">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Bookings</h5>
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
									<?php
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Booked'";
										$res_booking = mysqli_query($conn, $sql_booking);

										if ($res_booking == TRUE) {
											$count_get = mysqli_num_rows($res_booking);
											if ($count_get > 0) {
									?>
									<?php
            							while ($row = mysqli_fetch_assoc($res_booking)) {
                					?>
									<tbody>
										<tr class="text-center">
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['Unit_code']; ?> </td>
											<td><?php echo '₱' . ' ' . number_format($row['Amount'], 0, '.', ' '); ?></td>
											<td><?php echo $row['Transaction_date']; ?></td>
											<td class="text-success fw-bold"><?php echo $row['status']; ?></td>
										</tr>
										<?php
            							}
            						?>
            						</tbody>
        						</table>
        						<?php
    							}
								}
								?>
							</div>
						</div>
						
					</div>

				</div>
			</main>

		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/script.js"></script>


</body>

</html>