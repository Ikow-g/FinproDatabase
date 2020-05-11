<?php
  require_once '../../setting/conection.php';
  session_start();
  $id_anggota = $_POST['id_anggota'];
  $id_buku = $_POST['id_buku'];
  $count = $_POST['lines'];
  $date = date("Y-m-d");
  $petugas = $_SESSION['user']['id'];

  $sql_peminjaman = 'INSERT INTO tb_peminjaman(id_anggota, id_petugas, tanggal_peminjaman,status) VALUES(:id_anggota, :id_petugas, :tanggal_peminjaman,:status)';
  $stmt_peminjaman = $pdo->prepare($sql_peminjaman);
  $stmt_peminjaman->execute(['id_anggota' => $id_anggota, 'id_petugas' => $petugas, 'tanggal_peminjaman' => $date,'status' => 'belum tuntas']);

  
  $id_peminjaman = $pdo->lastInsertId();
  for($num = 0; $num <= $count;$num++){
    if($id_buku[$num])
    {
      $sql = 'INSERT INTO tb_detailpinjam(id_buku, id_peminjaman,status) VALUES(:id_buku, :id_peminjaman,:status)';
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['id_buku' => $id_buku[$num], 'id_peminjaman' => $id_peminjaman,'status'=>NULL]);
    }
  }
  header('location: index.php');