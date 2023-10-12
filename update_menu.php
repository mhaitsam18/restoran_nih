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
	<title>Update Menu</title>

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
	if (isset($_POST['simpan'])) {
		$menu_id   =$_POST['menu_id'];
		$nama_menu =$_POST['nama_menu'];
		$harga     =$_POST['harga'];
		$rating    =$_POST['rating'];
		$sql         ="UPDATE menu SET nama_menu='$nama_menu', harga=$harga, rating=$rating WHERE menu_id='$menu_id';";
		$result=$conn->query($sql);
			if ($result == true) {
					echo "<script> alert('Data menu berhasil diubah');</script>";
			}else {
					echo "<script> alert('Data menu Gagal diubah');</script>";
			}
		echo "<script> location='list_menu.php'; </script>";
	}
} else{
	echo "Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
</body>
</html>