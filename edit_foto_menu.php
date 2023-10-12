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
		<title>Edit Gambar Menu</title>
</head>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	$menu_id=$_GET['menu_id'];
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
		<h1>Edit Foto</h1>
		<form action="koneksi.php?update_fotoMenu=<?=$menu_id?>" method="POST" enctype="multipart/form-data">
			<input type="file" name="foto" id="foto">
			<input type="submit" value="Upload Image" name="submit">
		</form><br>
	<a href="edit_menu.php?menu_id=<?=$menu_id?>" class="btn btn-outline-danger" style="margin-left: 360px;">Batal</a>
<?php 
	// if (isset($_POST['submit'])) {
	// 	$target_dir		= "upload_menu/";
	// 	$file_name		= basename($_FILES["foto"]["name"]);
	// 	$target_file	= $target_dir . $file_name;
	// 	$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// 	if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
	// 		echo "File dengan nama ".$file_name." telah berhasil diunggah";
	// 		$sql ="UPDATE menu SET foto='$target_file' WHERE menu_id='$menu_id';";
	// 		$result=$conn->query($sql);
	// 		header("location: edit_menu.php?menu_id=$menu_id");
	// 	} else{
	// 		echo "maaf, terjadi kesalahan dalam mengupload Gambar anda";
	// 	}
	// }
?>
</body>
<?php
} else{
	echo "Anda tidak memiliki hak akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
</html>