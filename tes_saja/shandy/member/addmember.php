<?php

	include('../config.php');
$result2 = mysqli_query($mysqli, "SELECT*FROM anggota JOIN kelas ON anggota.id_kelas = kelas.id_kelas ORDER BY id_anggota DESC");
	$result = mysqli_query($mysqli, "SELECT*FROM kelas ");
	if (isset($_POST['Submit'])) {
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$JK = $_POST['JK'];
		$nomor =$_POST['nomor'];

		$result1 = mysqli_query($mysqli, "INSERT INTO anggota VALUES('','$nama','$kelas','$JK','$nomor')");
		header('location: addmember.php');
		
	}
	?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Member</title>
</head>

<body>
	<h1>FORM MEMBER</h1>

	<form action='addmember.php' method="POST" name"form3">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name="kelas">
						<option>---Pilih Kelas</option>
						<?php
					while($data=mysqli_fetch_array($result)):
					?>
						<option value="<?php echo $data['id_kelas']?>"> <?php echo $data['nama_kelas']?></option>
						<?php
					endwhile;  
					?>
					</select></td>
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
				<td>Nomor Telepon</td>
				<td><input type="number" name="nomor" required=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Add"
						style="background-color: white; font-family: roboto;"></td>
			</tr>
		</table>
	</form>
	<h2 align="center">List Member</h2>
	<table width="100%" border="1">
		<tr>
			<th width="5%">ID</th>
			<th width="30%">Nama Member</th>
			<th width="10">Kelas</th>
			<th width="15%">Jenis Kelamin</th>
			<th width="25%">Nomor Telepon</th>
			<th width="15%">Aksi</th>
		</tr>

		<?php
			while ($user_data = mysqli_fetch_array($result2)){?>

		<tr>
			<td align='center'><?php echo $user_data['id_anggota'];?></td>
			<td align='center'><?php echo $user_data['nama_anggota'];?></td>
			<td align='center'><?php echo $user_data['nama_kelas'];?></td>
			<td align='center'><?php echo $user_data['JK'];?></td>
			<td align='center'><?php echo $user_data['no_telp'];?></td>
			<td align='center'>
				<a href="editmember.php?id_anggota=<?php echo $user_data['id_anggota']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Edit</button></a>
				<a href="deletemember.php?id_anggota=<?php echo $user_data['id_anggota']; ?>"><button
						style="padding: 5px 10px; border-radius: 8px">Delete</button></a>
			</td>
			<?php } ?>
	</table><br>
	<a href="../index.php"><button
			style="background-color: blue; display: inline-block; border-radius: 6px;">Homepage</button></a>

</body>

</html>