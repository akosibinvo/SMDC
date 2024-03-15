<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo.png" />

	<title>Admin Dashboard | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.html">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../img/icons/logo.png" alt=""> </span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="../index.html">
              			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-booking-approval.html">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking Approval</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-archives.html">
              				<i class="align-middle" data-feather="archive"></i> <span class="align-middle">Booking Archives</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-approved.html">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
            			</a>
					</li>


					<li class="sidebar-header">
						Settings
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
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
            				<span class="text-dark">User</span>
              				</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3"><strong class="title-dashboard">Overview</strong> Dashboard</h1>
					
					<div class="row d-flex justify-content-center">
						<div class="col-md-6 col-lg-4 mx-auto mb-4">
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 1,000,000 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-4 mx-auto mb-4">
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 1,000,000 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
										<span class="text-muted" style="font-size: .85em;">Last 24 hours </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-4 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Points</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="star"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 6,000 </h1>
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

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>Unit Code</th>
											<th>Date</th>
											<th>Status</th>
											<th>Seller</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Sample</td>
											<td>Unit 1</td>
											<td>31/06/2023</td>
											<td>Pending</td>
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