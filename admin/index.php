<?php
session_start();

include '../php/connection.php';
include 'include/php/modal.php';
?>

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

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

</head>

<body>


	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="#">
					<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../img/icons/logo-blue.png" alt=""> </span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-booking-approval.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking Approval</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-approved.php">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-manage-sellers.php">
							<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Manage Sellers</span>
						</a>
					</li>

					<li class="sidebar-header">
						Teams
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-assign-team.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Assign Team</span>
						</a>
					</li>

					<li class="sidebar-header">
						Archives
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages/pages-archives.php">
							<i class="align-middle" data-feather="trash-2"></i> <span class="align-middle">Archives Booking</span>
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
						<a class="sidebar-link" href="#">
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

							<a class="nav-link dropdown-toggle d-sm-inline-block me-2" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">User</span>
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

					<h1 class="h3"><strong class="title-dashboard">Overview</strong> Dashboard</h1>

					<div class="row d-flex justify-content-center mt-3">
						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total SA1</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="user"></i>
											</div>
										</div>
									</div>

									<?php
									$sql_SA1 = "SELECT * FROM users WHERE role = 'SA1'";
									$res_SA1 = mysqli_query($conn, $sql_SA1);
									$count_SA1 = mysqli_num_rows($res_SA1);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count_SA1 ?> </h1>

									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total SA2</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="user"></i>
											</div>
										</div>
									</div>

									<?php
									$sql_SA2 = "SELECT * FROM users WHERE role = 'SA2'";
									$res_SA2 = mysqli_query($conn, $sql_SA2);
									$count_SA2 = mysqli_num_rows($res_SA2);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count_SA2 ?> </h1>

									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Total IMP</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="user"></i>
											</div>
										</div>
									</div>

									<?php
									$sql_IMP = "SELECT * FROM users WHERE role = 'IMP'";
									$res_IMP = mysqli_query($conn, $sql_IMP);
									$count_IMP = mysqli_num_rows($res_IMP);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count_IMP ?> </h1>

									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3 mx-auto mb-4">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Approved Bookings</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="book"></i>
											</div>
										</div>
									</div>

									<?php
									$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Booked'";
									$res_booking = mysqli_query($conn, $sql_booking);
									$count = mysqli_num_rows($res_booking);
									?>

									<h1 class="mt-1 mb-3" style="font-weight: bold;"> <?php echo $count ?> </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-12 col-md-7 col-xl-7 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title text-white mb-0">Total Sales</h5>
								</div>

								<div class="card-body custom-graph">
									<canvas class="p-2" id="myChart"></canvas>
								</div>



							</div>



						</div>

						<div class="col-12 col-md-5 col-md-5 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title text-white mb-0">Pending List</h5>
								</div>
								<?php
								$sql_pending = "SELECT * FROM transaction_booking WHERE status = 'Pending'";
								$res_pending = mysqli_query($conn, $sql_pending);

								if ($res_pending && mysqli_num_rows($res_pending) > 0) {
								?>
									<div class="card-body custom-scrollbar" id="DragDrop">
										<?php
										while ($row = mysqli_fetch_assoc($res_pending)) {
										?>
											<ul class="custom-ul">
												<a href="pages/pages-booking-approval.php">
													<li class="custom-li">
														<span><?php echo $row['agent']; ?></span>
														<span class="text-uppercase"><?php echo $row['Unit_code']; ?></span>
														<span class="fw-bold" style="color: #0a1b5c;"><?php echo $row['status']; ?></span>
													</li>
												</a>
											</ul>
										<?php } ?>
									</div>
								<?php
								} else {
									echo "<div class='card-body d-flex align-items-center justify-content-center'>There's no pending booking.</div>";
								}
								?>
							</div>
						</div>

					</div>


					<div class="row mb-0">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title text-white mb-0">Latest Clients</h5>
								</div>



								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Last Name</th>
											<th>Date of Birth</th>
											<th>Action</th>

										</tr>
									</thead>
									<?php
									// Pagination configuration
									$results_per_page = 5;
									$sql_clientInfo = "SELECT * FROM client_info";
									$res_clientInfo = mysqli_query($conn, $sql_clientInfo);

									if ($res_clientInfo == TRUE) {
										$total_results = mysqli_num_rows($res_clientInfo);
										$total_pages = ceil($total_results / $results_per_page);

										// Check current page and set offset
										if (!isset($_GET['page'])) {
											$page = 1;
										} else {
											$page = $_GET['page'];
										}
										$offset = ($page - 1) * $results_per_page;

										// Fetch data for the current page
										$sql_clientInfo .= " LIMIT $offset, $results_per_page";
										$res_clientInfo = mysqli_query($conn, $sql_clientInfo);

										if ($res_clientInfo) {
									?>

											<tbody>
												<?php while ($rows_clientInfo = mysqli_fetch_assoc($res_clientInfo)) { ?>



													<tr class="text-center">
														<td class="d-none"><?php echo $rows_clientInfo['ID']; ?></td>
														<td><?php echo $rows_clientInfo['FirstName']; ?></td>
														<td><?php echo $rows_clientInfo['MiddleName']; ?></td>
														<td><?php echo $rows_clientInfo['LastName']; ?></td>
														<td><?php echo $rows_clientInfo['Date_of_birth']; ?></td>

														<td>
															<button class="btn btn-primary viewbtn">View</button>
															<button class="btn btn-danger removeInfobtn">Remove</button>
														</td>

														<td class="d-none"><?php echo $rows_clientInfo['Place_of_birth']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Tin_no']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Gender']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Civil_status']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Citizenship']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Email']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Phone_no']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Passport_no']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Present_address']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Permanent_address']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Employer_name']; ?></td>
														<td class="d-none"><?php echo $rows_clientInfo['Work_address']; ?></td>
													</tr>


												<?php } ?>
											</tbody>

									<?php
										}
									}
									?>
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		const dropItems = document.getElementById('DragDrop')
		new Sortable(dropItems, {
			animation: 250,
			chosenClass: "sortable-chosen",
			dragClass: "sortable-drag"
		});
	</script>

	<script>
		$(document).ready(function() {

			$('.viewbtn').on('click', function() {

				$('#viewDetailsModal').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function() {
					return $(this).text();
				}).get();

				console.log(data);

				$('viewdetails_id').val(data[0]);
				$('#view_firstname').val(data[1]);
				$('#view_middlename').val(data[2]);
				$('#view_lastname').val(data[3]);

				$('#view_birthdate').val(data[4]);
				$('#view_birthplace').val(data[6]);

				$('#view_tin').val(data[7]);
				$('#view_gender').val(data[8]);
				$('#view_civil').val(data[9]);
				$('#view_citizenship').val(data[10]);

				$('#view_email').val(data[11]);
				$('#view_phone').val(data[12]);
				$('#view_passport').val(data[13]);

				$('#view_presentAddress').val(data[14]);
				$('#view_permanentAddress').val(data[15]);

				$('#view_employer').val(data[16]);
				$('#view_workAddress').val(data[17]);

			});

		});
	</script>

	<script>
		$(document).ready(function() {

			$('.removeInfobtn').on('click', function() {

				$('#removeInfoModal').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function() {
					return $(this).text();
				}).get();

				console.log(data);

				$('#remove_info_id').val(data[0]);

			});
		});
	</script>

	<script>
		<?php
		// Check if there is a notification in the session
		if (isset($_SESSION['notification'])) {
			// Get notification details
			$title = $_SESSION['notification']['title'];
			$status = $_SESSION['notification']['status'];
			$description = $_SESSION['notification']['description'];
		?>
			//Display the notification
			pushNotify("<?php echo $status; ?>", "<?php echo $title; ?>", "<?php echo $description; ?>");
		<?php
			// Clear the notification from the session
			unset($_SESSION['notification']);
		}
		?>

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
	</script>

	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: [
					'Red',
					'Blue',
					'Yellow'
				],
				datasets: [{
					label: 'My First Dataset',
					data: [300, 50, 100],
					backgroundColor: [
						'#0a1b5c',
						'#10319f',
						'#0c3cff'
					],
					hoverOffset: 4
				}]
			},
			options: {
				plugins: {
					title: {
						display: true,
						text: 'Total Sales'
					}
				}
			}
		});
	</script>


</body>


</html>