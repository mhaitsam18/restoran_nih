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
		<title>Bayar Nih</title>
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
						<a class="nav-link" href="pesan.php">Menu Pemesanan <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Keluar / Log Out</a>
					</li>
				</ul>
			</div>
		</nav>	
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['member'])) {
	$ada = $koneksi->pilih_dataMember();
	// $sql="SELECT * FROM `member` WHERE username='$_SESSION[username]'";
	// $result    = $conn->query($sql);
	$row       = $ada->fetch_assoc();
	$saldo     = $row['saldo'];
	echo "<b>Saldo : Rp.".number_format($saldo).",00</b>";
	$ada = $koneksi->pilih_PemesananMemberJoin();
	// $sql="SELECT *, nama_menu, harga FROM `pemesanan_member` JOIN menu USING(menu_id) WHERE username='$_SESSION[username]'";
	// $result = $conn->query($sql);
	 ?>
	<br>
	<table>
	<?php
	$total_harga=0;
	while ($row=$ada->fetch_assoc()) {?>
		<tr>
			<td width="100" align="left"><?php echo $row['nama_menu']; ?></td>
			<td align="right"><?php echo $row['jumlah']." X"; ?></td>
			<td align="right"><?php echo "Rp.".number_format($row['sub_harga']).",00"; ?></td>
		</tr>
		<?php
		$total_harga+=$row['sub_harga'];
	} $pajak= $total_harga*(10/100);
	$total_harga+=$pajak;
	?>
 		<tr>
 			<td align="left">Pajak</td>
 			<td align="right">10%</td>
 			<td align="right"><?php echo "Rp.".number_format($pajak).",00"; ?></td>
 		</tr>
 		<?php
	$diskon_member=$total_harga*(15/100);
	$total_harga-=$diskon_member;
 ?>
 		<tr>
 			<td align="left">Diskon Member</td>
 			<td align="right">15%</td>
 			<td align="right"><?php echo "Rp.".number_format($diskon_member).",00"; ?></td>
 		</tr>
		<tr>
			<td colspan="2">Total</td>
			<td align="right"><?php echo "Rp.".number_format($total_harga).",00"; ?></td>			
		</tr>
<form action="" method="POST">
	<tr>
		<td align="right">
			<a href="pesan.php" class="btn btn-danger">Kembali</a>
		</td>
		<td colspan="2" align="right">
		<button name="bayar" class="btn btn-success">Bayar</button>
		</td>
	</tr>
</form><br>
</table>
<?php 
if (isset($_POST['bayar'])) {
	$ada = $koneksi->pilih_dataMember();
	// $sql="SELECT * FROM `member` WHERE username='$_SESSION[username]'";
	// $result    = $conn->query($sql);
	$row       = $ada->fetch_assoc();
	$saldo     = $row['saldo'];
	echo $saldo;
	if ($saldo >= $total_harga) {
		$saldo -= $total_harga;
		$koneksi->update_saldoMember($saldo);
		// $sql    = "UPDATE `member` SET `saldo`=$saldo WHERE username='$_SESSION[username]'";
		// $result = $conn->query($sql);
		$koneksi->update_statusPembayaran();
		// $sql    = "UPDATE `pembayaran` SET `status`='Lunas' WHERE kode_bayar='$_SESSION[kode_bayar]'";
		// $result = $conn->query($sql);
		echo "<script> alert('Transaksi Anda berhasil'); </script>";
		echo "<script> location='logout.php'; </script>";
	} else{
		echo "<script> alert('Saldo Anda tidak mencukupi, silahkan Top Up di kasir atau gunakan metode pembayaran lain'); </script>";
		echo "<script> location='pesan.php'; </script>";
	}
}

} else{
	echo "Anda tidak memiliki hak akses, silahkan Log In ter lebih dahulu <a href=login_nih.php>Log In</a>";
}
?>
</body>
</html>