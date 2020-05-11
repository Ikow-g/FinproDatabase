<?php  
	include '../../connection.php';
	
	$id_inventaris = $_GET['id'];
	$query = mysqli_query($connect, "DELETE FROM tb_inventaris WHERE id_inventaris = 
		$id_inventaris");


	if ($query) {
		$_SESSION['status'] = 'Data Inventaris berhasil dihapus!';
	}
	else {
		$_SESSION['status'] = 'Data Inventaris gagal dihapus!';
	}

	header('Location: lihat.php');	
?>