<?php
	require "../php/connection.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="shortcut icon" href="../img/icons/logo.png" />

	<title>Profile | SMDC JQB</title>

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
						

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">
									<?php
										echo $fullname
									?>
								</span>
							</a>

							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="../img/avatars/avatar-4.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">Vanessa Tucker</h5>
									<div class="text-muted mb-2">SA1</div>

									<div>
										<a class="btn btn-primary btn-sm px-2" href="#"><span data-feather="edit"></span> Edit</a>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">Pasig</a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">Easysell</a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Philippines</a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">Elsewhere</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">staciehall.co</a></li>
										<li class="mb-1"><a href="#">Twitter</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card bg-transparent" style="box-shadow: none;">
									<h5 class="card-title mb-0">Acount Status</h5>
								<div class="card-body mb-0">
									<div class="row">
										<div class="col-md-6 col-lg-3 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Total Sales</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> 1,000,000 </h1>
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Commissions</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> 1,000,000 </h1>
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Unit Sold</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> 5 </h1>
												</div>
											</div>
										</div>

										<div class="col-md-6 col-lg-3 mx-auto">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0 mb-3">
															<h5 class="card-title" style="font-size: .9em;">Status</h5>
														</div>
													</div>
													<h1 class="mb-3 text-center" style="font-weight: bold;"> IMP </h1>
												</div>
											</div>
										</div>

										<div class="col-md-12 col-xl-12">
											<div class="card" style="position: relative;">
												<div class="card-body" >
													<div class="row">
														<div class="col mt-0 mb-3">
															<h1 class="h4 mb-3"><strong class="title-dashboard">Refer</strong> Clients</h1>
                                                            <h4 class="fw-bold mb-3"> Earn Commission Based Points </h4>
                                                            <p class="mb-0" style="font-size: .85em;"> Earn 1.5% Commission for any SA1 you introduce.</p>
                                                            <p class="mb-4" style="font-size: .85em;">Join the program, then someone will reach out to get you started. </p>
                                                            <div class="container mb-4 p-0">
                                                                <div class="row">
                                                                    <div class="col text-start">
                                                                        <a href="#" class="btn btn-primary background-blue rounded-pill">Join the Referral Program</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-n3" style="font-size: .65em;"> Up to max 12% per client. Learn more about referral. </p>

                                                            <div class="col text-end">
                                                                <img src="../img/photos/referral-2.png" alt="" class="referral-img">
                                                            </div>

														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12 col-md-12 d-flex">
											<div class="card flex-fill">
												<div class="card-header">
				
													<h5 class="card-title mb-0">Transaction History</h5>
												</div>
												<table class="table table-hover my-0">
													<thead>
														<tr>
															<th>Name</th>
															<th>Unit Code</th>
															<th>Date</th>
															<th>Status</th>
															<th>Seller</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Sample</td>
															<td>Unit 1</td>
															<td>31/06/2023</td>
															<td>Pending</td>
															<td>Vanessa Tucker</td>
														</tr>
														
														
													</tbody>
												</table>
											</div>
										</div>
										
									</div>

                                    <div class="row mb-3">
                                        <!-- <div class="col-lg-4 col-md-12 col-sm-12 ">
                                            <div class="card flex-fill" style="height: 180px;">
                                                <div class="card-header background-blue">
                                                    <h5 class="card-title mb-0 text-white text-center">Referral Code</h5>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-center" style="font-size: .85em;">Share the code below to get commission points</p>
                                                    
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" value="KYb3HG43n"  id="inputField" style="color:#0030ff; font-weight: bold;" readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" onclick="copyText()" style="font-size: 1.5em;"><i class="align-middle text-white" data-feather="copy"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-lg-12 col-md-12 col-sm-12 mb-0">
                                            <div class="card flex-fill" style="height: 180px;">
                                                <div class="card-body custom-bg rounded">
													<h5 class="card-title text-white mb-4" style="font-size: .8em">Your client referral stats</h5>
                                                    <div class="row">

                                                        <div class="col-md-6 col-sm-12">
															<div class="row ">
																<div class="col-auto">
																	<div class="custom-stat">
																		<i class="align-middle" data-feather="star">500</i>
																	</div>
																</div>
																<div class="col-auto mb-2">
																	<h1 class="fw-bold text-white" style="letter-spacing: 1px; font-size: 2.5em;">5,000</h1>
																</div>

																<h5 class="text-white mb-4" style="font-size: .9em;">Commission Points earned</h5>
															</div>
                                                            
                                                        </div>
    
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="row">
                                                                <div class="col-auto ">
																	<div class="custom-stat">
																		<i class="align-middle" data-feather="user"></i>
																	</div>
																</div>
																<div class="col-auto mb-2">
																	<h1 class="fw-bold text-white" style="letter-spacing: 1px; font-size: 2.5em;">100</h1>
																</div>

																<h5 class="text-white" style="font-size: .9em;">Clients Referred</h5>
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
    <script>
        function copyText() {
          var inputField = document.getElementById('inputField');
          inputField.select();
          document.execCommand('copy');
          alert('Text copied to clipboard!');
        }
      </script>

</body>

</html>