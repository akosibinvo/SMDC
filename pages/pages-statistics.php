<?php
require "../php/connection.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo.png" />

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
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../img/icons/logo.png" alt=""> </span>
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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
              				<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistics</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sales.php">
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

					<h1 class="h3 mb-3"><strong class="title-dashboard">Statistics</strong> Dashboard</h1>

					<div class="row mb-0">
						<div class="col-8 col-md-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Revenue</h5>
								</div>

								<canvas class="p-2" id="myChart"></canvas>

							</div>
						</div>

                        <div class="col-4 col-md-4 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Total Sales Unit</h5>
								</div>

								<canvas class="p-2" id="pieChart" ></canvas>

							</div>
						</div>
					</div>

                    <!-- <div class="row" >
                        <div class="col-12 col-md-12 d-flex">

                            
							<div class="card flex-fill">
                                <div class="card-header" style="border-radius: .3em; height: 110px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="text-dark mt-2 pt-2 pe-2 fw-bold">Download your earnings report</h5>
                                            <span class="text-muted" style="font-size: .85em;">Lorem Ipsum</span>
                                        </div>
                                        <div class="col-md-8 d-flex align-items-end justify-content-end">
                                            <button type="button" class="btn btn-primary btn-lg background-blue">Create Report</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>

                    </div> -->

                    <div class="row mb-3">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Inventory Statistics</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Name</th>
											<th>Unit Code</th>
											<th>Date</th>
											<th>Status</th>
											<th>Seller</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: [0, 120, 140, 100, 20, 50, 220, 240, 260, 80, 300, 10],
                    backgroundColor: 'rgba(0, 48, 255, 0.2)',
                    borderColor: 'rgba(0, 48, 255, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Color of points
                    pointBorderColor: 'rgba(255, 255, 255, 1)', // Border color of points
                    pointBorderWidth: 2, // Border width of points
                    pointRadius: 6, // Radius of points
                    pointHoverRadius: 8, // Hover radius of points
                    pointHitRadius: 10, // Hit radius of points
                    pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)', // Hover color of points
                    pointHoverBorderColor: 'rgba(255, 255, 255, 1)' // Hover border color of points
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

<script>
    var ctx = document.getElementById('pieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue'],
            datasets: [{
                label: 'My First Dataset',
                data: [12, 19, 3, 5, 2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(0, 48, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(0, 48, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'My Pie Chart'
                }
            }
        }
    });
</script>


</body>

</html>