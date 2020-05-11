<?php  
	include '../../connection.php';
	$title = 'Lihat Data Petugas';

	$query = mysqli_query($connect, "SELECT * FROM tb_petugas JOIN tb_level WHERE tb_petugas.id_level = tb_level.id_level ORDER BY nama_petugas ASC");
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Lihat Data Petugas</h1>
		<a href="tambah.php">Tambah Data Petugas</a>

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

<?php include '../layouts/footer.php' ?>