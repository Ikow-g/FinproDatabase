<?php
include("../config.php");
if (isset($_POST['update'])) 
{
	$id_penerbit = $_POST['id'];
	$nama_penerbit = $_POST['nama'];
	$no_telp = $_POST['nomor'];
	$alamat = $_POST['alamat'];

$result = mysqli_query($mysqli, "UPDATE penerbit SET nama_penerbit='$nama_penerbit',alamat='$alamat',no_telp='$no_telp' WHERE id_penerbit=$id_penerbit");

		header("Location: addpenerbit.php");
}
?>

<?php
$id_penerbit = $_GET['id_penerbit'];

$result2 = mysqli_query($mysqli, "SELECT*FROM penerbit WHERE id_penerbit=$id_penerbit");


$user_data = mysqli_fetch_array($result2);
	$nama_penerbit = $user_data['nama_penerbit'];
	$alamat = $user_data['alamat'];
	$no_telp = $user_data['no_telp'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Edit Penerbit</title>
</head>

<body>
	<h1 align="center">EDIT PENERBIT</h1>

	<a href="../index.php"><button style="background-color: white; font-family: roboto;">Homepage</button></a>
	<a href="addpenerbit.php"><button style="background-color: white; font-family: roboto;">Kembali</button></a>
	<br><br>

	<form name="update_penerbit" method="POST" action="editpenerbit.php">
		<table border='0'>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama_penerbit;?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $alamat;?></textarea></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td><input type="number" name="nomor" value="<?php echo $no_telp;?>"></td>
			</tr>
			<td><input type="hidden" name="id" value="<?php echo $_GET['id_penerbit'];?>"></td>
			<td><input type="submit" name="update" value="Update" style="background-color: white; font-family: roboto;">
			</td>
			</tr>
		</table>
	</form>

</body>

</html>