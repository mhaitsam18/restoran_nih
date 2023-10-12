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
	<title>Edit Pegawai</title>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="home_pegawai.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="profil_pegawai.php">Profil <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="list_pegawai.php">List Pegawai</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="list_member.php">List Member</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="list_menu.php">List Menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="list_transaksi.php">List Transaksi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
	<?php
if (isset($_SESSION['username']) && isset($_SESSION['pegawai'])) {
	$ada = $koneksi->pilih_dataPegawai();
	// $sql       = "SELECT * FROM pegawai WHERE username='$_SESSION[username]';";
	// $result    = $conn->query($sql);
	$row       = $ada->fetch_assoc();
	?>
	<center>
		<h1>Edit Profil</h1>
			<form action="koneksi.php?update_dataPegawai" method="POST">
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
					<label for="formGroupExampleInput2">Alamat</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" name="alamat" value="<?=$row['alamat']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput2">Jabatan</label>
					<input type="text" class="form-control" id="formGroupExampleInput2" name="job" value="<?=$row['job']?>">
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
// 			$alamat =$_POST['alamat'];
// 			$job =$_POST['job'];
// 			$password =md5($_POST['password']);
// 			$sql="UPDATE `pegawai` SET `password`='$password',`nama`='$nama',`email`='$email',`no_telp`='$no_telp',`alamat`='$alamat',`job`='$job' WHERE username='$username'";
// 			$result=$conn->query($sql);
// 			if ($result == true) {
// 					echo "<script> alert('Data profil berhasil diubah');</script>";
// 			}else {
// 					echo "<script> alert('Data profil Gagal diubah');</script>";
// 			}
// 		echo "<script> location='profil_pegawai.php'; </script>";
// 		} else {
// 			echo "<script> alert('Pastikan Password dan Konfirmasi sudah sama');</script>";
// 		}
// } 
?>
</body>
<?php 
} else{
	echo "Anda tidak memiliki hak akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
</html>