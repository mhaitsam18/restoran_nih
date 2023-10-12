<?php
include_once('koneksi.php');
$koneksi = new koneksi();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>Edit Member</title>
</head>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['member'])) {
	$ada = $koneksi->pilih_dataMember();
	// $sql       = "SELECT * FROM member WHERE username='$_SESSION[username]';";
	// $result    = $conn->query($sql);
	$row       = $ada->fetch_assoc();
	?>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="home_pelanggan.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="profil_member.php">Kembali <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
	<center>
		<h1>Edit Profil</h1>
		<form action="koneksi.php?update_dataMember" method="POST">
				<input type="hidden" name="username" value="<?=$row['username']?>">
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput">Nama Lengkap</label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="nama" value="<?=$row['nama']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput2">Email</label>
					<input type="email" class="form-control" id="formGroupExampleInput2" name="email" value="<?=$row['email']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput2">Nomor Telepon</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" name="no_telp" value="<?=$row['no_telp']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="inputPassword">Password</label>
					<input type="password" class="form-control" id="formGroupExampleInput2" name="password">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="inputPassword">Konfirmasi Password</label>
					<input type="password" class="form-control" id="formGroupExampleInput2" name="konfirmasi">
				</div>
				<input type="submit" value="Simpan" name="simpan" class="btn btn-info">
			</form>
	</center>
<?php 
// if (isset($_POST['simpan'])) {
// 		if ($_POST['password']==$_POST['konfirmasi']) {
// 			include_once('koneksi.php');
// 			$username =$_POST['username'];
// 			$nama =$_POST['nama'];
// 			$email =$_POST['email'];
// 			$no_telp =$_POST['no_telp'];
// 			$password =md5($_POST['password']);
// 			$sql="UPDATE `member` SET `password`='$password',`nama`='$nama',`email`='$email',`no_telp`='$no_telp' WHERE username='$username'";
// 			$result=$conn->query($sql);
// 			if ($result == true) {
// 					echo "Akun Member berhasil diubah <br>";
// 					header("location: profil_member.php");
// 			} else {
// 					echo "Data gagal diubah";
// 			}
// 			echo "<a href='login_member.php'>Log In</a>";
// 		} else {
// 			echo "Error Password";
// 		}
// 	}
 ?>
</body>
<?php
} else{
	echo "Anda tidak memiliki hak akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
} 
?>
</html>