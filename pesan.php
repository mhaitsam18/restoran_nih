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
	<title>Pemesanan</title>
</head>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pelanggan'])) {
	$username=$_SESSION['username'];
		$total_harga = $_SESSION['total_harga']+(10*$_SESSION['total_harga']/100);
		$total_harga = $total_harga - (15*$total_harga/100);
	if (isset($_SESSION['member'])) {
	} elseif (isset($_SESSION['guest'])) {
		$total_harga = $_SESSION['total_harga']+(10*$_SESSION['total_harga']/100);
	}
	if (isset($_SESSION['transaksi'])) {
		$koneksi->update_totalPembayaran($total_harga);
		// $sql="UPDATE `pembayaran` SET `total_harga`=$total_harga,`status`='Belum Lunas' WHERE username='$_SESSION[username]'";
		// $result=$conn->query($sql);
	} else{
		$_SESSION['transaksi']='transaksi';
		$koneksi->insert_dataPembayaran($username, $total_harga);
		// $sql="INSERT INTO `pembayaran`(`username`, `total_harga`, `status`) VALUES ('$username',$total_harga,'Belum Lunas')";
		// $result=$conn->query($sql);
		$ada = $koneksi->select_dataPembayaranLimit();
		// $sql="SELECT * FROM `pembayaran` ORDER BY `kode_bayar` DESC LIMIT 1";
		// $result=$conn->query($sql);
		$row=$ada->fetch_assoc();
		$_SESSION['kode_bayar']=$row['kode_bayar'];
	}

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
						<a class="nav-link" href="struk.php">Lihat Struk <span class="sr-only">(current)</span></a>
					</li>
					<?php if (isset($_SESSION['member'])): ?>
					<li class="nav-item">
						<a class="nav-link" href="bayar_nih.php">Bayar Via PayNih/BayarNih</a>
					</li>
					<?php endif ?>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Bayar di Kasir & Log Out</a>
					</li>
				</ul>
			</div>
		</nav>
		<h1>Pemesanan Sukses</h1>
		<h2>Silahkan Tunggu Pesanan Anda</h2>
		<h3>Selamat Menikmati</h3>
<?php
} else{
	echo "Anda tidak memiliki hak akses, silahkan Log In ter lebih dahulu ";
echo "<a href=login_nih.php>LogIn</a>";
}

?>
</body>
</html>