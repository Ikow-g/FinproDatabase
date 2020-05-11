<?php  
	include '../../connection.php';
	$title = 'Edit Data Pegawai';

	// ambil id level
	$id_pegawai = $_GET['id'];

	// ambil data dari database
	$ruang = mysqli_query($connect, "SELECT * FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'");

	$data = mysqli_fetch_array($ruang);

	if ($_POST) {
		$nama_pegawai = $_POST['nama_pegawai'];
		$nip = $_POST['nip'];
		$alamat = $_POST['alamat'];

		$simpan = mysqli_query($connect, "UPDATE tb_pegawai SET nama_pegawai = '$nama_pegawai', nip = '$nip', alamat = '$alamat' WHERE id_pegawai = '$id_pegawai'");

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
				<label>Nama Pegawai</label>
				<input type="text" value="<?php echo $data['nama_pegawai'] ?>" name="nama_pegawai" required>
			</div>

			<div class="input-wrapper">
				<label>NIP</label>
				<input type="text" value="<?php echo $data['nip'] ?>" name="nip" required>
			</div>

			<div class="input-wrapper">
				<label>Alamat</label>
				<textarea name="alamat" required><?php echo $data['alamat'] ?></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>

	</main>

<?php include '../layouts/footer.php'; ?>