<?php 
   include '../../php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Archives | SMDC JQB</title>

	<link href="../../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.php">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../../img/icons/logo.png" alt=""> </span>
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

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-booking-approval.php">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking Approval</span>
            			</a>
					</li>

                    <li class="sidebar-item active">
						<a class="sidebar-link" href="#">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-add-projects.php">
              				<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Add Projects</span>
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
						<a class="sidebar-link" href="pages-settings.php">
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

					<h1 class="h3 mb-3"><strong class="title-dashboard">Approved</strong> Bookings</h1>

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">List of Approved Bookings</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Name</th>
											<th>Unit Code</th>
											<th>Amount</th>
											<th>RA</th>
                                            <th>Holding</th>
                                            <th>RF</th>
											<th>ID</th>
                                            <th>Date</th>
											<th>Agent Name</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<?php
										$sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Booked'";
										$res_booking = mysqli_query($conn, $sql_booking);

										if ($res_booking == TRUE) {
											$count_get = mysqli_num_rows($res_booking);
											if ($count_get > 0) {
									?>
									<?php
            							while ($row = mysqli_fetch_assoc($res_booking)) {
                					?>
									<tbody>
										<tr class="text-center">
											<td> <?php echo $row['firstname']; ?> </td>
											<td> <?php echo $row['Unit_code']; ?> </td>
											<td><?php echo '₱' . ' ' . number_format($row['Amount'], 0, '.', ' '); ?></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $row['RA']; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $row['RA']; ?>')"></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $row['Holding']; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $row['Holding']; ?>')"></td>
                                            <td class="text-center"> <img src="../../img/documents/<?php echo $row['RF']; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $row['RF']; ?>')"></td>
                                            <td class="text-center"> <img src="../../img/documents/<?php echo $row['ID']; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $row['ID']; ?>')"></td>
                                            <td><?php echo $row['Transaction_date']; ?></td>
											<td>Sample</td>
                                            <td class="text-success fw-bold"><?php echo $row['status']; ?></td>
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

	<script src="../../js/app.js"></script>
	<script src="../../js/script.js"></script>


</body>

</html>