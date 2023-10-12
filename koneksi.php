<?php 
session_start();
class Koneksi{
	private $conn;
	function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "restoran_nih";
		$this->conn = mysqli_connect($servername,$username, $password, $db);
	}
	public function select_dataMenu(){
		$sql = "SELECT * FROM menu";
		return $this->conn->query($sql);
	}
	public function select_dataMember(){
		$sql = "SELECT * FROM member";
		return $this->conn->query($sql);
	}
	public function proses_login($username, $Password){
		$sql = "SELECT * FROM member";
		return $this->conn->query($sql);
	}
	public function select_dataPegawai(){
		$sql = "SELECT * FROM pegawai";
		return $this->conn->query($sql);
	}
	public function select_mejaMember(){
		$sql = "SELECT no_meja FROM pemesanan_member";
		return $this->conn->query($sql);
	}
	public function select_dataPembayaranLimit(){
		$sql = "SELECT * FROM `pembayaran` ORDER BY `kode_bayar` DESC LIMIT 1";
		return $this->conn->query($sql);
	}
	public function select_mejaTamu(){
		$sql = "SELECT no_meja FROM pemesanan_tamu";
		return $this->conn->query($sql);
	}
	public function pilih_dataMenu($menu_id){
		$sql = "SELECT * FROM menu WHERE menu_id='$menu_id'";
		return $this->conn->query($sql);
	}
	public function pilih_dataMember(){
		$sql = "SELECT * FROM `member` WHERE username='$_SESSION[username]'";
		return $this->conn->query($sql);
	}
	public function pilih_dataMember2($username){
		$sql = "SELECT * FROM `member` WHERE username='$username'";
		return $this->conn->query($sql);
	}
	public function pilih_dataPegawai(){
		$sql = "SELECT * FROM `pegawai` WHERE username='$_SESSION[username]'";
		return $this->conn->query($sql);
	}
	public function pilih_PemesananMemberJoin(){
		$sql = "SELECT *, nama_menu, harga FROM `pemesanan_member` JOIN menu USING(menu_id) WHERE username='$_SESSION[username]'";
		return $this->conn->query($sql);
	}
	public function pilih_PemesananTamuJoin(){
		$sql = "SELECT *, nama_menu, harga FROM `pemesanan_tamu` JOIN menu USING(menu_id) WHERE guest_id='$_SESSION[guest_id]'";
		return $this->conn->query($sql);
	}
	public function select_dataPembayaran(){
		$sql = "SELECT * FROM pembayaran ORDER BY kode_bayar DESC";
		return $this->conn->query($sql);
	}
	public function search_dataMenu($k){
		$sql = "SELECT * FROM menu WHERE nama_menu LIKE '%$k%' OR harga LIKE '%$k%'";
		return $this->conn->query($sql);
	}
	public function search_dataMember($k){
		$sql = "SELECT * FROM member WHERE nama LIKE '%$k%'";
		return $this->conn->query($sql);
	}
	public function search_dataPegawai($k){
		$sql = "SELECT * FROM pegawai WHERE nama LIKE '%$k%'";
		return $this->conn->query($sql);
	}
	public function search_dataPembayaran($k){
		$sql = "SELECT * FROM pembayaran WHERE username LIKE '%$k%' ORDER BY kode_bayar DESC;";
    	return $this->conn->query($sql);
	}
	public function loginGuest(){
		$guest_name =$_POST['guest_name'];
		$sql        = "INSERT INTO tamu(guest_name) VALUES ('$guest_name')";
		$result     = $this->conn->query($sql);
		$sql        = "SELECT * FROM tamu WHERE guest_name='$guest_name' ORDER BY guest_id DESC LIMIT 1";
		$result     = $this->conn->query($sql);
		$row        = $result->fetch_assoc();
		$_SESSION['guest_id']   = $row['guest_id'];
		$_SESSION['guest_name'] = $guest_name;
		$_SESSION['username']   = $_SESSION['guest_name'];
		$_SESSION['guest']      = 'guest';
		$_SESSION['pelanggan']  = 'pelanggan';
		$_SESSION['no_meja']    = $_POST['no_meja'];
		if ($result == true) {
			header("location: home_pelanggan.php");
		} else {
			echo "<script> alert('Log In Gagal'); </script>";
		}
		echo "<a href='login_pelanggan.php'>Kembali</a>";
		echo "<a href='login_member.php'>Log In by Member</a>";
		mysqli_close($this->conn);
	}
	public function insert_dataMember(){
		$target_dir		= "upload_member/"; // Untuk Foto
		$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
		$target_file	= $target_dir . $file_name; // Untuk Foto
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto

		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			if ($_POST['password']==$_POST['konfirmasi']) {
				include_once('koneksi.php');
				$username =$_POST['username'];
				$nama =$_POST['nama'];
				$email =$_POST['email'];
				$no_telp =$_POST['no_telp'];
				$password =md5($_POST['password']);
				$sql="INSERT INTO member(username, password, nama, email, no_telp, foto) VALUES ('$username','$password', '$nama', '$email', '$no_telp', '$target_file')";
				$result=$this->conn->query($sql);
				if ($result == true) {
						echo "<script> alert('Akun member berhasil dibuat');</script>";
				} else {
						echo "<script> alert('Akun member gagal dibuat');</script>";
				}
				echo "<script> location='login_member.php'; </script>";
			} else {
				echo "<script> alert('Pastikan Password & konfirmasi password sama');</script>";
			}
		} else {
			echo "<script> alert('Foto Gagal diunggah');</script>";
		}
		mysqli_close($this->conn);
	}
	public function insert_dataPegawai(){
		$target_dir		= "upload_pegawai/"; // Untuk Foto
		$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
		$target_file	= $target_dir . $file_name; // Untuk Foto
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto

		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			if ($_POST['password']==$_POST['konfirmasi']) {
				$username =$_POST['username'];
				$nama =$_POST['nama'];
				$email =$_POST['email'];
				$no_telp =$_POST['no_telp'];
				$alamat =$_POST['alamat'];
				$job =$_POST['job'];
				$password =md5($_POST['password']);
				$sql="INSERT INTO pegawai(username, password, nama, email, no_telp, alamat, job, foto) VALUES ('$username','$password', '$nama', '$email', '$no_telp', '$alamat', '$job', '$target_file')";
				$result=$this->conn->query($sql);
				if ($result == true) {
						echo "<script> alert('Akun Pegawai berhasil dibuat');</script>";
				} else {
						echo "<script> alert('Akun Pegawai gagal dibuat');</script>";
				}
				echo "<script> location='login_pegawai.php'; </script>";
			} else {
				echo "<script> alert('Pastikan Password & konfirmasi password sama');</script>";
			}
		} else {
			echo "<script> alert('Foto Gagal diunggah');</script>";
		}
		mysqli_close($this->conn);
	}
	public function insert_dataMenu(){
		if (isset($_SESSION['username'])&&isset($_SESSION['pegawai'])) {
			$target_dir		= "upload_menu/";
			$file_name		= basename($_FILES["foto"]["name"]);
			$target_file	= $target_dir . $file_name; // upload/nama.jpg
			$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
				$menu_id  = $_POST['menu_id'];
				$nama_menu= $_POST['nama_menu'];
				$harga     = $_POST['harga'];
				$rating      = $_POST['rating'];

				$sql="INSERT INTO menu(menu_id, nama_menu, harga, rating, foto) VALUES ('$menu_id','$nama_menu',$harga, $rating, '$target_file')";
				$result=$this->conn->query($sql);
				if ($result == true) {
					echo "<script> alert('Menu & Gambar berhasil disimpan');</script>";
					echo "<script> location='list_menu.php'; </script>";
				}else {
					echo "<script> alert('Menu Gagal disimpan');</script>";
					echo "<script> location='input_menu.php'; </script>";
				}
					
			} else{
				echo "<script> alert('Gambar gagal diunggah');</script>";
			}
		} else{
			echo "Anda tidak memiliki Hak Akses, Silahkan Log In terlebih Dahulu <a href=login_nih.php>Log In</a>";
		}
		mysqli_close($this->conn);
	}
	public function insert_PemesananMember($menu_id, $harga){
		$sql="INSERT INTO `pemesanan_member`(`username`, `menu_id`, `jumlah`, `sub_harga`, `no_meja`) VALUES ('$_SESSION[username]','$menu_id',1,$harga, $_SESSION[no_meja])";
		return $this->conn->query($sql);
	}
	public function insert_PemesananTamu($menu_id, $harga){
		$sql="INSERT INTO `pemesanan_tamu`(`guest_id`, `menu_id`, `jumlah`, `sub_harga`, `no_meja`) VALUES ('$_SESSION[guest_id]','$menu_id',1,$harga, $_SESSION[no_meja])";
		return $this->conn->query($sql);
	}
	public function insert_dataPembayaran($username, $total_harga){
		$sql="INSERT INTO `pembayaran`(`username`, `total_harga`, `status`) VALUES ('$username',$total_harga,'Belum Lunas')";
		return $this->conn->query($sql);
	}
	public function update_dataMember(){
		if ($_POST['password']==$_POST['konfirmasi']) {
			include_once('koneksi.php');
			$username =$_POST['username'];
			$nama =$_POST['nama'];
			$email =$_POST['email'];
			$no_telp =$_POST['no_telp'];
			$password =md5($_POST['password']);
			$sql="UPDATE `member` SET `password`='$password',`nama`='$nama',`email`='$email',`no_telp`='$no_telp' WHERE username='$username'";
			$result=$this->conn->query($sql);
			if ($result == true) {
					echo "Akun Member berhasil diubah <br>";
					header("location: profil_member.php");
			} else {
					echo "Data gagal diubah";
			}
			echo "<a href='login_member.php'>Log In</a>";
		} else {
			echo "Error Password";
		}
		mysqli_close($this->conn);
	}
	public function update_dataPegawai(){
		if ($_POST['password']==$_POST['konfirmasi']) {
			include_once('koneksi.php');
			$username =$_POST['username'];
			$nama =$_POST['nama'];
			$email =$_POST['email'];
			$no_telp =$_POST['no_telp'];
			$alamat =$_POST['alamat'];
			$job =$_POST['job'];
			$password =md5($_POST['password']);
			$sql="UPDATE `pegawai` SET `password`='$password',`nama`='$nama',`email`='$email',`no_telp`='$no_telp',`alamat`='$alamat',`job`='$job' WHERE username='$username'";
			$result=$this->conn->query($sql);
			if ($result == true) {
					echo "<script> alert('Data profil berhasil diubah');</script>";
			}else {
					echo "<script> alert('Data profil Gagal diubah');</script>";
			}
		echo "<script> location='profil_pegawai.php'; </script>";
		} else {
			echo "<script> alert('Pastikan Password dan Konfirmasi sudah sama');</script>";
		}
		mysqli_close($this->conn);
	}
	public function update_dataMenu(){
		$menu_id   =$_POST['menu_id'];
		$nama_menu =$_POST['nama_menu'];
		$harga     =$_POST['harga'];
		$rating    =$_POST['rating'];
		$sql         ="UPDATE menu SET nama_menu='$nama_menu', harga=$harga, rating=$rating WHERE menu_id='$menu_id';";
		$result=$this->conn->query($sql);
			if ($result == true) {
					echo "<script> alert('Data menu berhasil diubah');</script>";
			}else {
					echo "<script> alert('Data menu Gagal diubah');</script>";
			}
		echo "<script> location='list_menu.php'; </script>";
		mysqli_close($this->conn);
	}
	public function update_fotoMember(){
		$target_dir		= "upload_member/";
		$file_name		= basename($_FILES["foto"]["name"]);
		$target_file	= $target_dir . $file_name;
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			echo "The file ".$file_name." has been uploaded.";
			$sql ="UPDATE member SET foto='$target_file' WHERE username='$_SESSION[username]';";
			$result=$this->conn->query($sql);
			header("location: profil_member.php");
		} else{
			echo "maaf, terjadi kesalahan dalam mengupload foto anda";
		}
		mysqli_close($this->conn);
	}
	public function update_fotoPegawai(){
		$target_dir		= "upload_pegawai/";
		$file_name		= basename($_FILES["foto"]["name"]);
		$target_file	= $target_dir . $file_name;
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			echo "The file ".$file_name." has been uploaded.";
			$sql ="UPDATE pegawai SET foto='$target_file' WHERE username='$_SESSION[username]';";
			$result=$this->conn->query($sql);
			header("location: profil_pegawai.php");
		} else{
			echo "maaf, terjadi kesalahan dalam mengupload foto anda";
		}
		mysqli_close($this->conn);
	}
	public function update_fotoMenu($menu_id){
		$target_dir		= "upload_menu/";
		$file_name		= basename($_FILES["foto"]["name"]);
		$target_file	= $target_dir . $file_name;
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			echo "File dengan nama ".$file_name." telah berhasil diunggah";
			$sql ="UPDATE menu SET foto='$target_file' WHERE menu_id='$menu_id';";
			$result=$this->conn->query($sql);
			header("location: edit_menu.php?menu_id=$menu_id");
		} else{
			echo "maaf, terjadi kesalahan dalam mengupload Gambar anda";
		}
		mysqli_close($this->conn);
	}
	public function update_jumlahPemesananMember($jml, $sub_harga, $menu_id){
		$sql="UPDATE `pemesanan_member` SET `jumlah`=$jml,`sub_harga`=$sub_harga WHERE menu_id='$menu_id'";
		return $this->conn->query($sql);
	}
	public function update_jumlahPemesananTamu($jml, $sub_harga, $menu_id){
		$sql="UPDATE `pemesanan_tamu` SET `jumlah`=$jml,`sub_harga`=$sub_harga WHERE menu_id='$menu_id'";
		return $this->conn->query($sql);
	}
	public function update_saldoMember($saldo){
		$sql="UPDATE `member` SET `saldo`=$saldo WHERE username='$_SESSION[username]'";
		return $this->conn->query($sql);
	}
	public function update_totalPembayaran($total_harga){
		$sql="UPDATE `pembayaran` SET `total_harga`=$total_harga,`status`='Belum Lunas' WHERE username='$_SESSION[username]'";
		return $this->conn->query($sql);
	}
	public function update_statusPembayaran(){
		$sql="UPDATE `pembayaran` SET `status`='Lunas' WHERE kode_bayar='$_SESSION[kode_bayar]'";
		return $this->conn->query($sql);
	}
	public function top_up($saldo){
		$saldo   += $_POST['topup'];
		$username = $_POST['username'];
		$sql      = "UPDATE `member` SET `saldo`=$saldo WHERE username='$username'";
		$result   = $this->conn->query($sql);
		if ($result == true) {
			echo "<script> alert('Saldo berhasil ditambahkan');</script>";
		}else {
				echo "<script> alert('Saldo gagal ditambahkan');</script>";
		}
		echo "<script> location='list_member.php'; </script>";
	}
	public function delete_dataMember($username){
		$sql="DELETE FROM member WHERE username='$username'";
		$result=$this->conn->query($sql);
		if ($result == true) {
				echo "<script> alert('Akun berhasil dihapus');</script>";
		}else {
				echo "<script> alert('Akun Gagal dihapus');</script>";
		}
		echo "<script> location='list_member.php'; </script>";
		mysqli_close($this->conn);
	}
	public function delete_dataPegawai($username){
		if ($_SESSION['job']=='Direktur' && $username!=$_SESSION['username']) {
			$sql="DELETE FROM pegawai WHERE username='$username'";
			$result=$this->conn->query($sql);
			if ($result == true) {
				echo "<script> alert('Pegawai berhasil dipecat');</script>";
			}else {
			echo "<script> alert('Pegawai gagal dipecat');</script>";
			}
		} else{
			echo "<script> alert('Anda tidak memiliki hak untuk memecat Karyawan ini');</script>";
		}
		echo "<script> location='list_pegawai.php'; </script>";
		mysqli_close($this->conn);
	}
	public function delete_dataMenu($menu_id){
		$menu_id=$_GET['menu_id'];
		$sql="DELETE FROM menu WHERE menu_id='$menu_id'";
		$result=$this->conn->query($sql);
		if ($result == true) {
			echo "<script> alert('Menu berhasil dihapus');</script>";
		}else {
			echo "<script> alert('Menu Gagal dihapus');</script>";
		}
		echo "<script> location='list_menu.php'; </script>";
		mysqli_close($this->conn);
	}
	public function delete_dataPembayaran($kode_bayar){
		$sql="DELETE FROM pembayaran WHERE kode_bayar='$kode_bayar'";
		$result=$this->conn->query($sql);
		if ($result == true) {
				echo "<script> alert('Transaksi berhasil dihapus');</script>";
		}else {
				echo "<script> alert('Transaksi Gagal dihapus');</script>";
		}
		echo "<script> location='list_transaksi.php'; </script>";
		mysqli_close($this->conn);
	}
	public function delete_PemesananMember($menu_id){
		$sql = "DELETE FROM `pemesanan_member` WHERE menu_id='$menu_id'";
		return $this->conn->query($sql);
	}
	public function delete_PemesananTamu($menu_id){
		$sql = "DELETE FROM `pemesanan_tamu` WHERE menu_id='$menu_id'";
		return $this->conn->query($sql);
	}
	public function logout_Member(){
		$sql = "DELETE FROM `pemesanan_member` WHERE 1";
		return $this->conn->query($sql);
	}
	public function logout_Tamu(){
		$sql = "DELETE FROM `pemesanan_tamu` WHERE 1";
		return $this->conn->query($sql);
	}
	public function pelunasan($kode_bayar){
		$sql   = "SELECT * FROM pembayaran WHERE kode_bayar='$kode_bayar'";
		$result= $this->conn->query($sql);
		$row   = $result->fetch_assoc();
		if ($row['status']=='Belum Lunas') {
			$sql="UPDATE `pembayaran` SET `status`='Lunas' WHERE kode_bayar='$kode_bayar'";
			$result=$this->conn->query($sql);
			if ($result == true) {
					echo "<script> alert('Tagihan Lunas');</script>";
			}else {
					echo "<script> alert('Tejadi Kesalahan');</script>";
			}
		} else{
			$sql="UPDATE `pembayaran` SET `status`='Belum Lunas' WHERE kode_bayar='$kode_bayar'";
			$result=$this->conn->query($sql);
			if ($result == true) {
					echo "<script> alert('Tagihan Belum Lunas');</script>";
			}else {
					echo "<script> alert('Tejadi Kesalahan');</script>";
			}
		}
		echo "<script> location='list_transaksi.php'; </script>";
	}
}
$koneksi = new koneksi();
if (isset($_GET['loginGuest'])) {
	$koneksi->loginGuest();
}
if (isset($_GET['insert_dataMember'])) {
	$koneksi->insert_dataMember();
}
if (isset($_GET['insert_dataPegawai'])) {
	$koneksi->insert_dataPegawai();
}
if (isset($_GET['insert_dataMenu'])) {
	$koneksi->insert_dataMenu();
}
if (isset($_GET['update_dataMember'])) {
	$koneksi->update_dataMember();
}
if (isset($_GET['update_dataPegawai'])) {
	$koneksi->update_dataPegawai();
}
if (isset($_GET['update_dataMenu'])) {
	$koneksi->update_dataMenu();
}
if (isset($_GET['update_fotoMember'])) {
	$koneksi->update_fotoMember();
}
if (isset($_GET['update_fotoPegawai'])) {
	$koneksi->update_fotoPegawai();
}
if (isset($_GET['update_fotoMenu'])) {
	$koneksi->update_fotoMenu($_GET['update_fotoMenu']);
}
if (isset($_GET['top_up'])) {
	$koneksi->top_up($_GET['top_up']);
}
if (isset($_GET['delete_dataMember'])) {
	$koneksi->delete_dataMember($_GET['delete_dataMember']);
}
if (isset($_GET['delete_dataPegawai'])) {
	$koneksi->delete_dataPegawai($_GET['delete_dataPegawai']);
}
if (isset($_GET['delete_dataMenu'])) {
	$koneksi->delete_dataMenu($_GET['delete_dataMenu']);
}
if (isset($_GET['delete_dataPembayaran'])) {
	$koneksi->delete_dataPembayaran($_GET['delete_dataPembayaran']);
}
if (isset($_GET['delete_PemesananMember'])) {
	$koneksi->delete_PemesananMember($_GET['delete_PemesananMember']);
}
if (isset($_GET['delete_PemesananTamu'])) {
	$koneksi->delete_PemesananTamu($_GET['delete_PemesananTamu']);
}
if (isset($_GET['logout_Member'])) {
	$koneksi->logout_Member();
}
if (isset($_GET['logout_Tamu'])) {
	$koneksi->logout_Tamu();
}
if (isset($_GET['pelunasan'])) {
	$koneksi->pelunasan($_GET['pelunasan']);
}

 ?>