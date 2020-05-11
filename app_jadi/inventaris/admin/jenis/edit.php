<?php  
	include '../../connection.php';
	$title = 'Edit Data Jenis';

	// ambil id level
	$id_jenis = $_GET['id'];

	// ambil data dari database
	$jenis = mysqli_query($connect, "SELECT * FROM tb_jenis WHERE id_jenis = '$id_jenis'");

	$data = mysqli_fetch_array($jenis);

	if ($_POST) {
		$nama_jenis = $_POST['nama_jenis'];
		$kode_jenis = $_POST['kode_jenis'];
		$keterangan = $_POST['keterangan'];

		$simpan = mysqli_query($connect, "UPDATE tb_jenis SET nama_jenis = '$nama_jenis', kode_jenis = '$kode_jenis', keterangan = '$keterangan' WHERE id_jenis = '$id_jenis'");

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
				<label>Nama Jenis</label>
				<input type="text" value="<?php echo $data['nama_jenis'] ?>" name="nama_jenis" required>
			</div>

			<div class="input-wrapper">
				<label>Kode Jenis</label>
				<input type="text" value="<?php echo $data['kode_jenis'] ?>" name="kode_jenis" required>
			</div>

			<div class="input-wrapper">
				<label>Hak Akses</label>
				<textarea name="keterangan" required><?php echo $data['keterangan'] ?></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>

	</main>

<?php include '../layouts/footer.php'; ?>