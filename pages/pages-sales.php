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

	<title>Sales | SMDC JQB</title>

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

									<h5 class="card-title mb-0 text-white">Sales Overview</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Unit Code</th>
											<th>Amount</th>
											<th>Commission</th>
											<th>Date</th>
										</tr>
									</thead>
									<?php
										$sql_sales = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
										$res_sales = mysqli_query($conn, $sql_sales);

										if ($res_sales == TRUE) {
											$count_get = mysqli_num_rows($res_sales);
											if ($count_get > 0) {
									?>

									<?php
										while ($row = mysqli_fetch_assoc($res_sales)) {
									?>

									<tbody>
										<tr class="text-center">
											<td><?php echo $row['Unit_code']; ?></td>
											<td><?php echo '₱' . ' ' . number_format($row['Amount'], 0, '.', ','); ?></td>
											<td><?php echo '₱' . ' ' . number_format($row['Commissions'], 0, '.', ','); ?></td>
											<td><?php echo $row['Transaction_date']; ?></td>
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

	<script src="../js/app.js"></script>
	<script src="../js/script.js"></script>


</body>

</html>