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

	<title>Statistics | SMDC JQB</title>

	<link href="../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Simple Notify -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
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

									<div class="col-md-6 mb-2">
										<select class="form-select" name="start_date" id="start_date" required>
											<option value="">Start Date</option>
											<?php
											$query = "SELECT DISTINCT MONTH(Transaction_date) AS month FROM transaction_booking 
														  WHERE status = 'Booked' AND user_id = '$id'";
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
										<div class="invalid-feedback">
											Please choose a start date
										</div>
									</div>

									<div class="col-md-6 mb-2">
										<select class="form-select" name="end_date" id="end_date" required>
											<option value="">End Date</option>
										</select>
										<div class="invalid-feedback">
											Please choose a end date
										</div>
									</div>


								</div>

								<div class="row px-4">
									<button id="compare_sales_btn" type="button" class="btn btn-primary"> Compare Sales </button>
								</div>

								<canvas class="p-2" id="doughnutChart" style="height: 450px;"></canvas>

							</div>
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

										if ($res_statistics && mysqli_num_rows($res_statistics) > 0) {
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

										<?php
										} else {
											echo "<tr class='text-center'>";
											echo "<td colspan='6' style='cursor: default'> There's no data yet. Start booking now!</td>";
											echo "</tr>";
										}
									}
										?>
												</tbody>
								</table>
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

			</main>


		</div>
	</div>


	<?php
	$query = "	SELECT 
				MONTH(Transaction_date) AS month, 
				SUM(Amount) AS total_sales,
				(SELECT SUM(Amount) FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id') AS total_sales_sum 
				FROM transaction_booking 
				WHERE status = 'Booked' AND user_id = '$id'
				GROUP BY MONTH(Transaction_date)
				";


	$result = mysqli_query($conn, $query);

	$data = array();
	$dataDoughnut = array();

	$monthSales = array();

	// Fill the monthSales array with zeros for all months
	for ($month = 1; $month <= 12; $month++) {
		$monthName = date("F", mktime(0, 0, 0, $month, 1));
		$monthSales[$monthName] = 0;
	}

	// Fetch data from the database and update monthSales with actual total sales
	while ($row = mysqli_fetch_assoc($result)) {
		$monthName = date("F", mktime(0, 0, 0, $row['month'], 1));
		$monthSales[$monthName] = $row['total_sales'];

		$month = date("F", mktime(0, 0, 0, $row['month'], 1));

		$total_sum = $row['total_sales'];
		$combinedSales = $row['total_sales_sum'];
		$percentage = ($total_sum / $combinedSales) * 100;

		$dataDoughnut[] = array(
			'month' => $month,
			'percentage' => $percentage,
		);
	}

	// Construct the final data array
	foreach ($monthSales as $monthName => $totalSales) {
		$data[] = array(
			'month' => $monthName,
			'total_sales' => $totalSales,
		);
	}

	// Encode the data array as JSON
	$data_json = json_encode(array('data' => $data));

	$dataSalesDoughnut = array('data' => $dataDoughnut);
	$data_json_Doughnut = json_encode($dataSalesDoughnut);

	?>


	<script src="../js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Simple Notify -->
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
	<script>
		function createDoughnutChart(labels, totalSums) {
			var ctx = document.getElementById('doughnutChart').getContext('2d');
			window.myDoughnutChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: labels,
					datasets: [{
						data: totalSums,
						backgroundColor: [
							'#5696ff',
							'#0a1b5c',
							'#2f6cff',
							'#d5ecff',
							'#d5ecff',
							'#10319f',
							'#b3daff',
							'#062ecd',
							'#85bfff',
							'#0030ff',
							'#e8f5ff',
							'#0c3cff'
						]
					}]
				},
				options: {
					plugins: {
						title: {
							display: true,
							text: 'Sales Comparison'
						},
						tooltip: {
							callbacks: {
								label: function(context) {
									var label = context.label || '';

									if (label) {
										label += ': ';
									}
									label += Math.round(context.parsed * 100) / 100 + '%';
									return label;
								}
							}
						}
					}
				}
			});
		}

		function pushNotify(status, title, description) {
			new Notify({
				status: status,
				title: title,
				text: description,
				effect: 'slide',
				speed: 800,
				customClass: null,
				customIcon: null,
				showIcon: true,
				showCloseButton: true,
				autoclose: true,
				autotimeout: 1500,
				gap: 20,
				distance: 20,
				type: 1,
				position: 'x-center top'
			});
		}

		$('#start_date').change(function() {

			var selectedValue = $(this).val();

			$.ajax({
				url: '../php/getMonths.php',
				method: 'POST',
				data: {
					value_date: selectedValue
				},
				success: function(response) {
					var firstOption = $('#end_date option:first').prop('outerHTML');
					$('#end_date').empty().append(firstOption + response);
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
		});

		$('#compare_sales_btn').click(function() {

			var startDate = $('#start_date').val();
			var endDate = $('#end_date').val();

			if (startDate === '' || endDate === '') {
				var status = 'error';
				var title = 'Error!'
				var description = 'Please select a date.';
				pushNotify(status, title, description)
			} else {
				$.ajax({
					url: '../php/getMonths.php',
					method: 'POST',
					data: {
						start_date: startDate,
						end_date: endDate
					},
					success: function(response) {
						salesData = JSON.parse(response);
						console.log(salesData);

						const labels = salesData.data.map(item => item.month);
						const totalSums = salesData.data.map(item => parseFloat(item.percentage));

						if (window.myDoughnutChart !== undefined) {
							window.myDoughnutChart.destroy();
						}

						createDoughnutChart(labels, totalSums);
					},
					error: function(xhr, status, error) {
						console.error(xhr.responseText);
					}
				});
			}
		});

		var salesDataInitial = <?php echo $data_json_Doughnut; ?>;

		var labelsInitial = salesDataInitial.data.map(item => item.month);
		var totalSalesInitial = salesDataInitial.data.map(item => parseFloat(item.percentage));

		createDoughnutChart(labelsInitial, totalSalesInitial);
	</script>
	<script>
		var salesDataBar = <?php echo $data_json; ?>;

		var totalSalesBar = salesDataBar.data.map(item => parseFloat(item.total_sales));

		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: ' Sales',
					data: totalSalesBar,
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

	<!-- <script>
		var ctx = document.getElementById('doughnutChart').getContext('2d');
		window.myPieChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ['Previous Sales', 'Latest Sales'],
				datasets: [{
					label: 'Sales',
					data: <?php //echo $data_json; 
							?>,
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
	</script> -->
	<script>
		function checkDates() {
			var startDate = document.getElementById('start_date').value;
			var endDate = document.getElementById('end_date').value;
			var errorMessage = document.getElementById('end_date_error');

			if (!startDate || !endDate) {
				alert("error1");
			} else if (startDate === endDate) {
				alert("error2");
			} else {
				alert("ok");
			}
		}

		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()
	</script>

</body>

</html>