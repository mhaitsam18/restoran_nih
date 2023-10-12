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
	<title>Edit Menu</title>
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
if (isset($_SESSION['username']) && isset($_SESSION['pegawai'])) {
	$menu_id = $_GET['menu_id'];
	$ada     = $koneksi->pilih_dataMenu($menu_id);
	// $sql       = "SELECT * FROM menu WHERE menu_id='$menu_id';";
	// $result    = $conn->query($sql);
	$row     = $ada->fetch_assoc();
	?>
		<center>
		<h1>Edit Menu</h1>
		<img src="<?=$row['foto']?>" width="400" height="400"><br>
		<a href="edit_foto_menu.php?menu_id=<?=$row['menu_id']?>">Edit Gambar</a><br>
			<form action="koneksi.php?update_dataMenu" method="POST">
				<input type="hidden" name="menu_id" value="<?=$row['menu_id']?>">
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput">Nama Menu</label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="nama_menu" value="<?=$row['nama_menu']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput2">Harga</label>
					<input type="number" class="form-control" id="formGroupExampleInput2" name="harga" value="<?=$row['harga']?>">
				</div>
				<div class="form-group" style="width: 30%;">
					<label for="formGroupExampleInput2">Rating</label>
					<input type="number" class="form-control" id="formGroupExampleInput2" name="rating" value="<?=$row['rating']?>">
				</div>
				<input type="submit" value="Simpan" name="simpan" class="btn btn-info">
			</form>
		</center>
		<?php 
} else{
	echo "Anda tidak memiliki hak akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
	</body>
	</html>