<?php  
	include '../../connection.php';
	$title = 'Tambah Data Ruang';

	if ($_POST) {
		$nama_ruang = $_POST['nama_ruang'];
		$kode_ruang = $_POST['kode_ruang'];
		$keterangan = $_POST['keterangan'];

		$simpan = mysqli_query($connect, "INSERT INTO tb_ruang VALUES('', '$nama_ruang', '$kode_ruang', '$keterangan')");

		if ($simpan) {
			$_SESSION['status'] = 'Ruang baru berhasil ditambahkan!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Ruang gagal ditambahkan!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Tambah Ruang</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Ruang</label>
				<input type="text" name="nama_ruang" required>
			</div>

			<div class="input-wrapper">
				<label>Kode Ruang</label>
				<input type="text" name="kode_ruang" required>
			</div>

			<div class="input-wrapper">
				<label>Keterangan</label>
				<textarea name="keterangan" required></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>