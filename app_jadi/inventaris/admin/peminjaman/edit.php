<?php  
	include '../../connection.php';
	$title = 'Tambah Data Petugas';

	$id_petugas = $_GET['id'];
	$level = mysqli_query($connect, "SELECT * FROM tb_level ORDER BY id_level ASC ");
	$petugas = mysqli_query($connect, "SELECT * FROM tb_petugas WHERE id_petugas = '$id_petugas'");
	$data = mysqli_fetch_array($petugas);

	if ($_POST) {
		$id_level = $_POST['level'];
		$username = $_POST['username'];
		$nama_petugas = $_POST['nama_petugas'];
		

		$simpan = mysqli_query($connect, "UPDATE tb_petugas SET id_level ='$id_level', username = '$username' ,nama_petugas = '$nama_petugas'
			WHERE id_petugas = '$id_petugas'");

		if ($simpan) {
			$_SESSION['status'] = 'Petugas baru berhasil Diubah!';

			header('Location: lihat.php');
		} 
		else {
			echo 'Petugas gagal Diubah!';
			echo mysqli_error($connect);
		}
	}
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Edit Data Petugas</h1>

		<form method="post" action="">
			<div class="input-wrapper">
				<label>Nama Petugas</label>
				<input type="text" value="<?= $data['nama_petugas'] ?>" name="nama_petugas" required>
			</div>

			<div class="input-wrapper">
				<label>Username</label>
				<input type="text" value="<?= $data['username'] ?>" name="username" required>
			</div>

			<div class="input-wrapper">
				<label>Password</label>
				<input type="password" value="<?= $data['password'] ?>" name="password" required>
			</div>

			<div class="input-wrapper">
				<label>Hak Akses</label>
				<select name="level">
					<?php  
						while ($data_level = mysqli_fetch_array($level)) { ?>
							<option value="<?= $data_level['id_level'] ?>">
								<?= $data_level['nama_level'] ?>
							</option>
						<?php }
					?>
				</select>
			</div>

			<button type="submit">Simpan</button>
		</form>
	</main>

<?php include '../layouts/footer.php'; ?>