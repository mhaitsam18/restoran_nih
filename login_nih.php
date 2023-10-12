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
	<title>Log In nih</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 	<a class="navbar-brand" href="login_nih.php">Restoran Nih</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  	</button>
	</nav>
	<h1>Makan Enak dan Murah Hanya di Retoran Nih</h1>
	<center>	
	<h3>Masuk sebagai</h3><br>
<a href="login_pegawai.php" class="btn btn-outline-primary">Pegawai</a>
<a href="login_pelanggan.php" class="btn btn-outline-primary">Pelanggan</a>
<br><br><br>
	</center>
	<section class="konten">
	<div class="container">
		<div class="row">
		<?php 
		$ada = $koneksi->select_dataMenu();
		// $sql="SELECT * FROM menu";
		// $result = $conn->query($sql);
		while ($row = $ada->fetch_assoc()) { ?>
			<div class="col-md-3">
				<div class="thumbnail"> 
					<div> <img  src="<?=$row['foto']?>" width="250" height="250"> </div>
					<div class="caption">
						<h3> <?php echo $row['nama_menu']; ?> </h3>
						<h5> Rp. <?php echo number_format($row['harga']); ?>,00 </h5>
						<a href="login_pelanggan.php" class="btn btn-primary"> Beli </a>
					</div>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
</section>

</body>
</html>
<?php
}
?>