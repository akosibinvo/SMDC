<?php
include "../php/session.php";
require "../php/connection.php";
if ($agent_role !== "IMP") {
	header("Location: ../index.php");
}
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

	<title>Manage Affiliates | SMDC JQB</title>

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

					<h1 class="h3 mb-3"><strong class="title-dashboard">Affiliates</strong> Dashboard</h1>

					<div class="row mb-0">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0 text-white">Manage Affiliates</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Name</th>
											<th>Unit Code</th>
											<th>Amount</th>
											<th>Role</th>
											<th>Date</th>
											<th>Override Commission</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$results_per_page = 5;
										$sql_overcoms = "SELECT * FROM transaction_booking WHERE status = 'Booked' AND agent_role != 'IMP' AND team_id = '$id' AND user_id != '$user_id' ";
										$res_overcoms = mysqli_query($conn, $sql_overcoms);

										if ($res_overcoms == TRUE) {
											$total_results = mysqli_num_rows($res_overcoms);
											$total_pages = ceil($total_results / $results_per_page);
											// Check current page and set offset
											if (!isset($_GET['page'])) {
												$page = 1;
											} else {
												$page = $_GET['page'];
											}
											$offset = ($page - 1) * $results_per_page;

											// Fetch data for the current page
											$sql_overcoms .= " LIMIT $offset, $results_per_page";
											$res_overcoms = mysqli_query($conn, $sql_overcoms);

											if ($res_overcoms && mysqli_num_rows($res_overcoms) > 0) {

												while ($rows_overcoms = mysqli_fetch_assoc($res_overcoms)) {
													$overcoms_name = $rows_overcoms['agent'];
													$overcoms_ucode = $rows_overcoms['Unit_code'];
													$overcoms_amount = $rows_overcoms['Amount'];
													$overcoms_role = $rows_overcoms['agent_role'];
													$overcoms_date = $rows_overcoms['Transaction_date'];

													// Define commission rates
													$overcoms_rates = [
														'SA1' => 0.015,
														'SA2' => 0.01
													];

													if (array_key_exists($overcoms_role, $overcoms_rates)) {
														$overcoms_rate = $overcoms_rates[$overcoms_role];
													} else {
														exit("Error: Commission rate for role '$overcoms_role' is not defined");
													}

													$overcoms_vat = 0.12;

													$overcoms_coms = $overcoms_amount * $overcoms_rate;
													$deducted_overcoms = $overcoms_coms * $overcoms_vat;

													$accumulated_overcoms = $overcoms_coms - $deducted_overcoms;

										?>
													<tr class="text-center">
														<td><?php echo $overcoms_name; ?></td>
														<td><?php echo $overcoms_ucode; ?></td>
														<td><?php echo '₱' . ' ' . number_format($overcoms_amount, 0, '.', ','); ?></td>
														<td><?php echo $overcoms_role; ?></td>
														<td><?php echo $overcoms_date; ?></td>
														<td><?php echo '₱' . ' ' . number_format($accumulated_overcoms, 0, '.', ','); ?></td>
													</tr>
										<?php
												}
											} else {
												echo "<tr class='text-center'>";
												echo "<td colspan='6' style='cursor: default'>You don't have any affiliates yet. Start referring now!</td>";
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

				</div>
			</main>

		</div>
	</div>

	<script src="../js/app.js"></script>
	<script src="../js/script.js"></script>


</body>

</html>