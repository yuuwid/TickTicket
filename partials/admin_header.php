<?php  ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/styles_admin.css">
	<link rel="stylesheet" href="../assets/css/colors.css">
	<link rel="stylesheet" href="../assets/css/font-family.css">

	<title>TickTicket</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
		<a class="navbar-brand pl-4 pr-4" href="./"><i class="fa fa-at"></i> <b>Admin</b></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="./">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./users_management.php">Management User</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./tiket_management.php">Management Tiket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./akomodasi_management.php">Management Akomodasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./history_transaksi.php">Histori Transaksi</a>
				</li>
                
			</ul>
			<div class="btn-group my-2 my-lg-0">
				<a type="button" class="btn dropdown-toggle mr-sm-2 text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Akun
				</a>
				<div class="dropdown-menu dropdown-menu-left dropdown-menu-lg-right">
					<a class="dropdown-item" href="profile.php"><i class="fa fa-user pr-2"></i> Profile</a>

					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="../logout.php"><i class="fa fa-feather pr-2"></i> Keluar</a>

				</div>
			</div>
		</div>
		<!-- <p class="m-auto pr-2">Profile</p> -->
	</nav>