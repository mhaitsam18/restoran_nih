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
	<title>Log In Pegawai</title>
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
		        	<a class="nav-link disabled" href="login_pegawai.php" tabindex="-1" aria-disabled="true">Log In Pegawai</a>
		    	</li>
	      		<li class="nav-item active">
	        		<a class="nav-link" href="login_pelanggan.php">Log In Pelanggan <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-4"> 
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"> Login Pegawai </h3>
					</div> 
					<div class="panel-body">
						<form action="" method="POST">
							<div class="form-group">
								<label> Username </label>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label> Password </label>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<button class="btn btn-primary" name="login"> Sign In </button>
						</form>
						<a class="btn btn-default" href="registrasi_pegawai.php"> Registrasi </a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
if (isset($_POST['login'])) {
	$ada = $koneksi->select_dataPegawai();
	// $sql      = "SELECT * FROM pegawai;";
	// $result   = $conn->query($sql);
	while ($row=$ada->fetch_assoc()) { 
		if ($_POST['username']==$row['username'] && md5($_POST['password'])==$row['password']) {
			$_SESSION['username']=$row['username'];
			$_SESSION['pegawai']='Pegawai';
			$_SESSION['job']=$row['job'];
			header("location: home_pegawai.php");
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