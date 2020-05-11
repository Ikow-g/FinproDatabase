<?php      
    require_once '../../setting/conection.php';

    $id_peminjaman = $_GET['id_peminjaman'];
    $id_detail = $_GET['id_detail'];

    $sql = 'UPDATE tb_detailpinjam SET status= ? , tanggal_kembali = ? WHERE id_detailpinjam= ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['sudah kembali',date('Y-m-d'),$id_detail]);

    $sql = 'SELECT status FROM tb_detailpinjam WHERE id_peminjaman = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_peminjaman]);
    $data = $stmt->fetchAll();

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