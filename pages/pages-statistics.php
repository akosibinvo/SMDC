<?php
	include "../php/session.php";
	require "../php/connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo-square.png" />

	<title>Statistics | SMDC JQB</title>

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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                			<i class="align-middle" data-feather="settings"></i>
              				</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
            				<span class="text-dark">
								<?php 
									echo $fullname;
								?>
							</span>
              				</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
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


	<?php
		$query = "SELECT MONTH(Transaction_date) AS month, SUM(Amount) AS total_sales 
		FROM transaction_booking 
		WHERE status = 'Booked' AND agent = '$firstname'
		GROUP BY MONTH(Transaction_date)";

		$result = mysqli_query($conn, $query);


		$data = array_fill(1, 12, 0);

		while ($row = mysqli_fetch_assoc($result)) {
		$month = intval($row['month']);
		$data[$month] = $row['total_sales'];
		}
		
		$data_json = json_encode(array_values($data));
	?>

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
                    label: ' Sales',
                    data: <?php echo $data_json; ?>,
                    backgroundColor: '#2f6cff',
                    borderColor: '#2f6cff',
                    borderWidth: 2,
                    pointBackgroundColor: '#2f6cff',
                    pointBorderColor: '#2f6cff',
                    pointBorderWidth: 1,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointHitRadius: 10,
                    pointHoverBackgroundColor: '#0030ff',
                    pointHoverBorderColor: '#0030ff'
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
						'#0030ff',
						'#2f6cff'
					]
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