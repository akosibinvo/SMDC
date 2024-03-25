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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
	
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

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-xl-3 mb-3">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-a" data-bs-toggle="list" href="#a"> Personal Details </a>
                                        <a class="list-group-item list-group-item-action" id="list-b" data-bs-toggle="list" href="#b"> Manage Password </a>
                                    </div>
                                </div>


                                <div class="col-12 col-xl-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="a" role="tabpanel">
                                                    
												<form action="../admin/include/php/edit-settings.php" method="post" enctype="multipart/form-data">
													<input type="hidden" name="edit_id" id="edit_idt">

													<div class="row">

														<?php
															$sql_profile = "SELECT * FROM users WHERE firstName = '$firstname'";
															$res_profile = mysqli_query($conn, $sql_profile);

															if ($res_profile && mysqli_num_rows($res_profile) > 0) {
																$row = mysqli_fetch_assoc($res_profile);
																$profile_firstname = $row['firstName'];
																$profile_lastname = $row['lastName'];
																$profile_join = $row['dateJoined'];
																$profile_contact = $row['contactNo'];
																$profile_email = $row['email'];

															} else {
																
															}

														?>

														<div class="col-sm-12 col-md-12 px-4">
															<div class="row mb-3">
																<div class="form-group col-md-6">
																	<label class="form-label" for="firstname">Firstname</label>
																	<input class="form-control" type="text" pattern="[A-Za-z\s]+" name="profile_firstname" value="<?php echo $profile_firstname ?>"> 
																</div>

																<div class="form-group col-md-6">
																	<label class="form-label">Lastname</label>
																	<input class="form-control" type="text" pattern="[A-Za-z\s]+"name="profile_lastname" value="<?php echo $profile_lastname ?>">
																</div>
															</div>

															<div class="row">
																<div class="form-group mb-3">
																	<label class="form-label">Contact No.</label>
																	<input class="form-control" type="text" name="profile_contact" value="<?php echo $profile_contact ?>">
																</div>
															</div>

															<div class="row">
																<div class="form-group mb-3">
																	<label class="form-label">Date Joined</label>
																	<input class="form-control" type="text" name="profile_join" value="<?php echo $profile_join ?>" readonly>
																</div>
															</div>

															<div class="row mb-3">
																<div class="form-group mb-3">
																	<label class="form-label">E-mail</label>
																	<input class="form-control" type="text" name="profile_email" value="<?php echo $profile_email ?>">
																</div>
															</div>
													
														</div>

													</div>

													

													<div class="modal-footer">
														<div class="mt-3">
															<button type="submit" name="edit_settings" class="btn btn-primary">Save</button>
														</div>
													</div>

												</form>


                                                </div>

                                                <div class="tab-pane fade" id="b" role="tabpanel">
													<form action="" method="post" enctype="multipart/form-data">
														<input type="hidden" name="update_id" id="update_id">

														<div class="row">

															<div class="col-sm-12 col-md-12 px-4">

																<div class="row">
																	<div class="form-group mb-3">
																		<label class="form-label">Password</label>
																		<input class="form-control" type="text" name="profile_password" value="">
																	</div>
																</div>

																<div class="row">
																	<div class="form-group mb-3">
																		<label class="form-label">Confirm Password</label>
																		<input class="form-control" type="text" name="profile_cpassword" value="" >
																	</div>
																</div>

														
															</div>

														</div>

														

														<div class="modal-footer">
															<div class="mt-3">
															<button type="submit" name="update" class="btn btn-primary">Save</button>
															</div>
														</div>

													</form>
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
	<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

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