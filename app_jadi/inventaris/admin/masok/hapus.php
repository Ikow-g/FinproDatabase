<?php  
	include '../../connection.php';
	
	$id_peminjaman = $_GET['id'];
	$hapus = mysqli_query($connect, "DELETE FROM tb_peminjaman WHERE id_peminjaman = $id_peminjaman");

	if ($hapus) {
		$_SESSION['status'] = 'Data Peminjaman berhasil dihapus!';
	}
	else {
		$_SESSION['status'] = 'Data Peminjaman gagal dihapus!';
	}

	header('Location: lihat.php');	
?>