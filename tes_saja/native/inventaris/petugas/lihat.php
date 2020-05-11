<?php  
	include '../connection.php';
	$title = 'Lihat Data Pegawai';

	$query = mysqli_query($conn, 
		"SELECT petugas.*, level.nama_level FROM petugas JOIN 
			level WHERE petugas.id_level = level.id_level");
?>
<?php include '../admin/layout/header.php' ?>

	<main>
		<h1>Lihat Pegawai</h1>
		<a href="tambah.php">Tambah Pegawai</a>

		<?php if (ISSET($_SESSION['status'])): ?>
			<div class="status-wrapper">
				<h4><?php echo $_SESSION['status'] ?></h4>
			</div>
		<?php endif ?>

		<table border="1">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Petugas</th>
					<th>Username</th>
					<th>Hak Akses</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama_petugas'] ?></td>
							<td><?php echo $data['username'] ?></td>
							<td><?php echo $data['nama_level'] ?></td>
							<td>
								<a href="edit.php?id=<?php echo $data['id_petugas'] ?>">Edit</a> |
								<a href="hapus.php?id=<?php echo $data['id_petugas'] ?>">Hapus</a>
							</td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../admin/layout/footer.php' ?>