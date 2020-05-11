<?php  
	include '../../connection.php';
	$title = 'Lihat Data Peminjaman';
	$query = mysqli_query($connect, "SELECT * FROM tb_peminjaman JOIN tb_pegawai ON tb_pegawai.id_pegawai = tb_peminjaman.id_pegawai ORDER BY nama_pegawai ASC");
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Lihat Data Peminjaman</h1>
		<a href="tambah.php">Tambah Data Peminjaman</a>

		<?php if (ISSET($_SESSION['status'])): ?>
			<div class="status-wrapper">
				<h4><?php echo $_SESSION['status'] ?></h4>
			</div>
		<?php endif ?>

		<table border="1" class="table table-dark">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Pegawai</th>
					<th>Tanggal Peminjam</th>
					<th>Tanggal Kembali</th>
					<th>Status Peminjaman</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama_pegawai'] ?></td>
							<td><?php echo $data['tanggal_pinjam'] ?></td>
							<td><?php echo $data['tanggal_kembali'] ?></td>
							<td><?php echo $data['status_peminjaman'] ?></td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../layouts/footer.php' ?>