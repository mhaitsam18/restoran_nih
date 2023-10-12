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
	<title>Simpan Menu</title>
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
	$target_dir		= "upload_menu/";
	$file_name		= basename($_FILES["foto"]["name"]);
	$target_file	= $target_dir . $file_name; // upload/nama.jpg
	$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
		$menu_id  = $_POST['menu_id'];
		$nama_menu= $_POST['nama_menu'];
		$harga     = $_POST['harga'];
		$rating      = $_POST['rating'];

		$sql="INSERT INTO menu(menu_id, nama_menu, harga, rating, foto) VALUES ('$menu_id','$nama_menu',$harga, $rating, '$target_file')";
		$result=$conn->query($sql);
		if ($result == true) {
			echo "<script> alert('Menu & Gambar berhasil disimpan');</script>";
			echo "<script> location='list_menu.php'; </script>";
		}else {
			echo "<script> alert('Menu Gagal disimpan');</script>";
			echo "<script> location='input_menu.php'; </script>";
		}
			
	} else{
		echo "<script> alert('Gambar gagal diunggah');</script>";
	}
} else{
	echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
</body>
</html>