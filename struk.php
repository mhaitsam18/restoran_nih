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
	<title>Struk</title>
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
				<?php if (isset($_SESSION['member'])): ?>
				<li class="nav-item">
					<a class="nav-link" href="bayar_nih.php">Bayar Via BayarNih</a>
				</li>
				<?php endif ?>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Keluar / Log Out</a>
				</li>
			</ul>
		</div>
	</nav>	
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pelanggan'])) {
	if (isset($_SESSION['member'])) {
		$ada = $koneksi->pilih_PemesananMemberJoin();
		// $sql="SELECT *, nama_menu, harga FROM `pemesanan_member` JOIN menu USING(menu_id) WHERE username='$_SESSION[username]'";
		// $result    = $conn->query($sql);
	} elseif (isset($_SESSION['guest'])) {
		$ada = $koneksi->pilih_PemesananTamuJoin();
		// $sql="SELECT *, nama_menu, harga FROM `pemesanan_tamu` JOIN menu USING(menu_id) WHERE guest_id='$_SESSION[guest_id]'";
		// $result    = $conn->query($sql);
	}
	 ?>
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
	}
	$pajak= $total_harga*(10/100);
	$total_harga+=$pajak;?>
 		<tr>
 			<td align="left">Pajak</td>
 			<td>10%</td>
 			<td align="right"><?php echo "Rp.".number_format($pajak).",00"; ?></td>
 		</tr>
 		<?php
 		if (isset($_SESSION['member'])) {
 			$diskon_member=$total_harga*(15/100);
			$total_harga-+$diskon_member;
 ?>
 		<tr>
 			<td align="left">Diskon Member</td>
 			<td>15%</td>
 			<td align="right"><?php echo "Rp.".number_format($diskon_member).",00"; ?></td>
 		</tr>
 		<?php } ?>
		<tr>
			<td colspan="2">Total</td>
			<td><?php echo "Rp.".number_format($total_harga).",00"; ?></td>			
		</tr>
</table>
<?php 

} else{
	echo "Anda tidak memiliki hak akses, silahkan Log In ter lebih dahulu <a href=login_nih.php>Log In</a>";
}
?>
</body>
</html>