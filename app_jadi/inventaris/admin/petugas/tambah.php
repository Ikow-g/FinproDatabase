<?php  
	include '../../connection.php';
	$title = 'Tambah Data Petugas';

	$level = mysqli_query($connect, "SELECT * FROM tb_level ORDER BY nama_level ASC");

	if ($_POST) {
		$nama_petugas = $_POST['nama_petugas'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id_level = $_POST['level'];

		$simpan = mysqli_query($connect, "INSERT INTO tb_petugas VALUES('', $id_level, '$username', '$password', '$nama_petugas')");

		if ($simpan) {
			$_SESSION['status'] = 'Petugas baru berhasil ditambahkan!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Petugas gagal ditambahkan!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Tambah Pegawai</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Petugas</label>
				<input type="text" name="nama_petugas" required>
			</div>

			<div class="input-wrapper">
				<label>Username</label>
				<input type="text" name="username" required>
			</div>

			<div class="input-wrapper">
				<label>Password</label>
				<input type="password" name="password" required>
			</div>

			<div class="input-wrapper">
				<label>Hak Akses</label>
				<select name="level">
					<?php  
						while ($data_level = mysqli_fetch_array($level)) { ?>
							<option value="<?php echo $data_level['id_level'] ?>">
								<?php echo $data_level['nama_level'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>