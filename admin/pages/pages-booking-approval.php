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

	<title>Booking Approval | SMDC JQB</title>


	<link href="../../css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />

	<style>
		.popUp{
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
			width: 1200px;
			height: 600px;
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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="#">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking Approval</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-approved.php">
              				<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Approved Bookings</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-manage-sellers.php">
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

					<h1 class="h3 mb-3"><strong class="title-dashboard">Booking</strong> Approval</h1>

					<div class="row">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Bookings List</h5>
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
											<th>Agent</th>
                                            <th>Status</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $sql_booking = "SELECT * FROM transaction_booking WHERE status = 'Pending' ";
                                        $res_booking = mysqli_query($conn, $sql_booking);

                                        if ($res_booking) {
                                            while ($rows_booking = mysqli_fetch_assoc($res_booking)) {
												$booking_id = $rows_booking['client_id'];
                                                $firstname = $rows_booking['firstname'];
                                                $unitcode = $rows_booking['Unit_code'];
												$RA = $rows_booking['RA'];
												$Holding = $rows_booking['Holding'];
												$RF = $rows_booking['RF'];
												$ID = $rows_booking['ID'];
												$date = $rows_booking['Transaction_date'];
												$agent = $rows_booking['agent'];
												$status = $rows_booking['status'];
												$amount = $rows_booking['Amount'];
                                    	?>

                                        <tr class="text-center">
											<td class="d-none"> <?php echo $booking_id; ?></td>
                                            <td><?php echo $firstname; ?></td>
                                            <td><?php echo $unitcode; ?></td>
											<td><?php echo '₱' . ' ' . number_format($amount, 0, '.', ','); ?></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $RA; ?>" alt="RA Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $RA; ?>')"></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $Holding; ?>" alt="Holding Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $Holding; ?>')"></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $RF; ?>" alt="RF Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $RF; ?>')"></td>
											<td class="text-center"> <img src="../../img/documents/<?php echo $ID; ?>" alt="ID Image" style="width: 35px; height: 35px; cursor: pointer;" onclick="enlargeImg('../../img/documents/<?php echo $ID; ?>')"></td>
                                            <td><?php echo $date; ?></td>
											<td><?php echo $agent; ?></td>
											<td><?php echo $status; ?></td>

											<td>
                                                <button class="btn btn-success bookbtn">Book</button>
                                                <button class="btn btn-danger removebtn">Remove</button>
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

		document.getElementsByClassName('closeBtn')[0].onclick = function () {
			document.getElementById('imageModal').style.display = 'none';
		};
	</script>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
	<script src="../../js/app.js"></script>

	<script>
         $(document).ready(function () {
         
             $('.removebtn').on('click', function () {
         
                 $('#rejectBookingModal').modal('show');
         
                 $tr = $(this).closest('tr');
         
                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();
         
                 console.log(data);
         
                 $('#delete_id').val(data[0]);
         
             });
         });
      </script>

	<script>
         $(document).ready(function () {
         
             $('.bookbtn').on('click', function () {
         
                 $('#addPriceModal').modal('show');
         
                 $tr = $(this).closest('tr');
         
                 var data = $tr.children("td").map(function () {
                     return $(this).text();
                 }).get();
         
                 $('#addprice_id').val(data[0]);
                 $('#firstname').val(data[1]);
                 $('#unitcode').val(data[2]);
				 $('#amount').val(data[3]);
				 $('#RA').val(data[4]);
				 $('#Holding').val(data[5]);
                 $('#RF').val(data[6]);
				 $('#ID').val(data[7]);
				 $('#Transaction_date').val(data[8]);
                 $('#agent').val(data[9]);
				 $('#status').val(data[10]);
				 

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