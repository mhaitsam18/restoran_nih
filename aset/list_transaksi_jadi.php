<?php 
session_start();
include_once('koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>List Transaksi</title>
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
        <a class="nav-link disabled" href="list_transaksi.php" tabindex="-1" aria-disabled="true">List Transaksi</a>
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
 	<h4>Coming Soon</h4>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
  if (isset($_POST['search'])) {
    $k=$_POST['cari'];
    $sql      = "SELECT * FROM pembayaran WHERE username LIKE '%$k%';";
    $result   = $conn->query($sql);
    ?>
    <br><?php
  } else{
  $sql      = "SELECT * FROM pembayaran;";
  $result   = $conn->query($sql);
  } ?>
  <br>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama / Username</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $no=1;
      while ($row=$result->fetch_assoc()) {?>
        <tr>
          <th scope="row"><?php echo $no; ?>.</th>
          <td><?php echo $row['username']; ?></td>
          <td>Rp.<?php echo number_format($row['Total Tagihan']); ?>,00</td>
          <td><?php echo $row['status']; ?></td>
          <td><img src="<?=$row['foto']?>" width="120" height="160"></td>
          <td>
          <?php if ($row['status']=='Belum Lunas'): ?>
            <a href="pelunasan.php?kode_bayar=<?=$row['kode_bayar']?>" class="btn btn-success">Bayar</a> 
          <?php elseif ($row['status']=='Lunas'): ?>
            <a href="pelunasan.php?kode_bayar=<?=$row['kode_bayar']?>" class="btn btn-primary">Belum Bayar</a> 
          <?php endif ?>
            <a href="hapus_transaksi.php?kode_bayar=<?=$row['kode_bayar']?>" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
      <?php
      $no++;
      }?>
      </tbody>
    </table>
 	<br>
 	<a href="home_pegawai.php">Kembali</a>
 <?php 
} else{
	echo "Anda tidak memiliki Hak Akses, silahkan log in telebih dahulu <a href=login_nih.php>Log In</a>";
}
  ?>
</body>
</html>