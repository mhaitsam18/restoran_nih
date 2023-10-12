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
	<title>Registrasi Pegawai</title>
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
	      		<li class="nav-item active">
	        		<a class="nav-link" href="login_pelanggan.php">Log In Pelanggan <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<h1 style="margin-left: 30px;">Registrasi Calon Pegawai</h1>
	<div class="container">	
		<form action="koneksi.php?insert_dataPegawai" method="POST" enctype="multipart/form-data">
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput">Username</label>
				<input type="text" class="form-control" id="formGroupExampleInput" name="username">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput">Nama Lengkap</label>
				<input type="text" class="form-control" id="formGroupExampleInput" name="nama">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput2">Email</label>
				<input type="email" class="form-control" id="formGroupExampleInput2" name="email">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput2">Nomor Telepon</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" name="no_telp">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput2">Alamat</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" name="alamat">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput2">Jabatan</label>
				<input type="text" class="form-control" id="formGroupExampleInput2" name="job">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="formGroupExampleInput2">Unggah Foto</label>
				<input type="file" class="form-control" id="formGroupExampleInput2" name="foto">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="inputPassword">Password</label>
				<input type="password" class="form-control" id="formGroupExampleInput2" name="password">
			</div>
			<div class="form-group" style="width: 40%;">
				<label for="inputPassword">Konfirmasi Password</label>
				<input type="password" class="form-control" id="formGroupExampleInput2" name="konfirmasi">
			</div>
			<input type="submit" value="Daftar" name="simpan" class="btn btn-info">
	</form>
	</div>
<?php 
// if (isset($_POST['simpan'])) {
// 	$target_dir		= "upload_pegawai/"; // Untuk Foto
// 	$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
// 	$target_file	= $target_dir . $file_name; // Untuk Foto
// 	$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto

// 	if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
// 		if ($_POST['password']==$_POST['konfirmasi']) {
// 			include_once('koneksi.php');
// 			$username =$_POST['username'];
// 			$nama =$_POST['nama'];
// 			$email =$_POST['email'];
// 			$no_telp =$_POST['no_telp'];
// 			$alamat =$_POST['alamat'];
// 			$job =$_POST['job'];
// 			$password =md5($_POST['password']);
// 			$sql="INSERT INTO pegawai(username, password, nama, email, no_telp, alamat, job, foto) VALUES ('$username','$password', '$nama', '$email', '$no_telp', '$alamat', '$job', '$target_file')";
// 			$result=$conn->query($sql);
// 			if ($result == true) {
// 					echo "<script> alert('Akun Pegawai berhasil dibuat');</script>";
// 			} else {
// 					echo "<script> alert('Akun Pegawai gagal dibuat');</script>";
// 			}
// 			echo "<script> location='login_pegawai.php'; </script>";
// 		} else {
// 			echo "<script> alert('Pastikan Password & konfirmasi password sama');</script>";
// 		}
// 	} else {
// 		echo "<script> alert('Foto Gagal diunggah');</script>";
// 	}
// } 

 ?>
</body>
</html>
<?php 
} ?>