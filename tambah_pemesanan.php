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
	<title>Tambah Pemesanan</title>
</head>
<body>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['pelanggan'])) {
	$menu_id   = $_GET['menu_id'];
	$ada = $koneksi->pilih_dataMenu($menu_id);
	// $sql       = "SELECT * FROM menu WHERE menu_id='$menu_id';";
	// $result    = $conn->query($sql);
	$row       = $ada->fetch_assoc();
	$_SESSION['pesan']="ada";
	if (isset($_SESSION['member'])) {
		if (isset($_SESSION['pemesanan_member'][$menu_id])) {
			$_SESSION['pemesanan_member'][$menu_id]+=1;
			$jml       = $_SESSION['pemesanan_member'][$menu_id];
			$sub_harga = $row['harga']*$jml;
			$koneksi->update_jumlahPemesananMember($jml, $sub_harga, $menu_id);
			// $sql="UPDATE `pemesanan_member` SET `jumlah`=$jml,`sub_harga`=$sub_harga WHERE menu_id='$menu_id'";
			// $result    = $conn->query($sql);
			echo $_SESSION['pemesanan_member'][$menu_id];
		} else{
			$koneksi->insert_PemesananMember($row['menu_id'], $row['harga']);
			// $sql="INSERT INTO `pemesanan_member`(`username`, `menu_id`, `jumlah`, `sub_harga`, `no_meja`) VALUES ('$_SESSION[username]','$row[menu_id]',1,$row[harga], $_SESSION[no_meja])";
			// $result   = $conn->query($sql);
			$_SESSION['pemesanan_member'][$menu_id]=1;
			echo $_SESSION['pemesanan_member'][$menu_id];
		}
	} else if (isset($_SESSION['guest'])) {
		if (isset($_SESSION['pemesanan_tamu'][$menu_id])) {
			$_SESSION['pemesanan_tamu'][$menu_id]+=1;
			$jml      =$_SESSION['pemesanan_tamu'][$menu_id];
			$sub_harga=$row['harga']*$jml;
			$koneksi->update_jumlahPemesananTamu($jml, $sub_harga, $menu_id);
			// $sql      ="UPDATE `pemesanan_tamu` SET `jumlah`=$jml,`sub_harga`=$sub_harga WHERE menu_id='$menu_id'";
			// $result    = $conn->query($sql);
			echo $_SESSION['pemesanan_tamu'][$menu_id];
		} else{
			$koneksi->insert_PemesananTamu($row['menu_id'], $row['harga']);
			// $sql="INSERT INTO `pemesanan_tamu`(`guest_id`, `menu_id`, `jumlah`, `sub_harga`, `no_meja`) VALUES ($_SESSION[guest_id],'$row[menu_id]',1,$row[harga], $_SESSION[no_meja])";
			// $result   = $conn->query($sql);
			$_SESSION['pemesanan_tamu'][$menu_id]=1;
			echo $_SESSION['pemesanan_tamu'][$menu_id];
		}
	}
	header("location: home_pelanggan.php");
} else{
	echo "Anda tidak memiliki hak akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
}
 ?>

</body>
</html>