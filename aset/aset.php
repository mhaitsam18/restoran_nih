<form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="align-content: right;" name="cari">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>

    if (isset($_POST['search'])) {
		$k=$_POST['cari'];
		$sql      = "SELECT * FROM menu WHERE nama_menu LIKE '%$k%' OR harga LIKE '%$k%';";
		$result   = $conn->query($sql);
		?>
		<br><?php
	} else{
	}