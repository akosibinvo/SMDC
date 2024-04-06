<?php
include "../../php/session.php";
include '../../php/connection.php';
include '../include/php/modal.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="shortcut icon" href="../../img/icons/logo-square.png" />

	<title>Approved Bookings | SMDC JQB</title>

	<link href="../../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<style>
		.popUp {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.7);
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 9999;

		}

		/* Pop-up Content */
		.popUp-contents {
			width: 1000px;
			height: 500px;
			z-index: 10000;

		}

		.closeBtn {
			position: absolute;
			top: 20px;
			right: 50px;
			font-size: 30px;
			cursor: pointer;
			color: white;
			border-radius: 50%;
			padding: 0;
			z-index: 10001;
		}

		.closeBtn:hover {
			color: red;
		}
	</style>

</head>

<body>
	<div class="wrapper">

		<?php
			include "admin-sidebar.php";
		?>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

						<?php
							include "admin-navbar.php";
						?>

					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong class="title-dashboard">Approved</strong> Bookings</h1>

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title text-white mb-0">List of Approved Bookings</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>

										<tr class="text-center">
											<th>Name</th>
											<th>Unit Code</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Agent</th>
											<th> Role </th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$results_per_page = 5;
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Booked' ";
										$res_booking = mysqli_query($conn, $sql_booking);

										if ($res_booking == TRUE) {
											$total_results = mysqli_num_rows($res_booking);
											$total_pages = ceil($total_results / $results_per_page);

											// Check current page and set offset
											if (!isset($_GET['page'])) {
												$page = 1;
											} else {
												$page = $_GET['page'];
											}
											$offset = ($page - 1) * $results_per_page;

											// Fetch data for the current page
											$sql_booking .= " LIMIT $offset, $results_per_page";
											$res_booking = mysqli_query($conn, $sql_booking);

											if ($res_booking && mysqli_num_rows($res_booking) > 0) {
										?>
												<?php while ($rows_booking = mysqli_fetch_assoc($res_booking)) { ?>

													<tr class="text-center">
														<td class="d-none"><?php echo $rows_booking['transaction_id']; ?></td>
														<td><?php echo $rows_booking['firstname']; ?></td>
														<td><?php echo $rows_booking['Unit_code']; ?></td>
														<td><?php echo '₱' . ' ' . number_format($rows_booking['Amount'], 0, '.', ','); ?></td>
														<td><?php echo $rows_booking['Transaction_date']; ?></td>
														<td><?php echo $rows_booking['agent']; ?></td>
														<td><?php echo $rows_booking['agent_role']; ?></td>
														<td class="text-success fw-bold"><?php echo $rows_booking['status']; ?></td>

													</tr>
												<?php } ?>
									</tbody>
							<?php
											} else {
												echo "<tr class='text-center'>";
												echo "<td colspan='12' style='cursor: default'>No approved bookings yet.</td>";
												echo "</tr>";
											}
										}
							?>
								</table>

							</div>
						</div>

					</div>


					<div class="row mt-n2">
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

	<!-- Pop-up to display the expanded image -->
	<div id="imageModal" class="popUp" style="display: none;">
		<span class="closeBtn" onclick="closeModal()">&times;</span>
		<div style="display: flex; justify-content: center; align-items: center; height: 100%;">
			<img class="popUp-contents" id="expandedImage">
		</div>
	</div>

	<script>
		function enlargeImg(imgSrc) {
			var modal = document.getElementById('imageModal');
			var modalImg = document.getElementById('expandedImage');
			modal.style.display = 'block';
			modalImg.src = imgSrc;
		}

		document.getElementsByClassName('closeBtn')[0].onclick = function() {
			document.getElementById('imageModal').style.display = 'none';
		};
	</script>


	<script src="../../js/app.js"></script>


</body>

</html>