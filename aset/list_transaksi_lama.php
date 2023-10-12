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
 	<h4>Coming Soon</h4>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	echo "Fitur Belum Tersedia";
 ?>
 	<br>
 	<a href="home_pegawai.php">Kembali</a>
 <?php 
} else{
	echo "Anda tidak memiliki Hak Akses, silahkan log in telebih dahulu <a href=login_nih.php>Log In</a>";
}
  ?>
</body>
</html>