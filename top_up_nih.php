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
	<title>Top Up Nih</title>
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
					<a class="nav-link" href="list_transaksi.php">List Transaksi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
		</div>
	</nav>
<?php
if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
	$username =$_GET['username'];
	$ada      = $koneksi->pilih_dataMember2($username);
	// $sql      = "SELECT * FROM member WHERE username='$username';";
	// $result   = $conn->query($sql);
	$row      = $ada->fetch_assoc();
	$saldo    = $row['saldo'];
	?>
	<br>
	<h1 style="margin-left: 60px;">Top Up</h1>
	<br>
<div class="container">
	<form action="koneksi.php?top_up=<?=$saldo?>" method="POST">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
    	<input type="text" name="username" value="<?=$username?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Top Up</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" style="width: 20%;" name="topup">
    </div>
  </div>
  <a href="list_member.php" class="btn btn-light" style="margin-top: 10px;">Kembali</a>
  <input type="submit" name="submit" value="Top Up" class="btn btn-success" style="margin-left: 210px;">
	</form>
</div>
	<?php
	// if (isset($_POST['submit'])) {
	// 	$saldo   += $_POST['topup'];
	// 	$username = $_POST['username'];
	// 	$sql      = "UPDATE `member` SET `saldo`=$saldo WHERE username='$username'";
	// 	$result   = $conn->query($sql);
	// 	if ($result == true) {
	// 		echo "<script> alert('Saldo berhasil ditambahkan');</script>";
	// 	}else {
	// 			echo "<script> alert('Saldo gagal ditambahkan');</script>";
	// 	}
	// 	echo "<script> location='list_member.php'; </script>";
	// } 
} else {
		echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>
</body>
</html>