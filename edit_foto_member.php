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
		<title>Edit Foto Member</title>
	</head>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['member'])) {
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
					<a class="nav-link" href="profil_member.php">Kembali <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
		<h1>Edit Foto</h1>
		<form action="koneksi.php?update_fotoMember" method="POST" enctype="multipart/form-data" >
			<input type="file" name="foto" id="foto">
			<input type="submit" value="Upload Image" name="submit" class="btn btn-info">
		</form><br>
			<a href="profil_member.php" class="btn btn-outline-danger" style="margin-left: 360px;">Batal</a>
<?php 
	// if (isset($_POST['submit'])) {
	// 	$target_dir		= "upload_member/";
	// 	$file_name		= basename($_FILES["foto"]["name"]);
	// 	$target_file	= $target_dir . $file_name;
	// 	$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// 	if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
	// 		echo "The file ".$file_name." has been uploaded.";
	// 		$sql ="UPDATE member SET foto='$target_file' WHERE username='$_SESSION[username]';";
	// 		$result=$conn->query($sql);
	// 		header("location: profil_member.php");
	// 	} else{
	// 		echo "maaf, terjadi kesalahan dalam mengupload foto anda";
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