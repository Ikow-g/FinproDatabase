<?php
include("../config.php");
$id_buku = $_GET['id_buku'];
$result = mysqli_query($mysqli, "SELECT*FROM penulis ");
$result3 = mysqli_query($mysqli, "SELECT*from penerbit");
if (isset($_POST['update'])) {
		$idu_buku = $_POST['id'];
		$judul = $_POST['judul'];
		$penulis = $_POST['penulis'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$stok =$_POST['stok'];
		$penerbit=$_POST['penerbit'];


$result1 = mysqli_query($mysqli, "UPDATE buku SET judul='$judul',id_penulis='$penulis',tahun_terbit='$tahun_terbit',stok='$stok',id_penerbit='$penerbit' WHERE id_buku=$idu_buku");

		if($result1) {
			header('Location: addbuku.php');
		} else {
			echo "jancok";
		}
}

$result2 = mysqli_query($mysqli, "SELECT * FROM buku WHERE id_buku=$id_buku");


$user_data = mysqli_fetch_array($result2);
	$ide_buku = $user_data['id_buku'];
	$judul = $user_data['judul'];
	$penulis = $user_data['id_penulis'];
	$tahun_terbit = $user_data['tahun_terbit'];
	$stok = $user_data['stok'];
	$penerbit =$user_data['id_penerbit'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Edit Buku</title>
</head>

<body>
	<h1 align="center">EDIT BUKU</h1>

	<a href="index.php"><button style="background-color: white; font-family: roboto;">Homepage</button></a>
	<a href="addbuku.php"><button style="background-color: white; font-family: roboto;">Kembali</button></a>
	<br><br>

	<form name="update_buku" method="POST" action="editbuku.php">
		<table border='0'>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" value="<?php echo $judul ?>"></td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td><select name="penulis">
						<?php
					while($data=mysqli_fetch_array($result)):
					?>
						<option value="<?php echo $data['id_penulis']?>" <?php 
					echo $data['id_penulis'] == $penulis ? 'selected' : ''?>><?php echo $data['nama_penulis']?>
						</option>
						<?php 
					endwhile; 
					?>
					</select></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>
					<select name="tahun_terbit">
						<option>---Tahun Terbit</option>
						<option value="1996" <?php echo $tahun_terbit == '1996' ? 'selected':''?>>1996</option>
						<option value="1997" <?php echo $tahun_terbit == '1997' ? 'selected':''?>>1997</option>
						<option value="1998" <?php echo $tahun_terbit == '1998' ? 'selected':''?>>1998</option>
						<option value="1999" <?php echo $tahun_terbit == '1999' ? 'selected':''?>>1999</option>
						<option value="2000" <?php echo $tahun_terbit == '2000' ? 'selected':''?>>2000</option>
						<option value="2001" <?php echo $tahun_terbit == '2001' ? 'selected':''?>>2001</option>
						<option value="2002" <?php echo $tahun_terbit == '2002' ? 'selected':''?>>2002</option>
						<option value="2003" <?php echo $tahun_terbit == '2003' ? 'selected':''?>>2003</option>
						<option value="2004" <?php echo $tahun_terbit == '2004' ? 'selected':''?>>2004</option>
						<option value="2005" <?php echo $tahun_terbit == '2005' ? 'selected':''?>>2005</option>
						<option value="2006" <?php echo $tahun_terbit == '2006' ? 'selected':''?>>2006</option>
						<option value="2007" <?php echo $tahun_terbit == '2007' ? 'selected':''?>>2007</option>
						<option value="2008" <?php echo $tahun_terbit == '2008' ? 'selected':''?>>2008</option>
						<option value="2009" <?php echo $tahun_terbit == '2009' ? 'selected':''?>>2009</option>
						<option value="2010" <?php echo $tahun_terbit == '2010' ? 'selected':''?>>2010</option>
						<option value="2011" <?php echo $tahun_terbit == '2011' ? 'selected':''?>>2011</option>
						<option value="2012" <?php echo $tahun_terbit == '2012' ? 'selected':''?>>2012</option>
						<option value="2013" <?php echo $tahun_terbit == '2013' ? 'selected':''?>>2013</option>
						<option value="2014" <?php echo $tahun_terbit == '2014' ? 'selected':''?>>2014</option>
						<option value="2015" <?php echo $tahun_terbit == '2015' ? 'selected':''?>>2015</option>
						<option value="2016" <?php echo $tahun_terbit == '2016' ? 'selected':''?>>2016</option>
						<option value="2017" <?php echo $tahun_terbit == '2017' ? 'selected':''?>>2017</option>
						<option value="2018" <?php echo $tahun_terbit == '2018' ? 'selected':''?>>2018</option>
						<option value="2019" <?php echo $tahun_terbit == '2019' ? 'selected':''?>>2019</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jumlah Stok</td>
				<td><input type="number" name="stok" value="<?php echo $stok?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>
					<select name="penerbit">
						<?php
					while($data=mysqli_fetch_array($result3)):
					?>
						<option value="<?php echo $data['id_penerbit']?>" <?php 
					echo $data['id_penerbit'] == $penerbit ? 'selected' : ''?>><?php echo $data['nama_penerbit']?>
						</option>
						<?php 
					endwhile; 
					?>
					</select></td>
			</tr>
			<td><input type="hidden" name="id" value="<?php echo $ide_buku;?>"></td>
			<td><input type="submit" name="update" value="Update" style="background-color: white; font-family: roboto;">
			</td>
			</tr>
		</table>
	</form>

</body>

</html>