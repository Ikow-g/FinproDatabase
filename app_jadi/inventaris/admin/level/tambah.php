<?php  
	include '../../connection.php';
	$title = 'Tambah Data Level';

	if ($_POST) {
		$hak_akses = $_POST['nama_level'];

		$simpan = mysqli_query($connect, "INSERT INTO tb_level VALUES('', '$hak_akses')");

		if ($simpan) {
			$_SESSION['status'] = 'Hak akses baru berhasil ditambahkan!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Hak akses gagal ditambahkan!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Tambah Hak Akses</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Hak Akses</label>
				<input type="text" name="nama_level" required>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>