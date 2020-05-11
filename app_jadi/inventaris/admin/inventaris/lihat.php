<?php  
	include '../../connection.php';
	$title = 'Lihat Data Inventaris';

	$query = mysqli_query($connect, "SELECT tb_inventaris.*, tb_jenis.nama_jenis,tb_ruang.nama_ruang ,tb_petugas.nama_petugas FROM tb_inventaris 
		JOIN tb_jenis ON tb_jenis.id_jenis = tb_inventaris.id_jenis
		JOIN tb_ruang ON tb_ruang.id_ruang = tb_inventaris.id_ruang
		JOIN tb_petugas ON tb_petugas.id_petugas = tb_inventaris.id_petugas  ORDER BY nama ASC"); 

?>
<?php include '../layouts/header.php' ?>

	<main>
		<h1>Data Inventaris</h1>
		<a href="tambah.php">Tambah Data Inventaris</a>

		<?php if (ISSET($_SESSION['status'])): ?>
			<div class="status-wrapper">
				<h4><?php echo $_SESSION['status'] ?></h4>
			</div>
		<?php endif ?>

		<table border="1" class="table table-dark">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Barang</th>
					<th>Kondisi</th>
					<th>Jumlah</th>
					<th>Keterangan</th>
					<th>Tanggal Register</th>
					<th>Kode Invetaris</th>
					<th>Jenis Barang</th>
					<th>Nama Ruang</th>
					<th>Nama Petugas</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama'] ?></td>
							<td><?php echo $data['kondisi'] ?></td>
							<td><?php echo $data['jumlah'] ?></td>
							<td><?php echo $data['keterangan'] ?></td>
							<td><?php echo $data['tanggal_register'] ?></td>
							<td><?php echo $data['kode_inventaris'] ?></td>
							<td><?php echo $data['nama_jenis'] ?></td>
							<td><?php echo $data['nama_ruang'] ?></td>
							<td><?php echo $data['nama_petugas'] ?></td>
							<td>
								<a href="edit.php?id=<?php echo $data['id_inventaris'] ?>">Edit</a> |
								<a href="hapus.php?id=<?php echo $data['id_inventaris'] ?>">Hapus</a>
							</td>
						</tr>
					<?php $no++; }
				?>
			</tbody>
		</table>
	</main>

<?php include '../layouts/footer.php' ?>