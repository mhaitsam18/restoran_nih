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
		<title>HOME RESTORAN NIH | PEGAWAI</title>
</head>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
 ?>
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
	<section class="konten">
		<div class="container">

	<h3>Selamat Datang <b><?php echo $_SESSION['username']; ?></b></h3>
		<h1> Menu Restoran NIH </h1>
		<div class="row">
		<?php
			$ada = $koneksi->select_dataMenu();
			// $sql="SELECT * FROM menu";
			// $result = $conn->query($sql);
			while ($row =  $ada->fetch_assoc()) { ?>
			<div class="col-md-3">
				<div class="thumbnail"> 
					<div> <img  src="<?=$row['foto']?>" width="250" height="250"> </div>
					<div class="caption">
						<h3> <?php echo $row['nama_menu']; ?> </h3>
						<h5> Rp. <?php echo number_format($row['harga']); ?>,00 </h5>
					</div>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
</section>

</body>
<?php
} else{
	echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
?>
</html>