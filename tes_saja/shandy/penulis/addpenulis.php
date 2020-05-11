<?php
include('../config.php');

$result = mysqli_query($mysqli, "SELECT*FROM penulis ORDER BY id_penulis DESC");
?>
<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Form Penulis</title>
</head>

<body>

	<form action='addpenulis.php' method="POST" name"form2">
		<table>
			<h3>Tambah Penulis</h3>

			<tr>
				<td>Nama Penulis</td>
				<td><input type="text" name="nama"></td>
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
		$nomor = $_POST['nomor'];

		include("config.php");

		$result1 = mysqli_query($mysqli, "INSERT INTO penulis VALUES('','$nama','$nomor')");
		header('location: addpenulis.php');
	
		
	}
	?>
	<h2 align="center">List Penulis</h2>
	<table width="100%" border="1">
		<tr>
			<th width="5%">ID</th>
			<th width="40%">Nama Penulis</th>
			<th width="30%">Nomor Telepon</th>
			<th width="25%">Aksi</th>
		</tr>

		<?php
			while ($user_data = mysqli_fetch_array($result)){?>

		<tr>
			<td align='center'><?php echo $user_data['id_penulis'];?></td>
			<td align='center'><?php echo $user_data['nama_penulis'];?></td>
			<td align='center'><?php echo $user_data['no_telp'];?></td>
			<td align='center'>
				<a href="editpenulis.php?id_penulis=<?php echo $user_data['id_penulis']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletepenulis.php?id_penulis=<?php echo $user_data['id_penulis']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>
			<?php } ?>
	</table><br>

	<a href="../index.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Homepage</button></a>

</body>

</html>