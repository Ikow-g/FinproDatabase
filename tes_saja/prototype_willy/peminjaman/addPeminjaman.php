<?php
    require_once '../koneksi.php';

    $petugas = $_POST['petugas'];
    $anggota = $_POST['anggota'];
    $tanggal = $_POST['tanggal'];
    $bts_tanggal = $_POST['bts_tanggal'];
    $buku = $_POST['insert_buku'];
    $explode = explode(',',$buku);

    $sql = "INSERT INTO peminjaman VALUES('','$petugas','$anggota','$tanggal','$bts_tanggal')";

    $insert_peminjaman = mysqli_query($conn,$sql);

    if($insert_peminjaman){
        $id_peminjaman = mysqli_insert_id($conn);
        for($no = 0; $no < count($explode); $no++){
            if($explode[$no]){
            $sql2 = "INSERT INTO detail_pinjam VALUES('','$explode[$no]','$id_peminjaman',NULL,'Belum Kembali')";
            $insert_detail = mysqli_query($conn,$sql2);
            }
        }
        if($insert_detail){ header('Location: index.php'); exit;}
    }
    echo mysqli_error($conn);
    exit;