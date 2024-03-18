<?php
require "../backend/connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo-blue.png" />

	<title>Statistics | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.php">
					<span class="d-flex align-middle justify-content-center"> <img class="img-fluid" src="../img/icons/logo-blue.png" alt=""> </span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="../index.php">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-statistics.php">
							<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistics</span>
						</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
							<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Sales</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-booking.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
						</a>
					</li>


					<li class="sidebar-header">
						Settings
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.php">
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
								<span class="text-dark"><?php
														if (isset($_SESSION['user_id'])) {
															$id = $_SESSION['user_id'];
															$sql = "SELECT * FROM users WHERE ID = $id";
															$result = $conn->query($sql);
															if ($result->num_rows > 0) {
																// Output data of each row
																while ($row = $result->fetch_assoc()) {
																	echo $row["firstName"];
																}
															}
														} else {
															header("Location: pages/pages-sign-in.php");
														}

														?></span>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../backend/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3"><strong class="title-dashboard">Sales</strong> Dashboard</h1>

					<div class="container mb-4">
						<div class="row">
							<div class="col text-end">
								<a href="#" class="btn btn-primary btn-lg background-blue "><i class="align-middle me-1" data-feather="printer"></i>Print</a>
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Sales Overview</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Sales Performance</th>
											<th>Total Revenue</th>
											<th>Units Sold</th>
											<th>Average Selling Price</th>
											<th>Seller</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td>Sample</td>
											<td>Sample</td>
											<td>1</td>
											<td>1,000</td>
											<td>Vanessa Tucker</td>
										</tr>




									</tbody>
								</table>
							</div>
						</div>

					</div>



				</div>
			</main>


		</div>
	</div>

	<script src="../js/app.js"></script>
	<script src="../js/script.js"></script>


</body>

</html>