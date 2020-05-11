<?php  
	include '../../connection.php';
	$title = 'Lihat Data Pegawai';

	$query = mysqli_query($connect, "SELECT * FROM tb_pegawai");
?>
<?php include '../layouts/header.php' ?>

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
					<th>Nama Pegawai</th>
					<th>NIP</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama_pegawai'] ?></td>
							<td><?php echo $data['nip'] ?></td>
							<td><?php echo $data['alamat'] ?></td>
							<td>
								<a href="edit.php?id=<?php echo $data['id_pegawai'] ?>">Edit</a> |
								<a href="hapus.php?id=<?php echo $data['id_pegawai'] ?>">Hapus</a>
							</td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../layouts/footer.php' ?>