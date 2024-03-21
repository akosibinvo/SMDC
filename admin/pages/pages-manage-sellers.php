<?php
   include '../../php/session.php';
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

	<title>Manage Sellers | SMDC JQB</title>

	<link href="../../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />


</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.php">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../../img/icons/logo-blue.png" alt=""> </span>
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

                    <li class="sidebar-item">
						<a class="sidebar-link" href="pages-approved.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
              				<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Manage Sellers</span>
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
								<a class="dropdown-item" href="../../php/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong class="title-dashboard"> Manage </strong> Sellers </h1>

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Manage Sellers</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>First Name</th>
											<th>Last Name</th>
											<th>E-mail</th>
											<th>Date Joined</th>
											<th>Role</th>
                                            <th>Action</th>
										</tr>
									</thead>

									<tbody>
                                    <?php
                                        $sql_sellers = "SELECT * FROM users";
                                        $res_sellers = mysqli_query($conn, $sql_sellers);

                                        if ($res_sellers) {
                                            while ($rows_sellers = mysqli_fetch_assoc($res_sellers)) {
												$sellers_id = $rows_sellers['ID'];
                                                $firstname = $rows_sellers['firstName'];
                                                $lastname = $rows_sellers['lastName'];
                                                $email = $rows_sellers['email'];
                                                $role = $rows_sellers['role'];
                                                $dateJoined = $rows_sellers['dateJoined'];

                                    	?>
										<tr class="text-center">
											<td class="d-none"> <?php echo $sellers_id ?>  </td>
											<td> <?php echo $firstname ?> </td>
											<td> <?php echo $lastname ?> </td>
											<td> <?php echo $email ?> </td>
                                            
											<td> <?php echo $dateJoined ?> </td>
											<td><?php echo $role ?></td>
                                            <td>
												<button class="btn btn-success manageSellersbtn">Edit</button>
                                                <button class="btn btn-danger">Remove</button>
                                            </td>
										</tr>
                                        <?php
                                            }
                                        } else {
                                            // Handle error if query fails
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                    ?>
									</tbody>

								</table>
							</div>
						</div>
						
					</div>

				</div>
			</main>
            
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
	<script src="../../js/app.js"></script>
	

	<script>
         $(document).ready(function () {
         
             $('.manageSellersbtn').on('click', function () {
         
				$('#manageSellersModal').modal('show');
		
				$tr = $(this).closest('tr');
		
				var data = $tr.children("td").map(function () {
					return $(this).text();
				}).get();
		
				$('#update_sellers_id').val(data[0]);
				$('#manage_edit_firstname').val(data[1]);
				$('#manage_edit_lastname').val(data[2]);
				$('#manage_edit_email').val(data[3]);
				$('#manage_edit_date').val(data[4]);
				$('#manage_edit_role').val(data[5]);

             });
			 
         });
      </script>

<?php
        // Check if there is a notification in the session
        if (isset($_SESSION['notification'])) {
            // Get notification details
            $title = $_SESSION['notification']['title'];
            $status = $_SESSION['notification']['status'];
            $description = $_SESSION['notification']['description'];
            // Clear the notification from the session
            unset($_SESSION['notification']);
        }
    ?>

    <script>
		
        pushNotify("<?php echo $status; ?>", "<?php echo $title; ?>", "<?php echo $description; ?>");

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


</body>

</html>