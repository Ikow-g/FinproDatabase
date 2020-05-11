<?php  
	include '../../connection.php';
	$title = 'Edit Data Level';

	// ambil id level
	$id_level = $_GET['id'];

	// ambil data dari database
	$level = mysqli_query($connect, "SELECT * FROM tb_level WHERE id_level = '$id_level'");

	$data = mysqli_fetch_array($level);

	if ($_POST) {
		$hak_akses = $_POST['nama_level'];

		$simpan = mysqli_query($connect, "UPDATE tb_level SET nama_level = '$hak_akses' WHERE id_level = '$id_level'");

		if ($simpan) {
			$_SESSION['status'] = 'Hak akses berhasil diubah!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Hak akses gagal diubah!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php'; ?>

	<main>
		<h1>Tambah Hak Akses</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Hak Akses</label>
				<input type="text" value="<?php echo $data['nama_level'] ?>" name="nama_level" required>
			</div>

			<button type="submit">Simpan</button>
		</form>

	</main>

<?php include '../layouts/footer.php'; ?>