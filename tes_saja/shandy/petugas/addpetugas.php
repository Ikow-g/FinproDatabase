<?php

	include('../config.php');
$result2 = mysqli_query($mysqli, "SELECT*FROM petugas ORDER BY id_petugas DESC");
	if (isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		$JK = $_POST['JK'];
		$alamat = $_POST['alamat'];
		$no_telp =$_POST['no_telp'];

		$result1 = mysqli_query($mysqli, "INSERT INTO petugas VALUES('','$nama','$JK','$alamat','$no_telp')");
		header('location: addpetugas.php');
		
	}
	?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Petugas</title>
</head>

<body>
	<h1>FORM PETUGAS</h1>

	<form action='addpetugas.php' method="POST" name"form3">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><select name="JK">
						<option>---Jenis Kelamin</option>
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" required=""></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input type="number" name="no_telp" required=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"
						style="background-color: white; font-family: roboto;"></td>
			</tr>
		</table>
	</form>
	<h2 align="center">List Petugas</h2>
	<table width="100%" border="1">
		<tr>
			<th width="5%">ID</th>
			<th width="30%">Nama Petugas</th>
			<th width="10">Jenis Kelamin</th>
			<th width="15%">Alamat</th>
			<th width="25%">Nomor Telepon</th>
			<th width="25%">Aksi</th>
		</tr>

		<?php
			while ($user_data = mysqli_fetch_array($result2)){?>
		<tr>
			<td align='center'><?php echo $user_data['id_petugas'];?></td>
			<td align='center'><?php echo $user_data['nama_petugas'];?></td>
			<td align='center'><?php echo $user_data['JK'];?></td>
			<td align='center'><?php echo $user_data['alamat'];?></td>
			<td align='center'><?php echo $user_data['no_telp'];?></td>
			<td align='center'>
				<a href="editpetugas.php?id_petugas=<?php echo $user_data['id_petugas']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletepetugas.php?id_petugas=<?php echo $user_data['id_petugas']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>
			<?php } ?>
	</table><br>
	<a href="../index.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Homepage</button></a>

</body>

</html>