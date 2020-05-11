<?php
include("../config.php");
if (isset($_POST['update'])) 
{
	$id_penulis = $_POST['id'];
	$nama_penulis = $_POST['nama'];
	$no_telp = $_POST['nomor'];

$result = mysqli_query($mysqli, "UPDATE penulis SET nama_penulis='$nama_penulis',no_telp='$no_telp'WHERE id_penulis=$id_penulis");

		header("Location: addpenulis.php");
}
?>

<?php
$id_penulis = $_GET['id_penulis'];

$result2 = mysqli_query($mysqli, "SELECT*FROM penulis WHERE id_penulis=$id_penulis");


while($user_data = mysqli_fetch_array($result2))
{
	$nama_penulis = $user_data['nama_penulis'];
	$no_telp = $user_data['no_telp'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Penulis</title>
</head>

<body>
	<h1 align="center">EDIT PENULIS</h1>

	<a href="../index.php"><button style="background-color: white; font-family: roboto;">Homepage</button></a>
	<a href="addpenulis.php"><button style="background-color: white; font-family: roboto;">Kembali</button></a>
	<br><br>

	<form name="update_penulis" method="POST" action="editpenulis.php">
		<table border='0'>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama_penulis;?>></td>
			</tr>
			<tr>
				<td>Nomor</td>
				<td><input type="integer" name="nomor" value=<?php echo $no_telp;?>></td>
			</tr>
			<td><input type="hidden" name="id" value=<?php echo $_GET['id_penulis'];?>></td>
			<td><input type="submit" name="update" value="Update" style="background-color: white; font-family: roboto;">
			</td>
			</tr>
		</table>
	</form>

</body>

</html>