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
	<title>Log In Member</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 	<a class="navbar-brand" href="login_nih.php">Restoran Nih</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    	<ul class="navbar-nav">
		    	<li class="nav-item">
		        	<a class="nav-link disabled" href="login_member.php" tabindex="-1" aria-disabled="true">Log In Member</a>
		    	</li>
	      		<li class="nav-item active">
	        		<a class="nav-link" href="login_guest.php">Log In Guest <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<h1>Selamat Datang di Restoran Nih</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-4"> 
				<div class="panel panel-default">
					<div class="panel-heading">
					</div> 
					<div class="panel-body">
						<form action="" method="POST">
							<div class="form-group">
								<label> Username </label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label> Password </label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<label> Nomor Meja </label>
								<input type="number" name="no_meja" class="form-control" value="1">
							</div>
							<button class="btn btn-primary" name="login"> Log In </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="registrasi_member.php" style="margin-left: 220px">Registrasi</a>
<?php
if (isset($_POST['login'])) {
	$ada = $koneksi->select_dataMember();
	// $sql      = "SELECT * FROM member;";

	while ($row=$ada->fetch_assoc()) { 
		if ($_POST['username']==$row['username'] && md5($_POST['password'])==$row['password']) {
			$_SESSION['username']=$row['username'];
			$_SESSION['member']='member';
			$_SESSION['pelanggan']='pelanggan';
			$_SESSION['gakbisa']=true;
			$ada = $koneksi->select_mejaMember();
			// $sql      = "SELECT no_meja FROM pemesanan_member;";
			// $result   = $conn->query($sql);
			while ($row_m = $ada->fetch_assoc()) {
				if ($_POST['no_meja']==$row_m['no_meja']) {
					$_SESSION['gakbisa']=false;
				}
			}
			$ada = $koneksi->select_mejaTamu();
			// $sql      = "SELECT no_meja FROM pemesanan_tamu;";
			// $result   = $conn->query($sql);
			while ($row_g = $ada->fetch_assoc()) {
				if ($_POST['no_meja']==$row_m['no_meja']) {
					$_SESSION['gakbisa']=false;
				}
			}

			if ($_SESSION['gakbisa']==true) {
				$_SESSION['no_meja']=$_POST['no_meja'];
				echo "<script> alert('The seat available'); </script>";
				echo "<script> location='home_pelanggan.php'; </script>";
			} else{
				echo "<script> alert('The seat was reserved'); </script>";
				echo "<script> location='login_member.php'; </script>";
				session_destroy();
			}
			break;
		} else{
			
		}
	}
	if (empty($_SESSION['username'])) {
		echo "<script> alert('Username atau Password Salah'); </script>";
		session_destroy();
	}
}
 ?>
</body>
</html>
<?php 
}
 ?>