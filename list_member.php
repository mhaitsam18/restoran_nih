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
	<title>List Member</title>
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
        			<a class="nav-link disabled" href="list_member.php" tabindex="-1" aria-disabled="true">List Member</a>
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
	<form class="form-inline my-2 my-lg-0" action="" method="POST" style="padding: 10px;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-left:75%;" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" >Search</button>
    </form>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	if (isset($_POST['search'])) {
		$k=$_POST['cari'];
		$ada = $koneksi->search_dataMember($k);
		// $sql      = "SELECT * FROM member WHERE nama LIKE '%$k%';";
		// $result   = $conn->query($sql);
		?>
		<br><?php
	} else{
		$ada = $koneksi->select_dataMember();
		// $sql      = "SELECT * FROM member;";
		// $result   = $conn->query($sql);
	}
	?>
	<br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">username</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Alamat Email</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Saldo</th>
          <th scope="col">Foto</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no=1;
      while ($row=$ada->fetch_assoc()) {?>
        <tr>
          <th scope="row"><?php echo $no; ?>.</th>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['no_telp']; ?></td>
          <td>Rp.<?php echo number_format($row['saldo']); ?>,00</td>
          <td><img src="<?=$row['foto']?>" width="120" height="160"></td>
          <td><a href="koneksi.php?delete_dataMember=<?=$row['username']?>" class="btn btn-danger">Hapus Akun</a>  
				<a href="top_up_nih.php?username=<?=$row['username']?>" class="btn btn-success">Top Up Nih</a></td>
        </tr>
      <?php
      $no++;
      }?>
      </tbody>
    </table>
  <?php
} else{
	echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
?>
</body>
</html>