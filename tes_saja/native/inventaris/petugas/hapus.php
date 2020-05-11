<?php

    include '../connection.php';

    $id_pegawai = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai");

    if ($hapus) {
        $_SESSION['status'] = 'pegawai berhasil dihapus !';
    }
        else {
            $_SESSION['status'] = 'pegawai gagal dihapus !';
        }

    header('Location: lihat.php');

?>
