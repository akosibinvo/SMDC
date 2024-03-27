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

					<h1 class="h3 mb-3"><strong class="title-dashboard">Statistics</strong> Dashboard</h1>

					<div class="row mb-0">
						<div class="col-12 col-md-8 col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0 text-white">Revenue</h5>
								</div>

								<canvas class="p-2" id="myChart" style="height: 450px;"></canvas>

							</div>
						</div>

						<div class="col-12 col-md-4 col-xl-4 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0 text-white">Total Sales Unit</h5>
								</div>

								<div class="row p-3">

									<div class="col-md-6 mb-1">
										<select class="form-select" name="start_date" id="start_date" required>
											<option value="">Start Date</option>
											<?php
											$query = "SELECT DISTINCT MONTH(Transaction_date) AS month FROM transaction_booking";
											$result = mysqli_query($conn, $query);

											if ($result) {
												while ($row = mysqli_fetch_assoc($result)) {
													$month = $row['month'];
													$month_name = date('F', mktime(0, 0, 0, $month, 1));
													echo "<option value='$month'>$month_name</option>";
												}
											}
											?>
										</select>
									</div>

									<div class="col-md-6 mb-1">
										<select class="form-select" name="end_date" id="end_date" required>
											<option value="">End Date</option>
											<?php
											$query = "SELECT DISTINCT MONTH(Transaction_date) AS month FROM transaction_booking";
											$result = mysqli_query($conn, $query);

											if ($result) {
												// Fetch distinct months from the database
												while ($row = mysqli_fetch_assoc($result)) {
													$month = $row['month'];
													$month_name = date('F', mktime(0, 0, 0, $month, 1));

													echo "<option value='$month'>$month_name</option>";
												}
											}
											?>
										</select>
									</div>


								</div>

								<div class="row px-4">
									<button class="btn btn-primary"> Compare Sales </button>
								</div>

								<canvas class="p-2" id="doughnutChart" style="height: 450px;"></canvas>

							</div>
						</div>


						<div class="row">
							<div class="col-12 col-md-12 d-flex">
								<div class="card flex-fill">
									<div class="card-header">

										<h5 class="card-title mb-0 text-white">Inventory Statistics</h5>
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

										<?php
										$results_per_page = 5;
										$sql_statistics = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
										$res_statistics = mysqli_query($conn, $sql_statistics);

										if ($res_statistics == TRUE) {
											$total_results = mysqli_num_rows($res_statistics);
											$total_pages = ceil($total_results / $results_per_page);
											// Check current page and set offset
											if (!isset($_GET['page'])) {
												$page = 1;
											} else {
												$page = $_GET['page'];
											}
											$offset = ($page - 1) * $results_per_page;

											// Fetch data for the current page
											$sql_statistics .= " LIMIT $offset, $results_per_page";
											$res_statistics = mysqli_query($conn, $sql_statistics);

											if ($res_statistics) {
										?>

												<?php
												while ($row = mysqli_fetch_assoc($res_statistics)) {
												?>

													<tbody>
														<tr class="text-center">
															<td><?php echo $row['firstname']; ?></td>
															<td><?php echo $row['Unit_code']; ?></td>
															<td><?php echo $row['Transaction_date']; ?></td>
															<td class="text-success fw-bold"><?php echo $row['status']; ?></td>
															<td><?php echo $row['agent']; ?></td>
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

						<div class="row mt-n2 mb-3">
							<div class="d-flex justify-content-end">

								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
											<a class="page-link" href="?page=<?php echo max(1, $page - 1); ?>" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
											<li class="page-item <?php if ($i == $page) echo 'active'; ?>">
												<a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
											</li>
										<?php } ?>
										<li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
											<a class="page-link" href="?page=<?php echo min($total_pages, $page + 1); ?>" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									</ul>
								</nav>

							</div>
						</div>



					</div>
			</main>


		</div>
	</div>


	<?php
	$query = "SELECT MONTH(Transaction_date) AS month, SUM(Amount) AS total_sales 
		FROM transaction_booking 
		WHERE status = 'Booked' AND user_id = '$id'
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
		var ctx = document.getElementById('doughnutChart').getContext('2d');
		var myPieChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ['Previous Sales', 'Latest Sales'],
				datasets: [{
					label: 'Sales on <?php echo $month ?>',
					data: <?php echo $data_json; ?>,
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
						text: 'Sales Comparison'
					}
				}
			}
		});
	</script>

</body>

</html>