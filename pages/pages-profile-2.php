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

	<title>Profile | SMDC JQB</title>

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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
					</div>

					<div class="row">
						<div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header p-0 overflow-hidden border-0" style="height: 180px;">
                                   <img src="../img/avatars/1.png" alt="" class="cover-photo">
                                </div>

                                <div class="card-body" style="height: 180px;">

                                <div class="custom-div">
                                    <div class="custom-profile">
                                        <div class="profile-pic" >
                                            <img src="../img/avatars/1.png" alt="">
                                        </div>
                                    </div>

                                    <div class="custom-edit">
                                        <button type="button" class="btn btn-primary background-blue rounded-pill custom-edit-btn" data-bs-toggle="modal" data-bs-target="#editProfileDetails"> Edit </button>
                                    </div>
                                </div>
                                
                                <div class="profile-details">
                                    <p class="profile-name fw-bold">Roy Gumban</p>
                                    <p class="profile-email">samplemail@gmail.com</p>
                                </div>
								
								<div class="camera-input">
									<input type="file" id="fileInput" style="display: none;">

									<label for="fileInput" style="cursor: pointer;">
										<i class="align-middle" data-feather="camera"></i>
									</label>

									<div id="fileName"></div>
								</div>
                                    
                            </div>
                        </div>
                    </div>

								<!-- <div class="row p-0 mx-auto">

									<div class="col-md-6 col-xl-6">
										<div class="card">
											<div class="card-body unit-bg">
												<div class="row">
													<div class="col mt-0 mb-3">
														<h5 class="card-title text-white" style="font-size: 1em;">Override Commissions</h5>
													</div>
												</div>

												<?php
													$sql_total_coms = "SELECT SUM(Commissions) AS total_coms FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
													$res_total_coms = mysqli_query($conn, $sql_total_coms);

													if ($res_total_coms) {
														$row = mysqli_fetch_assoc($res_total_coms);
														$total_coms = $row['total_coms'];
												

													} else {
														echo "Error: " . mysqli_error($conn);
													}
												?>

												<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;">₱ <?php echo number_format($total_coms) ?></h1>

											</div>
										</div>
									</div>

										<div class="col-md-6 col-xl-6">
											<div class="card">
												<div class="card-body status-bg">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title text-white" style="font-size: 1em;">Status</h5>
														</div>
													</div>
													<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;"> <?php echo $agent_role;?> </h1>
												</div>
											</div>
										</div>
								</div>

                    			<div class="col-md-12 col-xl-12">
									<div class="card" style="position: relative;">
										<div class="card-body" >
											<div class="row">
												<div class="col mt-0 mb-3">
													<h1 class="h4 mb-3"><strong class="title-dashboard">Recruit</strong> Affiliates </h1>
													<h4 class="fw-bold mb-3"> Earn Commission Based Points </h4>
													<p class="mb-0" style="font-size: .85em;"> Earn 1.5% Commission for any affiliates under you.</p>
													<p class="mb-4" style="font-size: .85em;"> As your affiliates generate sales or meet performance targets, you'll earn points based on <br> their success. </p>
													<div class="container mb-4 p-0">
														<div class="row">
															<div class="col text-start">
																<a href="#" class="btn btn-primary background-blue rounded-pill">Join the Affiliate Program</a>
															</div>
														</div>
													</div>
													<p class="mb-n3" style="font-size: .65em;"> Up to max 12% per affiliates. Join Now!  </p>

													<div class="col text-end">
														<img src="../img/photos/referral-2.png" alt="" class="referral-img">
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>

								<div class="row p-0 mx-auto">
									<div class="col-12 col-md-12">
										<div class="card flex-fill">
											<div class="card-header">
												<h5 class="card-title mb-0 text-white">Manage Affiliates</h5>
											</div>
											<table class="table table-hover my-0">
												<thead>
													<tr class="text-center">
														<th>Name</th>
														<th>Status</th>
														<th>Unit Sold</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<tr class="text-center">
														<td>Sample</td>
														<td>Unit 1</td>
														<td>31/06/2023</td>
														<td>Vanessa Tucker</td>
													</tr>
													
													
												</tbody>
											</table>
										</div>
									</div>
									
								</div> -->

                                <div class="row px-3 mx-auto">
                                    <div class="col-md-12">
                                        <div class="row p-0">

											<ul class="nav nav-tabs" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" id="status" data-toggle="tab" href="#status-tab" role="tab" aria-controls="status" aria-selected="true">Status</a>
												</li>

												<li class="nav-item">
													<a class="nav-link" id="profile-tab" data-toggle="tab" href="#recruit" role="tab" aria-controls="recruit" aria-selected="false">Recruit Affiliates</a>
												</li>

												<li class="nav-item">
													<a class="nav-link" id="contact-tab" data-toggle="tab" href="#manage" role="tab" aria-controls="manage" aria-selected="false">Manage Affiliates</a>
												</li>
											</ul>


                                            <div class="col-12 mt-4 p-0 m-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="tab-content">

															<div class="tab-pane fade show active" id="status-tab" role="tabpanel" aria-labelledby="status">

																<div class="row p-0 mx-auto">
																	<div class="card-header bg-white">
																		<h5 class="card-title mb-0">Account Status</h5>
																	</div>
																	
																	<div class="col-md-6 col-xl-6">
																		<div class="card">
																			<div class="card-body unit-bg">
																				<div class="row">
																					<div class="col mt-0 mb-3">
																						<h5 class="card-title text-white" style="font-size: 1em;">Override Commissions</h5>
																					</div>
																				</div>

																				<?php
																					$sql_total_coms = "SELECT SUM(Commissions) AS total_coms FROM transaction_booking WHERE status = 'Booked' AND user_id = '$id' ";
																					$res_total_coms = mysqli_query($conn, $sql_total_coms);

																					if ($res_total_coms) {
																						$row = mysqli_fetch_assoc($res_total_coms);
																						$total_coms = $row['total_coms'];
																				

																					} else {
																						echo "Error: " . mysqli_error($conn);
																					}
																				?>

																				<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;">₱ <?php echo number_format($total_coms) ?></h1>

																			</div>
																		</div>
																	</div>

																	<div class="col-md-6 col-xl-6">
																		<div class="card">
																			<div class="card-body status-bg">
																				<div class="row">
																					<div class="col mt-0 mb-3">
																						<h5 class="card-title text-white" style="font-size: 1em;">Status</h5>
																					</div>
																				</div>
																				<h1 class="mt-1 mb-3 text-center text-white" style="font-weight: bold;"> <?php echo $agent_role;?> </h1>
																			</div>
																		</div>
																	</div>

																</div>
															</div>

															<div class="tab-pane fade" id="recruit" role="tabpanel" aria-labelledby="profile-tab">
																<div class="col-md-12 col-xl-12">
																	<div class="card shadow-none" style="position: relative;">
																		<div class="card-body" >
																			<div class="row">
																				<div class="col mt-0 mb-3">
																					<h1 class="h4 mb-3"><strong class="title-dashboard">Recruit</strong> Affiliates </h1>
																					<h4 class="fw-bold mb-3"> Earn Commission Based Points </h4>
																					<p class="mb-0" style="font-size: .85em;"> Earn 1.5% Commission for any affiliates under you.</p>
																					<p class="mb-4" style="font-size: .85em;"> As your affiliates generate sales or meet performance targets, you'll earn points based on <br> their success. </p>
																					<div class="container mb-4 p-0">
																						<div class="row">
																							<div class="col text-start">
																								<a href="#" class="btn btn-primary background-blue rounded-pill">Join the Affiliate Program</a>
																							</div>
																						</div>
																					</div>
																					<p class="mb-n3" style="font-size: .65em;"> Up to max 12% per affiliates. Join Now!  </p>

																					<div class="col text-end">
																						<img src="../img/photos/referral-2.png" alt="" class="referral-img">
																					</div>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>

															<div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="profile-tab">
																<div class="row p-0 mx-auto">
																	<div class="col-12 col-md-12">
																		<div class="card flex-fill shadow-none">
																			<div class="card-header bg-white ">
																				<h5 class="card-title mb-3">Manage Affiliates</h5>
																			</div>
																			<table class="table table-hover my-0">
																				<thead>
																					<tr class="text-center">
																						<th>Name</th>
																						<th>Status</th>
																						<th>Unit Sold</th>
																						<th>Date</th>
																					</tr>
																				</thead>
																				<tbody>
																					<tr class="text-center">
																						<td>Sample</td>
																						<td>Unit 1</td>
																						<td>31/06/2023</td>
																						<td>Vanessa Tucker</td>
																					</tr>
																					
																					
																				</tbody>
																			</table>
																		</div>
																	</div>
																	
																</div>
															</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
					
					</div>

				</div>
			</main>

		</div>
	</div>

	<script src="../js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			// Get the active tab from local storage if available
			var activeTab = localStorage.getItem('activeTab');
			if(activeTab){
			$('#myTab a[href="' + activeTab + '"]').tab('show');
			}

			// Store the active tab in local storage when a new tab is shown
			$('#myTab a').on('shown.bs.tab', function (e) {
			var tab = $(e.target).attr('href');
			localStorage.setItem('activeTab', tab);
			});
		});
	</script>

	
	<script>
	document.getElementById('fileInput').addEventListener('change', function() {
		// Display selected file name
		document.getElementById('fileName').innerText = this.files[0].name;
	});
	</script>

</body>

</html>