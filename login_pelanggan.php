<?php
include_once('koneksi.php');
$koneksi = new koneksi();
if (isset($_SESSION['pelanggan'])) {
	header("location: home_pelanggan.php");
} elseif (isset($_SESSION['pegawai'])) {
	header("location: home_pegawai.php");
} else{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>Log In Pelanggan</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 	<a class="navbar-brand" href="login_nih.php">Restoran Nih</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="navbar-nav">
	      		<li class="nav-item active">
	        		<a class="nav-link" href="login_pegawai.php">Log In Pegawai <span class="sr-only">(current)</span></a>
				</li>
	      		<li class="nav-item">
		        	<a class="nav-link disabled" href="login_pelanggan.php" tabindex="-1" aria-disabled="true">Log In Pelanggan</a>
		    	</li>
			</ul>
		</div>
	</nav>
	
	<h1>Makan Enak dan Murah Hanya di Retoran Nih</h1>
	<center>
		
	<h3>Masuk sebagai</h3>
	<br>
<a href="login_guest.php" class="btn btn-outline-primary">Guest</a>
<a href="login_member.php" class="btn btn-outline-primary">Member</a>
<br>
<br>
<a href="login_nih.php" class="btn btn-outline-primary">Kembali</a>
	</center>
</body>
</html>
<?php 

} ?>