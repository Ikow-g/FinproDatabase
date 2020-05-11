<?php  
	include '../../connection.php';
	$title = 'Tambah Data Inventaris';

	$id_inventaris = $_GET['id'];

	$jenis = mysqli_query($connect, "SELECT * FROM tb_jenis ORDER BY nama_jenis ASC");
	$ruang = mysqli_query($connect, "SELECT * FROM tb_ruang ORDER BY nama_ruang ASC");
	$petugas = mysqli_query($connect, "SELECT * FROM tb_petugas ORDER BY nama_petugas ASC");

	$inventaris = mysqli_query($connect, "SELECT * FROM tb_inventaris WHERE id_inventaris = '$id_inventaris'");

	$data = mysqli_fetch_array($inventaris);

	if ($_POST) {
		$nama = $_POST['nama'];
		$kondisi = $_POST['kondisi'];
		$keterangan = $_POST['keterangan'];
		$jumlah = $_POST['jumlah'];
		$kode_inventaris = $_POST['kode_inventaris'];
		$id_jenis = $_POST['jenis'];
		$id_ruang = $_POST['ruang'];
		$id_petugas = $_POST['petugas'];

		$simpan = mysqli_query($connect, "UPDATE tb_inventaris SET id_jenis = '$id_jenis',id_ruang = '$id_ruang',id_petugas = '$id_petugas', nama = '$nama',kondisi = '$kondisi',keterangan = '$keterangan',jumlah = '$jumlah',kode_inventaris = '$kode_inventaris' WHERE id_inventaris = '$id_inventaris'");

		if ($simpan) {
			$_SESSION['status'] = 'Data Inventaris berhasil Diubah!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Data Inventaris gagal Diubah!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Data Inventaris</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Barang</label> 
				<input type="text" value="<?= $data['nama'] ?>" name="nama" required>
			</div>

			<div class="input-wrapper">
				<label>Kondisi Barang</label>
				<input type="text"value="<?= $data['kondisi'] ?>" name="kondisi" required>
			</div>
			<div class="input-wrapper">
				<label>Jumlah Barang</label>
				<input type="text" value="<?= $data['jumlah'] ?>" name="jumlah" required>
			</div>
			<div class="input-wrapper">
				<label>Keterangan</label>
				<textarea name="keterangan" required><?= $data['keterangan'] ?></textarea>
			</div>
			<div class="input-wrapper">
				<label>Kode Inventaris</label>
				<input type="text" value="<?= $data['kode_inventaris'] ?>" name="kode_inventaris" required>
			</div>
			<div class="input-wrapper">
				<label>Jenis Barang</label>
				<select name="jenis">
					<?php  
						while ($data_jenis = mysqli_fetch_array($jenis)) { ?>
							<option <?= $data['id_jenis'] == $data_jenis['id_jenis'] ? 'selected' :''?> value="<?php echo $data_jenis['id_jenis'] ?>">
								<?php echo $data_jenis['nama_jenis'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>
			<div class="input-wrapper">
				<label>Nama Ruang</label>
				<select name="ruang">
					<?php  
						while ($data_ruang = mysqli_fetch_array($ruang)) { ?>
							<option <?= $data['id_ruang'] == $data_ruang['id_ruang'] ? 'selected' :''?> value="<?php echo $data_ruang['id_ruang'] ?>">
								<?php echo $data_ruang['nama_ruang'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>
			<div class="input-wrapper">
				<label>Nama Petugas</label>
				<select name="petugas">
					<?php  
						while ($data_petugas = mysqli_fetch_array($petugas)) { ?>
							<option <?= $data['id_petugas'] == $data_petugas['id_petugas'] ? 'selected' :''?> value="<?php echo $data_petugas['id_petugas'] ?>">
								<?php echo $data_petugas['nama_petugas'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>


			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>