<?php 

    require_once '../conn.php';

    if(!isset($_SESSION["login"]))
    {
        header('Location: main/index.php');
    }
switch ($req->aksi) {
case 'tambah':
    $stmt = mysqli_stmt_init($con);
    $id_user = mysqli_fetch_object(mysqli_query($con,"SELECT MAX(id_user) as m FROM petugas"));
    $new_id_user = $id_user->m + 1;
    $username = $req->level.$new_id_user;
    $password = password_hash(date('dmY'),PASSWORD_DEFAULT);
    $sql = "INSERT INTO user(id_user,username,password) VALUES(?,?,?)" ;
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "sss", $new_id_user,$username,$password);

        $insert_user = mysqli_stmt_execute($stmt);

        if($insert_user){
            mysqli_stmt_close($stmt);

            $stmt = mysqli_stmt_init($con);
            $sql = "INSERT INTO petugas(nama_petugas,no_telp,alamat,level,id_user) VALUES(?,?,?,?,?)";
                if(mysqli_stmt_prepare($stmt, $sql))
                {
                    mysqli_stmt_bind_param($stmt, "sissi", $req->nama_petugas,$req->nomor_telepon,$req->alamat,$req->level,$new_id_user);

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
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else{
        echo 'Error: '. mysqli_error($con);
    }


    exit;
    break;
case 'hapus':

    if($req->id_petugas == $_SESSION['user']['id_n']){
        mysqli_close($con);
        flask('Tidak dapat menghapus diri sendiri','index.php');
    }else{
        $check_petugas = mysqli_query($con,"SELECT id_pembayaran FROM pembayaran WHERE id_petugas = '$req->id_petugas'");
        if(mysqli_num_rows($check_petugas)>0){
        mysqli_close($con);
        flask('Terdapat pembayaran yang terkait','index.php');
        }
    }

    $sql = "DELETE FROM user WHERE id_user = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $req->id_user);

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
    $sql = "UPDATE petugas SET nama_petugas = ?, no_telp = ?, alamat = ?, level = ? WHERE id_petugas = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "sissi",
        $req->nama_petugas,$req->nomor_telepon,$req->alamat,$req->level,$req->id_petugas);

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