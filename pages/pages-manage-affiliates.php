<?php
	include "../php/session.php";
	require "../php/connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../img/icons/logo.png" />

	<title>Statistics | SMDC JQB</title>

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

					<?php
						include "navbar.php";
					?>

					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong class="title-dashboard">Affiliates</strong> Dashboard</h1>

                    <div class="row mb-0">
						<div class="col-12 col-md-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Manage Affiliates</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr class="text-center">
											<th>Name</th>
											<th>Unit Code</th>
											<th>Amount</th>
											<th>Role</th>
											<th>Date</th>
                                            <th>Override Commission</th>
										</tr>
									</thead>
									<tbody>
										<tr class="text-center">
											<td>1</td>
											<td>1</td>
											<td>1</td>
											<td>1</td>
                                            <td>1</td>
											<td>1</td>
										</tr>

                                        
										
										
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
	<script src="../js/script.js"></script>


</body>

</html>