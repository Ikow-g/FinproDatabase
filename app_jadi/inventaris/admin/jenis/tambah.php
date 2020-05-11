<?php  
	include '../../connection.php';
	$title = 'Tambah Data Jenis';

	if ($_POST) {
		$nama_jenis = $_POST['nama_jenis'];
		$kode_jenis = $_POST['kode_jenis'];
		$keterangan = $_POST['keterangan'];

		$simpan = mysqli_query($connect, "INSERT INTO tb_jenis VALUES('', '$nama_jenis', '$kode_jenis', '$keterangan')");

		if ($simpan) {
			$_SESSION['status'] = 'Jenis baru berhasil ditambahkan!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Jenis gagal ditambahkan!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Tambah Jenis</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Jenis</label>
				<input type="text" name="nama_jenis" required>
			</div>

			<div class="input-wrapper">
				<label>Kode Jenis</label>
				<input type="text" name="kode_jenis" required>
			</div>

			<div class="input-wrapper">
				<label>Keterangan</label>
				<textarea name="keterangan" required></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>