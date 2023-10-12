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
	<title>Profil Member</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="home_pelanggan.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="logout.php">Log Out <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['member'])) {
	$ada = $koneksi->pilih_dataMember();
	// $sql="SELECT * FROM member WHERE username='$_SESSION[username]'";
	// $result = $conn->query($sql);
	$row    = $ada->fetch_assoc();?>
	<center>
		<img src="<?=$row['foto']?>"><br>
		<a href="edit_foto_member.php" class="btn btn-outline-primary">Ganti Foto</a>
		<a href="edit_member.php" class="btn btn-outline-primary">Edit Data</a>
		<table>
			<tr>
				<td>Username</td>
				<td> : </td>
				<td><?php echo $row['username']; ?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td> : </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td> : </td>
				<td><?php echo $row['no_telp']; ?></td>
			</tr>
			<tr>
				<td>Saldo Anda</td>
				<td> : </td>
				<td><?php echo "Rp.".number_format($row['saldo']).",00"; ?></td>
			</tr>
		</table>
	</center>
		<?php

	} else{
	echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
	}
 ?>

</body>
</html>