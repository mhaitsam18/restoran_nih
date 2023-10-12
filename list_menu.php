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
	<title>List Menu</title>
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
					<a class="nav-link disabled" href="list_menu.php" tabindex="-1" aria-disabled="true">List Menu</a>
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
	<form class="form-inline my-2 my-lg-0" action="" method="POST" style="padding: 10px;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-left:75%;" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" >Search</button>
    </form>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	if (isset($_POST['search'])) {
		$k=$_POST['cari'];
		$ada = $koneksi->select_dataMenu($k);
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
	<br>
	<div class="container" style="margin-left: 20px;">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">ID Menu</th>
					<th scope="col">Menu</th>
					<th scope="col">Harga</th>
					<th scope="col">Rating</th>
					<th scope="col">Gambar</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$no=1;
		while ($row=$ada->fetch_assoc()) { ?>
				<tr>
					<th scope="row"><?php echo $no; ?>.</th>
					<td><?php echo $row['menu_id']; ?></td>
					<td><?php echo $row['nama_menu']; ?></td>
					<td><?php echo $row['harga']; ?></td>
					<td><?php echo $row['rating']; ?></td>
					<td><img src="<?=$row['foto']?>" width="150" height="150"></td>
					<td><a href="edit_menu.php?menu_id=<?=$row['menu_id']?>" class="btn btn-primary">Edit</a> <a href="koneksi.php?delete_dataMenu=<?=$row['menu_id']?>" class="btn btn-danger">Hapus</a></td>
				</tr>
	    <?php
	    $no++;
		} ?>
			</tbody>
		</table>
	<a href="input_menu.php" class="btn btn-outline-primary" style="margin-left: 88%;">Tambah Menu</a>
	</div>
	<br>
	<?php
	} else{
	echo "Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
?>
</body>
</html>