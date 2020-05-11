<?php
    require_once '../../setting/conection.php';

    $id_peminjaman = $_GET['id_peminjaman'];
    $id_detail = $_GET['id_detail'];

    $sql = 'DELETE FROM tb_detailpinjam WHERE id_detailpinjam = ?';
    $stmtFordetail = $pdo->prepare($sql);
    $stmtFordetail->execute([$id_detail]);

    $sql = 'SELECT status,id_peminjaman FROM tb_detailpinjam WHERE id_peminjaman = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_peminjaman]);
    $data = $stmt->fetchAll();
    
    if($stmt->rowCount() < 1){
        $sql = 'DELETE FROM tb_peminjaman WHERE id_peminjaman = ?';
        $stmtForpeminjaman = $pdo->prepare($sql);
        $stmtForpeminjaman->execute([$id_peminjaman]);
        header('Location: index.php');
        exit;
    }
    foreach($data as $dt){
        if($dt->status != 'sudah kembali' && $dt->status != 'lunas'){
            header('Location: detail.php?id_peminjaman='.$id_peminjaman);
            exit;
        }
    }
        $sql = 'UPDATE tb_peminjaman SET status = ? WHERE id_peminjaman = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['tuntas',$id_peminjaman]);
        header('Location: detail.php?id_peminjaman='.$id_peminjaman);
        // exit;