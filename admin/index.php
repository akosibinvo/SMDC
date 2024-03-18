
<?php 
   include '../php/connection.php';
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
	<link href="../css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.php">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../img/icons/logo.png" alt=""> </span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="../index.php">
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
						<a class="sidebar-link" href="pages/pages-add-projects.php">
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

					<h1 class="h3"><strong class="title-dashboard">Overview</strong> Dashboard</h1>
					
					<div class="row d-flex justify-content-center">
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 27 </h1>
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 3 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 2 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i>  </span>
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
									<h1 class="mt-1 mb-3" style="font-weight: bold;"> 6 </h1>
									<div class="mb-0">
										<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> </span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Clients</h5>
								</div>

								

								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>First Name</th>
											<th>Middle Name</th>
											<th>Last Name</th>
											<th>Date of Birth</th>
											<th>Action</th>
											<!-- <th>Tin No.</th>
											<th>Gender</th>
                                            <th>Civil Status</th>
                                            <th>Citizenship</th>
                                            <th>Email</th>
											<th>Phone No.</th>
                                            <th>Passport No.</th>
                                            <th>Address</th>
											<th>Employer Name</th> -->
										</tr>
									</thead>
									<tbody>
									<?php
									$sql_clientInfo = "SELECT * FROM client_info";
									$res_clientInfo = mysqli_query($conn, $sql_clientInfo);

									if($res_clientInfo == TRUE){
									$count_get = mysqli_num_rows($res_clientInfo);
									if($count_get > 0){
										while($rows_clientInfo = mysqli_fetch_assoc($res_clientInfo)){
											$firstname = $rows_clientInfo['FirstName'];
											$middlename = $rows_clientInfo['MiddleName'];
											$lastname = $rows_clientInfo['LastName'];

											
											$birthdate = $rows_clientInfo['Date_of_birth'];
											$tinNo = $rows_clientInfo['Tin_no'];
											$gender = $rows_clientInfo['Gender'];
											$civilstatus = $rows_clientInfo['Civil_status'];
											$citizenship = $rows_clientInfo['Citizenship'];
											$email = $rows_clientInfo['Email'];

											$phonenumber = $rows_clientInfo['Phone_no'];
											$passportnumber = $rows_clientInfo['Passport_no'];
											$address = $rows_clientInfo['Present_address'];
											$employername = $rows_clientInfo['Employer_name'];
											?>
											
											
										<tr class="text-center">
											<td><?php echo $firstname;?></td>
											<td><?php echo $middlename;?></td>
											<td><?php echo $lastname;?></td>
											<td><?php echo $birthdate;?></td>
											<td><button class="btn btn-primary viewbtn">View Details</button></td>

                                            <!-- <td><?php echo $civilstatus;?></td>
											<td><?php echo $citizenship;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $phonenumber;?></td>
											<td><?php echo $passportnumber;?></td>
											<td><?php echo $address;?></td>
											<td><?php echo $employername;?></td> -->
										</tr>
										
										<?php
										}
									}
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

	<script src="../js/app.js"></script>
	<script>
         $(document).ready(function () {
         
             $('.viewbtn').on('click', function () {
         
                 $('#editModal').modal('show');
         
                 $tr = $(this).closest('tr');
         
                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();
         
                 console.log(data);
         
                 $('#update_id').val(data[0]);
                 $('#projectname').val(data[1]);
                 $('#unitcode').val(data[2]);
				 $('#amount').val(data[3]);

             });
			 
         });
      </script>


</body>

</html>