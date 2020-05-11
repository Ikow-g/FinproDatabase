<?php
    require_once '../../setting/conection.php';

    $id_peminjaman = $_GET['id_peminjaman'];

    $sql = 'SELECT status FROM tb_peminjaman WHERE id_peminjaman = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_peminjaman]);
    $data = $stmt->fetch();
    if($data->status == 'belum tuntas'){
        echo '
            <script>
            alert("Peminjaman Masih belum tuntas");
            window.location.replace("http://localhost/sekolah/tugas/perpus/view/peminjaman/index.php");
            </script>';
    }else{
        $sql = 'DELETE FROM tb_peminjaman where id_peminjaman = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id_peminjaman]);
        header('Location: index.php');
    }