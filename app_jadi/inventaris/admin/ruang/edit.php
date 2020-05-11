<?php  
	include '../../connection.php';
	$title = 'Edit Data Ruang';

	// ambil id level
	$id_ruang = $_GET['id'];

	// ambil data dari database
	$ruang = mysqli_query($connect, "SELECT * FROM tb_ruang WHERE id_ruang = '$id_ruang'");

	$data = mysqli_fetch_array($ruang);

	if ($_POST) {
		$nama_ruang = $_POST['nama_ruang'];
		$kode_ruang = $_POST['kode_ruang'];
		$keterangan = $_POST['keterangan'];

		$simpan = mysqli_query($connect, "UPDATE tb_ruang SET nama_ruang = '$nama_ruang', kode_ruang = '$kode_ruang', keterangan = '$keterangan' WHERE id_ruang = '$id_ruang'");

		if ($simpan) {
			$_SESSION['status'] = 'Jenis berhasil diubah!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Jenis gagal diubah!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php'; ?>

	<main>
		<h1>Edit Jenis</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Ruang</label>
				<input type="text" value="<?php echo $data['nama_ruang'] ?>" name="nama_ruang" required>
			</div>

			<div class="input-wrapper">
				<label>Kode Ruang</label>
				<input type="text" value="<?php echo $data['kode_ruang'] ?>" name="kode_ruang" required>
			</div>

			<div class="input-wrapper">
				<label>Hak Akses</label>
				<textarea name="keterangan" required><?php echo $data['keterangan'] ?></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>

	</main>

<?php include '../layouts/footer.php'; ?>