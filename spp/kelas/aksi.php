<?php 

    require_once '../conn.php';

    if(!isset($_SESSION["login"]))
    {
    header("location: auth/login.php");
    }
switch ($req->aksi) {
case 'tambah':
    $sql = "INSERT INTO kelas(tingkatan_kelas,sub_kelas,id_jurusan) VALUES(?,?,?)";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "iii", $req->tingkatan_kelas,$req->sub_kelas,$req->jurusan);

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

    $check_kelas = mysqli_query($con,"SELECT nisn FROM siswa WHERE id_kelas = '$req->id_kelas'");
    if(mysqli_num_rows($check_kelas)>0){
        mysqli_close($con);
        flask('Terdapat siswa yang terkait','index.php');
    }


    $sql = "DELETE FROM kelas WHERE id_kelas = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $req->id_kelas);

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
    $sql = "UPDATE kelas SET sub_kelas = ?,tingkatan_kelas = ?,id_jurusan = ? WHERE id_kelas = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "iiii", $req->sub_kelas ,$req->tingkatan_kelas,$req->jurusan,$req->id_kelas);

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