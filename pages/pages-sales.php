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
								<button class="btn btn-primary background-blue "><i class="align-middle me-1" data-feather="printer"></i>Print</button>
							</div>
						</div>
					</div>

					<div class="row">
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
									$results_per_page = 5;
									$sql_sales = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
									$res_sales = mysqli_query($conn, $sql_sales);

									if ($res_sales == TRUE) {
										$total_results = mysqli_num_rows($res_sales);
										$total_pages = ceil($total_results / $results_per_page);
										// Check current page and set offset
										if (!isset($_GET['page'])) {
											$page = 1;
										} else {
											$page = $_GET['page'];
										}
										$offset = ($page - 1) * $results_per_page;

										// Fetch data for the current page
										$sql_sales .= " LIMIT $offset, $results_per_page";
										$res_sales = mysqli_query($conn, $sql_sales);

										if ($res_sales) {
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

	<script src="../js/app.js"></script>
	<script src="../js/script.js"></script>


</body>

</html>