<?php

    include '../connection.php';

    $id_ruang = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM ruang WHERE id_ruang = $id_ruang");

    if ($hapus) {
        $_SESSION['status'] = 'ruang berhasil dihapus !';
    }
        else {
            $_SESSION['status'] = 'ruang gagal dihapus !';
        }

    header('Location: lihat.php');

?>