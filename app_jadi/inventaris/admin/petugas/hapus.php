<?php  
	include '../../connection.php';
	
	$id_petugas = $_GET['id'];
	$hapus = mysqli_query($connect, "DELETE FROM tb_petugas WHERE id_petugas = $id_petugas");

	if ($hapus) {
		$_SESSION['status'] = 'Petugas berhasil dihapus!';
	}
	else {
		$_SESSION['status'] = 'Petugas gagal dihapus!';
	}

	header('Location: lihat.php');	
?>