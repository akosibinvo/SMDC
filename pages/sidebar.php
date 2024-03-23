<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
        <nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="../index.php">
          			<span class="d-flex align-middle justify-content-center"> <img class="smdc-logo" src="../img/icons/logo-blue.png" alt=""> </span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item <?= $page == "index.php"? 'active':''; ?>">
						<a class="sidebar-link" href="../index.php">
              			<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>

					<li class="sidebar-item <?= $page == "pages-statistics.php"? 'active':''; ?>">
						<a class="sidebar-link" href="pages-statistics.php">
              				<i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Statistics</span>
            			</a>
					</li>

					<li class="sidebar-header">
						Manage
					</li>

					<li class="sidebar-item <?= $page == "pages-sales.php"? 'active':''; ?>">
						<a class="sidebar-link" href="pages-sales.php">
              				<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Sales</span>
            			</a>
					</li>

					<li class="sidebar-item <?= $page == "pages-booking.php"? 'active':''; ?>">
						<a class="sidebar-link" href="pages-booking.php">
              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
            			</a>
					</li>

					<?php
						$user_role = $agent_role;

						// Check if the user's role is "imp"
						if ($user_role === "IMP") {
							// If the user's role is "imp", display the HTML code
						?>
							<li class="sidebar-item <?= $page == "pages-manage-affiliates.php" ? 'active' : ''; ?>">
								<a class="sidebar-link" href="pages-manage-affiliates.php">
									<i class="align-middle" data-feather="users"></i> <span class="align-middle">Manage Affiliates</span>
								</a>
							</li>
						<?php
						}
					?>


					<li class="sidebar-header">
						Settings
					</li>

					<li class="sidebar-item <?= $page == "pages-profile.php" || $page == "pages-profile-imp.php" ? 'active':''; ?>">
                    	<a class="sidebar-link" href="<?php echo ($agent_role === 'SA1' || $agent_role === 'SA2') ? 'pages-profile.php' : 'pages-profile-imp.php'; ?>">

              				<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            			</a>
					</li>

					<li class="sidebar-item <?= $page == "pages-profile-2.php" ? 'active':''; ?>">
						<a class="sidebar-link" href="pages-profile-2.php">
              				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            			</a>
					</li>

				</ul>
			</div>
		</nav>
</body>
</html>