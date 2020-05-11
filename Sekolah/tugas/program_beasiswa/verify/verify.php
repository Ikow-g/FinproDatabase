<?php
    require_once '../conn.php';

    $id = $request->nuka;

    $real_id = explode('iddi',$id);

    $sql = "UPDATE siswa SET isVerify=TRUE WHERE id_siswa='$real_id[1]'";
    $query = mysqli_query($conn,$sql);

    if($query){
        flask('Berhasil verifikasi akun','../index.php');
    }else{
        flask('terjadi kesalahan silahkan coba lagi','../index.php');
    }