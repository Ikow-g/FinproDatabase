<?php

    include '../connection.php';

    $id_level = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM level WHERE id_level = $id_level");

    if ($hapus) {
        $_SESSION['status'] = 'Hak berhasil dihapus !';
    }
        else {
            $_SESSION['status'] = 'Hak akses gagal dihapus !';
        }

    header('Location: lihat.php');

?>