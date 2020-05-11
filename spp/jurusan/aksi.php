<?php 

    require_once '../conn.php';

    if(!isset($_SESSION["login"]))
    {
    header("location: auth/login.php");
    }
switch ($req->aksi) {
case 'tambah':
    $sql = "INSERT INTO jurusan(nama_jurusan) VALUES(?)";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $req->nama_jurusan);

        $insert = mysqli_stmt_execute($stmt);

        if($insert){
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            flask('Berhasil Menambahkan Data','index.php');
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else{
        echo 'Error: '. mysqli_error($con);
    }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    exit;
    break;
case 'hapus':
    $check_jurusan = mysqli_query($con,"SELECT id_kelas FROM kelas WHERE id_jurusan = '$req->id_jurusan'");
    if(mysqli_num_rows($check_jurusan)>0){
    mysqli_close($con);
    flask('Terdapat kelas yang terkait','index.php');
    }
    $sql = "DELETE FROM jurusan WHERE id_jurusan = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $req->id_jurusan);

        $del = mysqli_stmt_execute($stmt);

        if($del)
        {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            flask('Berhasil Menghapus Data','index.php');
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else{
        echo 'Error: '. mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
break;
case 'ubah':
    $sql = "UPDATE jurusan SET nama_jurusan = ? WHERE id_jurusan = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "si", $req->nama_jurusan ,$req->id_jurusan);

        $ubah = mysqli_stmt_execute($stmt);

        if($ubah)
        {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            flask('Berhasil Mengubah Data','index.php');
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else{
        echo 'Error: '. mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
break;
default : 
        die('error');
    break;
}