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

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-a" data-bs-toggle="list" href="#a"> Status </a>
                                        <a class="list-group-item list-group-item-action" id="list-b" data-bs-toggle="list" href="#b"> Manage Affiliates</a>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="a" role="tabpanel">
                                                    <h1> A </h1>
                                                </div>

                                                <div class="tab-pane fade" id="b" role="tabpanel">
                                                    <h1> B </h1>
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


</body>

</html>