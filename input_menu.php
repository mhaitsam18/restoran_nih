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
	<title>Input Menu</title>
</head>
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
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
 ?>
		<h1>INPUT MENU</h1>
		<form action="koneksi.php?insert_dataMenu" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="menu_id" value="<?=$row['menu_id']?>">
				<div class="form-group" style="width: 60%;">
					<label for="formGroupExampleInput">ID Menu</label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="menu_id" >
				</div>
				<div class="form-group" style="width: 60%;">
					<label for="formGroupExampleInput">Nama Menu</label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="nama_menu" >
				</div>
				<div class="form-group" style="width: 60%;">
					<label for="formGroupExampleInput2">Harga</label>
					<input type="number" class="form-control" id="formGroupExampleInput2" name="harga">
				</div>
				<div class="form-group" style="width: 60%;">
					<label for="formGroupExampleInput2">Rating</label>
					<input type="number" class="form-control" id="formGroupExampleInput2" name="rating">
				</div>
				<div class="form-group" style="width: 60%;">
					<label for="formGroupExampleInput2">Upload Gambar</label>
					<input type="file" class="form-control" id="formGroupExampleInput2" name="foto">
				</div>
				<a href="list_menu.php" class="btn btn-outline-info">Kembali</a>
				<input type="submit" value="Simpan" name="simpan" class="btn btn-info">
			</form>
<?php 
} else{
	echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
	</body>
	</html>