<?php  
	include '../../connection.php';
	$title = 'Lihat Data Ruang';

	$query = mysqli_query($connect, "SELECT * FROM tb_ruang");
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Lihat Ruang</h1>
		<a href="tambah.php">Tambah Ruang</a>

		<?php if (ISSET($_SESSION['status'])): ?>
			<div class="status-wrapper">
				<h4><?php echo $_SESSION['status'] ?></h4>
			</div>
		<?php endif ?>

		<table border="1">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Ruang</th>
					<th>Kode Ruang</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama_ruang'] ?></td>
							<td><?php echo $data['kode_ruang'] ?></td>
							<td><?php echo $data['keterangan'] ?></td>
							<td>
								<a href="edit.php?id=<?php echo $data['id_ruang'] ?>">Edit</a> |
								<a href="hapus.php?id=<?php echo $data['id_ruang'] ?>">Hapus</a>
							</td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../layouts/footer.php' ?>