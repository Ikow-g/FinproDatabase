<?php
include('../config.php');

$result = mysqli_query($mysqli, "SELECT*FROM penerbit ORDER BY id_penerbit DESC");
?>
<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Form Penerbit</title>
</head>

<body>

	<form action='addpenerbit.php' method="POST" name"form3">
		<table>
			<h3>Tambah Penerbit</h3>
			<tr>
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama" size="20px" maxlength="25"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat" maxlength="100" placeholder="---Masukan Alamat"></textarea></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input type="number" name="nomor"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"
						style="background-color: white; font-family: roboto;"></td>
			</tr>
		</table>
	</form>
	<br><br>
	<?php

	if (isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$nomor =$_POST['nomor'];

		include_once('config.php');

		$result1 = mysqli_query($mysqli, "INSERT INTO penerbit VALUES('','$nama','$alamat','$nomor')");
		header('location: addpenerbit.php');
		
	}
	?>
	<h2 align="center">List Penerbit</h2>
	<table width="100%" border="1">
		<tr>
			<th width="5%">ID</th>
			<th width="30%">Nama Penerbit</th>
			<th width="35%">Alamat</th>
			<th width="15%">Nomor Telepon</th>
			<th width="15%">Aksi</th>
		</tr>

		<?php
			while ($user_data = mysqli_fetch_array($result)){?>

		<tr>
			<td align='center'><?php echo $user_data['id_penerbit'];?></td>
			<td align='center'><?php echo $user_data['nama_penerbit'];?></td>
			<td align='center'><?php echo $user_data['alamat'];?></td>
			<td align='center'><?php echo $user_data['no_telp'];?></td>
			<td align='center'>
				<a href="editpenerbit.php?id_penerbit=<?php echo $user_data['id_penerbit']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletepenerbit.php?id_penerbit=<?php echo $user_data['id_penerbit']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>
			<?php } ?>
	</table><br>
	<a href="../index.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Homepage</button></a>

</body>

</html>