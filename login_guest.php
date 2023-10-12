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
	<title>Log In Guest</title>
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
	        		<a class="nav-link" href="login_member.php">Log In Member <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
		        	<a class="nav-link disabled" href="login_guest.php" tabindex="-1" aria-disabled="true">Log In Guest</a>
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
						<form action="koneksi.php?loginGuest" method="POST">
							<div class="form-group">
								<label> Nama </label>
								<input type="text" name="guest_name" class="form-control">
							</div>
							<div class="form-group">
								<label> Nomor Meja </label>
								<input type="number" name="no_meja" class="form-control" value="1">
							</div>
							<button class="btn btn-primary" name="login"> Masuk </button>
						</form>
						<a class="btn btn-default" href="registrasi_member.php">Daftar Member</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 
// if (isset($_POST['login'])) {
// 	include_once('koneksi.php');
// 	$guest_name =$_POST['guest_name'];
// 	$sql="INSERT INTO tamu(guest_name) VALUES ('$guest_name')";
// 	$result=$conn->query($sql);
// 	$sql    = "SELECT * FROM tamu WHERE guest_name='$guest_name' ORDER BY guest_id DESC LIMIT 1";
// 	$result = $conn->query($sql);
// 	$row    = $result->fetch_assoc();
// 	$_SESSION['guest_id'] = $row['guest_id'];
// 	$_SESSION['guest_name'] = $guest_name;
// 	$_SESSION['username']   = $_SESSION['guest_name'];
// 	$_SESSION['guest']     = 'guest';
// 	$_SESSION['pelanggan'] = 'pelanggan';
// 	$_SESSION['no_meja'] = $_POST['no_meja'];
// 	if ($result == true) {
// 		header("location: home_pelanggan.php");
// 	} else {
// 		echo "<script> alert('Log In Gagal'); </script>";
// 	}
// 	echo "<a href='login_pelanggan.php'>Kembali</a>";
// 	echo "<a href='login_member.php'>Log In by Member</a>";
//} 

 ?>
</body>
</html>
<?php 

} ?>