<?php

include '../conection.php';

$id = $_GET['id'];
$hapus = mysqli_query($conn, "DELETE FROM kategori WHERE id = $id");

if ($hapus) {
    $_SESSION['status'] = 'Data berhasil dihapus !';
} else {
    $_SESSION['status'] = 'Data gagal dihapus !';
}

header('Location: lihat.php');
