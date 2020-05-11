<?php  
	include '../../connection.php';
	$title = 'Tambah Data Pegawai';

	if ($_POST) {
		$nama_pegawai = $_POST['nama_pegawai'];
		$nip = $_POST['nip'];
		$alamat = $_POST['alamat'];

		$simpan = mysqli_query($connect, "INSERT INTO tb_pegawai VALUES('', '$nama_pegawai', '$nip', '$alamat')");

		if ($simpan) {
			$_SESSION['status'] = 'Pegawai baru berhasil ditambahkan!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Pegawai gagal ditambahkan!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Tambah Pegawai</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Pegawai</label>
				<input type="text" name="nama_pegawai" required>
			</div>

			<div class="input-wrapper">
				<label>NIP</label>
				<input type="text" name="nip" required>
			</div>

			<div class="input-wrapper">
				<label>Alamat</label>
				<textarea name="alamat" required></textarea>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>