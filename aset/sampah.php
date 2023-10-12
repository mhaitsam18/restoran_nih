SAMPAH PESAN.PHP
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title></title>
</head>
	<body>
		<img src="<?=$row['foto']?>">
		<form action="" method="POST">
			<input type="hidden" name="username" value="<?=$_SESSION['username']?>">
			<input type="hidden" name="menu_id" value="<?=$row['menu_id']?>">
			<table>
				<tr>
					<td>Nama Menu</td>
					<td> : </td>
					<td><?php echo $row['nama_menu']; ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td> : </td>
					<td><?php echo $row['harga']; ?></td>
				</tr>
				<tr>
					<td>Rating</td>
					<td> : </td>
					<td><?php echo $row['harga']; ?></td>
				</tr>
				<tr>
					<td>Nomor Meja</td>
					<td> : </td>
					<td><input type="number" name="no_meja" value="1"></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td> : </td>
					<td><input type="number" name="jumlah"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Pesan" name="pesan"></td>
				</tr>
			</table>
		</form>
	</body>
	</html>
	<?php 