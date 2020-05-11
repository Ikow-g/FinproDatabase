<?php
include("../config.php");
$id_petugas = $_GET['id_petugas'];

$result2 = mysqli_query($mysqli, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");


$user_data = mysqli_fetch_array($result2);
	$id_petugas = $user_data['id_petugas'];
	$nama_petugas = $user_data['nama_petugas'];
	$JK = $user_data['JK'];
	$alamat = $user_data['alamat'];
	$no_telp = $user_data['no_telp'];

if (isset($_POST['update'])) {
		$id_petugas = $_POST['id_petugas'];
		$nama_petugas = $_POST['nama_petugas'];
		$JK = $_POST['JK'];
		$alamat = $_POST['alamat'];
		$no_telp =$_POST['no_telp'];


$result1 = mysqli_query($mysqli, "UPDATE petugas SET nama_petugas='$nama_petugas',JK='$JK',alamat='$alamat',no_telp='$no_telp' WHERE id_petugas=$id_petugas");

		if($result1) {
			header('Location: addpetugas.php');
		} else {
			echo "Salah";
		}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Edit Petugas</title>
</head>

<body>
	<h1 align="center">EDIT Petugas</h1>

	<a href="../index.php"><button style="background-color: white; font-family: roboto;">Homepage</button></a>
	<a href="addpetugas.php"><button style="background-color: white; font-family: roboto;">Kembali</button></a>
	<br><br>

	<form name="update_petugas" method="POST" action="">
		<table border='0'>
			<tr>
				<td>Nama Petugas</td>
				<td><input type="text" name="nama_petugas" value="<?php echo $nama_petugas ?>"></td>
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
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $alamat ?></textarea></td>
			</tr>
			<tr>
				<td>Nomor Telpon</td>
				<td><input type="text" name="no_telp" value="<?php echo $no_telp ?>"></td>
			</tr>
			<td><input type="hidden" name="id_petugas" value="<?php echo $id_petugas;?>"></td>
			<td><input type="submit" name="update" value="Update" style="background-color: white; font-family: roboto;">
			</td>
			</tr>
		</table>
	</form>

</body>

</html>