<?php  
	include '../../connection.php';
	
	$id_pegawai = $_GET['id'];
	$hapus = mysqli_query($connect, "DELETE FROM tb_pegawai WHERE id_pegawai = $id_pegawai");

	if ($hapus) {
		$_SESSION['status'] = 'Pegawai berhasil dihapus!';
	}
	else {
		$_SESSION['status'] = 'Pegawai gagal dihapus!';
	}

	header('Location: lihat.php');	
?>