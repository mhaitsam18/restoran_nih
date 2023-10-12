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
	<title>Home</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="home_pelanggan.php">Home</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<?php if (isset($_SESSION['member'])): ?>	
					<li class="nav-item active">
						<a class="nav-link" href="profil_member.php">Profil <span class="sr-only">(current)</span></a>
					</li>
				<?php endif ?>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out & Cancel</a>
				</li>
			</ul>
		</div>
	</nav>	
	<br>
<?php
if (isset($_SESSION['username'])||isset($_SESSION['guest_name'])) {
echo "<h3>Selamat Datang <b>".$_SESSION['username']."</b></h3>";
	?>
	<?php
	if (isset($_SESSION['member'])) {
		if (isset($_SESSION['pemesanan_member'])) {
			if (isset($_SESSION['pesan'])) { ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No.</th>
      						<th scope="col">Menu ID</th>
      						<th scope="col">Menu</th>
							<th scope="col">Harga</th>
							<th scope="col">Rating</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Sub Total</th>
							<th scope="col">Aksi</th>
						</tr>
  					</thead>
					<tbody>
				<?php
				$no=1;
				$total_harga=0;
				foreach ($_SESSION['pemesanan_member'] as $menu_id => $jml) {
					$ada = $koneksi->pilih_dataMenu($menu_id);
					// $sql      = "SELECT * FROM menu WHERE menu_id='$menu_id';";
					// $result   = $conn->query($sql);
					$row      = $ada->fetch_assoc();
					$jmlharga = $row['harga']*$jml; ?>
						<tr>
							<th scope="row"><?php echo $no; ?>.</th>
							<td><?php echo $row['menu_id']?></td>
							<td><?php echo $row['nama_menu']?></td>
							<td><?php echo "Rp.".number_format($row['harga']).",00";?></td>
							<td><?php echo $row['rating'];?></td>
							<td><?php echo $jml;?></td>
							<td><?php echo "Rp.".number_format($jmlharga).",00";?></td>
							<td><a href="hapus_pemesanan.php?menu_id=<?=$row['menu_id']?>" class="btn btn-danger">Kurang</a> 
							<a href="tambah_pemesanan.php?menu_id=<?=$row['menu_id']?>" class="btn btn-primary">Tambah</a></td>
						</tr>
					<?php
					$no++;
					$total_harga+=$jmlharga;
					$_SESSION['total_harga']=$total_harga;
				} ?>
						<tr>
							<td colspan="6" align="right">Total</td>
							<td colspan="2" align="left"><?php echo "Rp.".number_format($total_harga).",00"; ?></td>
						</tr>
						<tr>
							<td colspan="8" align="right">
								<a href="pesan.php" class="btn btn-info">Pesan</a>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
			}
		}
	} elseif (isset($_SESSION['guest'])) {
		if (isset($_SESSION['pemesanan_tamu'])) {
			if (isset($_SESSION['pesan'])) { ?>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">No.</th>
      						<th scope="col">Menu ID</th>
      						<th scope="col">Menu</th>
							<th scope="col">Harga</th>
							<th scope="col">Rating</th>
							<th scope="col">Jumlah</th>
							<th scope="col">Sub Total</th>
							<th scope="col">Aksi</th>
						</tr>
  					</thead>
					<tbody>
				<?php
				$no=1;
				$total_harga=0;
				foreach ($_SESSION['pemesanan_tamu'] as $menu_id => $jml) {
					$ada = $koneksi->pilih_dataMenu($menu_id);
					// $sql      = "SELECT * FROM menu WHERE menu_id='$menu_id';";
					// $result   = $conn->query($sql);
					$row      = $ada->fetch_assoc();
					$jmlharga = $row['harga']*$jml; ?>
						<tr>
							<th scope="row"><?php echo $no; ?>.</th>
							<td><?php echo $row['menu_id']?></td>
							<td><?php echo $row['nama_menu']?></td>
							<td><?php echo "Rp.".number_format($row['harga']).",00";?></td>
							<td><?php echo $row['rating'];?></td>
							<td><?php echo $jml;?></td>
							<td><?php echo "Rp.".number_format($jmlharga).",00";?></td>
							<td><a href="hapus_pemesanan.php?menu_id=<?=$row['menu_id']?>" class="btn btn-danger">Kurang</a> 
							<a href="tambah_pemesanan.php?menu_id=<?=$row['menu_id']?>" class="btn btn-primary">Tambah</a></td>
						</tr>
					<?php
					$no++;
					$total_harga+=$jmlharga;
					$_SESSION['total_harga']=$total_harga;
				} ?>
						<tr>
							<td colspan="6" align="right">Total</td>
							<td colspan="2" align="left"><?php echo "Rp.".number_format($total_harga).",00"; ?></td>
						</tr>
						<tr>
							<td colspan="8" align="right">
								<a href="pesan.php" class="btn btn-info" style="margin-right: 10%;">Pesan</a>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
			}
		}
	} 
	?>
	<form class="form-inline my-2 my-lg-0" action="" method="POST" style="padding: 10px;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-left:2%;" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" >Search</button>
    </form>
	<?php
	if (isset($_POST['search'])) {
		$k=$_POST['cari'];
		$ada = $koneksi->search_dataMenu($k);
		// $sql      = "SELECT * FROM menu WHERE nama_menu LIKE '%$k%' OR harga LIKE '%$k%';";
		// $result   = $conn->query($sql);
		?>
		<br><?php
	} else{
		$ada = $koneksi->select_dataMenu();
		// $sql      = "SELECT * FROM menu;";
		// $result   = $conn->query($sql);
	}
	?>
	<div class="container" style="margin-left: 20px; margin-right: 20px;">
		<div class="row">
		<?php
		while ($row =  $ada->fetch_assoc()) { ?>
				<div class="col-md-3">
					<div class="thumbnail"> 
						<div> <img  src="<?=$row['foto']?>" width="250" height="250"> </div>
						<div class="caption">
							<h3> <?php echo $row['nama_menu']; ?> </h3>
							<h5> Rp. <?php echo number_format($row['harga']); ?>,00 </h5>
							<h4> Rating: <?php echo $row['rating']; ?></h4>
							<a href="tambah_pemesanan.php?menu_id=<?=$row['menu_id']?>" class="btn btn-primary"> Tambah Pesanan </a>
						</div>
					</div>
				</div>
			<?php }
			?>
		</div>
	</div><?php
} else{
	echo "Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
} ?>
</body>
</html>