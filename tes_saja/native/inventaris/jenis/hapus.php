<?php

    include '../connection.php';

    $id_jenis = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM jenis WHERE id_jenis = $id_jenis");

    if ($hapus) {
        $_SESSION['status'] = 'Jenis berhasil dihapus !';
    }
        else {
            $_SESSION['status'] = 'Jenis gagal dihapus !';
        }

    header('Location: lihat.php');

?>