<?php  
	include '../../connection.php';
	
	$id_ruang = $_GET['id'];
	$hapus = mysqli_query($connect, "DELETE FROM tb_ruang WHERE id_ruang = $id_ruang");

	if ($hapus) {
		$_SESSION['status'] = 'Ruang berhasil dihapus!';
	}
	else {
		$_SESSION['status'] = 'Ruang gagal dihapus!';
	}

	header('Location: lihat.php');	
?>