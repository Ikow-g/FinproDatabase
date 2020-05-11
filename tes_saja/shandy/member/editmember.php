<?php
include("../config.php");
$result = mysqli_query($mysqli, "SELECT*FROM kelas ");
if (isset($_POST['update'])) 
{
	$id_anggota = $_POST['id'];
	$nama_anggota = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$JK = $_POST['JK'];
	$no_telp = $_POST['nomor'];

$result1 = mysqli_query($mysqli, "UPDATE anggota SET nama_anggota='$nama_anggota',id_kelas='$kelas',JK='$JK',no_telp='$no_telp' WHERE id_anggota=$id_anggota");

		header("Location: addmember.php");
}
?>

<?php
$id_anggota = $_GET['id_anggota'];

$result2 = mysqli_query($mysqli, "SELECT*FROM anggota WHERE id_anggota=$id_anggota");


$user_data = mysqli_fetch_array($result2);
	$nama_anggota = $user_data['nama_anggota'];
	$kelas = $user_data['id_kelas'];
	$JK = $user_data['JK'];
	$no_telp = $user_data['no_telp'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Edit Member</title>
</head>

<body>
	<h1 align="center">EDIT MEMBER</h1>

	<a href="../index.php"><button style="background-color: white; font-family: roboto;">Homepage</button></a>
	<a href="addmember.php"><button style="background-color: white; font-family: roboto;">Kembali</button></a>
	<br><br>

	<form name="update_anggota" method="POST" action="editmember.php">
		<table border='0'>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama_anggota ?>"></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><select name="kelas">
						<?php
					while($data=mysqli_fetch_array($result)):
					?>
						<option value="<?php echo $data['id_kelas']?>" <?php 
					echo $data['id_kelas'] == $kelas ? 'selected' : ''?>><?php echo $data['nama_kelas']?>
						</option>
						<?php 
					endwhile; 
					?>
					</select></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
					<select name="JK">
						<option value="Pria" <?php echo $JK == 'Pria' ? 'selected':''?>>Pria</option>
						<option value="Wanita" <?php echo $JK == 'Wanita' ? 'selected':''?>>Wanita</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input type="number" name="nomor" value="<?php echo $no_telp?>"></td>
			</tr>
			<td><input type="hidden" name="id" value="<?php echo $_GET['id_anggota'];?>"></td>
			<td><input type="submit" name="update" value="Update" style="background-color: white; font-family: roboto;">
			</td>
			</tr>
		</table>
	</form>

</body>

</html>