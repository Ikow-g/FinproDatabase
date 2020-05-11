<?php
include_once('config.php');

$result = mysqli_query($mysqli, "SELECT * FROM peminjaman 
	JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
    JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas
 ORDER BY id_pinjam DESC");
?>
<!DOCTYPE html>
<html>

<head>
	<h3>List Peminjaman</h3>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage I Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
	<div class="navbar">
		<div class="dropdown">
			<button class="dropbtn">Master
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="buku/addbuku.php"> Buku</a>
				<a href="member/addmember.php">Anggota</a>
				<a href="penulis/addpenulis.php">Penulis</a>
				<a href="penerbit/addpenerbit.php">Penerbit</a>
				<a href="petugas/addpetugas.php">Petugas</a>
			</div>
		</div>
	</div>
	<br>
	<table width="100%" border="1">
		<tr>
			<th width="10%">ID</th>
			<th width="20%">Nama Peminjam</th>
			<th width="15%">Tanggal Pinjam</th>
			<th width="15%">Jatuh Tempo</th>
			<th width="20%">Petugas</th>
			<th width="20%">Action</th>
		</tr>

		<?php
			while ($user_data = mysqli_fetch_array($result)){?>

		<tr>
			<td align='center'><?php echo $user_data['id_pinjam'];?></td>
			<td align='center'><?php echo $user_data['nama_anggota'];?></td>
			<td align='center'><?php echo $user_data['tgl_pinjam'];?></td>
			<td align='center'><?php echo $user_data['tgl_batasakhir'];?></td>
			<td align='center'><?php echo $user_data['nama_petugas'];?></td>
			<td align="center">
				<a href="editpinjam.php" <?php echo $user_data['id_pinjam']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletepinjam.php" <?php echo $user_data['id_pinjam']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>
			<?php } ?>

	</table><br>
	<a href="peminjaman/transaksi.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Transaksi
			Peminjaman</button></a>

</body>

</html>