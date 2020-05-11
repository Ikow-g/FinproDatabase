<?php
	include('../config.php');

	$result2 = mysqli_query($mysqli, "SELECT * FROM peminjaman JOIN 
	petugas ON peminjaman.id_petugas = petugas.id_petugas JOIN 
	anggota ON peminjaman.id_anggota = anggota.id_anggota ORDER BY id_pinjam DESC");

	$data_petugas = mysqli_query($mysqli, "SELECT*FROM petugas ");
	$data_anggota = mysqli_query($mysqli, "SELECT*FROM anggota ");
	$data_buku = mysqli_query($mysqli, "SELECT*FROM buku ");

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
	<title>Peminjaman</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../myStyle.css">
</head>

<body>
	<div class="container">
		<h1>FORM PEMINJAMAN </h1>
		<div class="form">
			<form action='addpetugas.php' method="POST" name"form3">
				<table>
					<tr>
						<td>Nama Petugas</td>
						<td>
							<select name="petugas" required>
								<option value="">--- Pilih Petugas ---</option>
								<?php while($petugas = mysqli_fetch_assoc($data_petugas)) {?>
								<option value="<?=$petugas['id_petugas']?>"><?=$petugas['nama_petugas']?></option>
								<?php  }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nama Anggota</td>
						<td>
							<select name="anggota" required>
								<option value="">--- Pilih Anggota ---</option>
								<?php while($anggota = mysqli_fetch_assoc($data_anggota)) {?>
								<option value="<?=$anggota['id_anggota']?>"><?=$anggota['nama_anggota']?></option>
								<?php  }?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Tanggal Pinjam</td>
						<td><input type="date" name="tanggal" required="true"></td>
					</tr>
					<tr>
						<td>Batas Pinjam</td>
						<td><input type="date" name="batas" required="true"></td>
					</tr>

					<tr>
						<td>Buku</td>
						<td>
							<select id="buku" required>
								<option value="">--- Pilih Buku ---</option>
								<?php while($buku = mysqli_fetch_assoc($data_buku)) {?>
								<option value="<?=$buku['id_buku']?>"><?=$buku['judul']?></option>
								<?php  }?>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="Submit" value="Simpan"
								style="background-color: white; font-family: roboto;"></td>
						<td><button type="button" id="push">Tambah Buku</button></td>
					</tr>
				</table>
			</form>
		</div>

		<div class="list-buku">
			<h4 align="center">List Buku </h4>
			<ul id="target">
			</ul>
		</div>

		<div class="clr"></div>
		<h2 align="center">List Peminjaman</h2>
		<table width="100%" border="1">
			<tr>
				<th width="5%">ID</th>
				<th width="20%">Nama Petugas</th>
				<th width="20%">Nama Anggota</th>
				<th width="15%">Tanggal Pinjam</th>
				<th width="25%">Tanggal Batas Akhir</th>
				<th width="25%">Aksi</th>
			</tr>

			<?php
			while ($user_data = mysqli_fetch_array($result2)){?>

			<tr>
				<td align='center'><?php echo $user_data['id_petugas'];?></td>
				<td align='center'><?php echo $user_data['nama_petugas'];?></td>
				<td align='center'><?php echo $user_data['nama_anggota'];?></td>
				<td align='center'><?php echo $user_data['tgl_pinjam'];?></td>
				<td align='center'><?php echo $user_data['tgl_batasakhir'];?></td>
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
	</div>
	<script src="../jquery_3.4.1.js"></script>
	<script src="peminjaman.js"></script>
</body>

</html>