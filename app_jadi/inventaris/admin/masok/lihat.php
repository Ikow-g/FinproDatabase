<?php  
	include '../../connection.php';
	$title = 'Data Barang Masuk';

	$query = mysqli_query($connect, "SELECT * FROM tb_barang_masuk JOIN tb_pegawai ON tb_pegawai.id_pegawai = tb_barang_masuk.id_pegawai ORDER BY nama_pegawai ASC");
?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Lihat Data Barang Masuk</h1>
		<a href="tambah.php">Tambah Data Barang Masuk</a>

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
					<th>Tanggal Barang Masuk</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama_pegawai'] ?></td>
							<td><?php echo $data['tanggal_masuk'] ?></td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../layouts/footer.php' ?>