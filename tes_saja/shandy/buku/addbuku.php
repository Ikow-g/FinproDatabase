<?php
	include('../config.php');
$result1 = mysqli_query($mysqli, "SELECT*FROM buku 
	JOIN penulis ON buku.id_penulis = penulis.id_penulis 
	JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit");
	$result2 = mysqli_query($mysqli, "SELECT*FROM penulis ");
	$result3 =mysqli_query($mysqli, "SELECT*FROM penerbit");
	if (isset($_POST['Submit'])) {
		$judul = $_POST['judul'];
		$penulis = $_POST['penulis'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$stok =$_POST['stok'];
		$penerbit=$_POST['penerbit'];

		$result = mysqli_query($mysqli, "INSERT INTO buku VALUES('','$judul','$penulis','$tahun_terbit','$stok','$penerbit')");
		header('location: addbuku.php');
		
	}
	?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Buku I Perpustakaan</title>
</head>

<body>

	<form action='addbuku.php' method="POST" name"form4">
		<center>
			<table width="25%" border="0">
				<b>Tambah Buku</b>
				<tr>
					<td>Judul Buku :</td>
					<td><input type="text" name="judul"></td>
				</tr>
				<tr>
					<td>Penulis :</td>
					<td><select name="penulis">
							<option>---Nama Penulis</option>
							<?php
					while($data=mysqli_fetch_array($result2)):
					?>
							<option value="<?php echo $data['id_penulis']?>"> <?php echo $data['nama_penulis']?>
							</option>
							<?php
					endwhile;  
					?>
						</select></td>
				</tr>
				<tr>
					<td>Penerbit :</td>
					<td><select name="penerbit">
							<option>---Nama Penerbit</option>
							<?php
					while($data=mysqli_fetch_array($result3)):
					?>
							<option value="<?php echo $data['id_penerbit']?>"> <?php echo $data['nama_penerbit']?>
							</option>
							<?php
					endwhile;  
					?>
						</select></td>
				</tr>
				<tr>
					<td>Tahun Terbit :</td>
					<td>
						<select name="tahun_terbit">
							<option>---Tahun Terbit</option>
							<?php for($year = 1960;$year<=2019;$year++): ?>
							<option> <?= $year ?> </option>
							<?php endfor ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Jumlah Stok :</td>
					<td><input type="number" name="stok" placeholder="Masukan Jumlah Stok"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="Submit" value="Add"
							style="background-color: white; font-family: roboto;"></td>
				</tr>
			</table>
		</center>
	</form>
	<h2 align="center">List Buku</h2>
	<table width="100%" border="2">
		<tr>
			<th width="5%">ID</th>
			<th width="20%">Judul Buku</th>
			<th width="20%">Penulis</th>
			<th width="20%">Penerbit</th>
			<th width="10%">Tahun Terbit</th>
			<th width="10%">Jumlah Stok</th>
			<th width="15%">Aksi</th>
		</tr>
		<?php

			while ($user_data = mysqli_fetch_array($result1)){?>

		<tr>
			<td align='center'><?php echo $user_data['id_buku'];?></td>
			<td align='center'><?php echo $user_data['judul'];?></td>
			<td align='center'><?php echo $user_data['nama_penulis'];?></td>
			<td align='center'><?php echo $user_data['nama_penerbit'];?></td>
			<td align='center'><?php echo $user_data['tahun_terbit'];?></td>
			<td align='center'><?php echo $user_data['stok'];?></td>
			<td align="center">
				<a href="editbuku.php?id_buku=<?=$user_data['id_buku']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletebuku.php?id_buku=<?=$user_data['id_buku']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>

			<?php } ?>

	</table><br>
	<a href="../index.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Homepage</button></a>


</body>

</html>