<?php  
	include '../../connection.php';
	$title = 'Tambah Data Petugas';

	$pegawai = mysqli_query($connect, "SELECT nama_pegawai,id_pegawai FROM tb_pegawai ORDER BY nama_pegawai ASC");
	$inventaris = mysqli_query($connect, "SELECT nama,id_inventaris FROM tb_inventaris ORDER BY nama ASC");


	if ($_POST) {

		$pegawai = $_POST['pegawai'];
		$barang = $_POST['barang'];
		$jumlah = $_POST['jumlah'];
		$tanggal_masuk = date('Y-m-d H:i:s');

		$simpan_masuk = mysqli_query($connect, "INSERT INTO tb_barang_masuk VALUES('', '$pegawai', '$tanggal_masuk')");

		if ($simpan_masuk) {
			$id = $connect -> insert_id;

			$simpan_detail = mysqli_query($connect, "INSERT INTO tb_detail_bm VALUES ( '', '$id', '$barang', '$jumlah' )");

			$_SESSION['status'] = 'Peminjaman Baru Berhasil ditambah';
			header('Location:lihat.php');
		} else {
			$_SESSION['status'] = 'Peminjaman baru Gagal ditambah';
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Pinjam Barang</h1>
		<form method="post" action="">
		<div class="input-wrapper">
				<label>Nama Pegawai</label>
				<select name="pegawai">
					<?php  
						while ($data_pegawai = mysqli_fetch_array($pegawai)) { ?>
							<option value="<?php echo $data_pegawai['id_pegawai'] ?>">
								<?php echo $data_pegawai['nama_pegawai'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>


		
			<div class="input-wrapper">
				<label>Barang</label>
				<select name="barang">
					<?php  
						while ($data_inventaris = mysqli_fetch_array($inventaris)) { ?>
							<option value="<?php echo $data_inventaris['id_inventaris'] ?>">
								<?php echo $data_inventaris['nama'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>

			<div class="input-wrapper">
				<label>Jumlah</label>
				<input type="number" name="jumlah" required>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>