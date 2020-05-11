<?php 

    require_once '../conn.php';

    if(!isset($_SESSION["login"]))
    {
    header("location: auth/login.php");
    }
switch ($req->aksi) {
    case 'tambah':
        
    $stmt = mysqli_stmt_init($con);
    $sql = "SELECT nisn FROM siswa WHERE nisn = ?";

    if(mysqli_stmt_prepare($stmt,$sql)){
        mysqli_stmt_bind_param($stmt, "s", $req->nisn);

        mysqli_stmt_execute($stmt);

        $nisn = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($nisn) > 0){
            flask('NISN sudah terdaftar','index.php');
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_stmt_close($stmt);

    $data_spp = mysqli_query($con,"SELECT id_spp,nominal FROM spp WHERE status = '1'");
    if(mysqli_num_rows($data_spp) < 1){
        mysqli_close($con);
        flask('Belum ada SPP yang aktif','index.php');
    }
    $spp = mysqli_fetch_object($data_spp);

    $stmt = mysqli_stmt_init($con);
    $password = password_hash($req->nisn,PASSWORD_DEFAULT);
    $sql = "INSERT INTO user(id_user,username,password) VALUES(?,?,?)" ;
    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "sss", $req->nisn,$req->nisn,$password);

        $insert_user = mysqli_stmt_execute($stmt);

        if($insert_user){
            mysqli_stmt_close($stmt);

            $stmt = mysqli_stmt_init($con);
            $sql = "INSERT INTO siswa(nisn,nama,alamat,jk,no_telp,id_kelas) VALUES(?,?,?,?,?,?)";
                if(mysqli_stmt_prepare($stmt, $sql))
                {
                    mysqli_stmt_bind_param($stmt, "ssssii", $req->nisn,$req->nama_siswa,$req->alamat,$req->jk,$req->nomor_telepon,$req->kelas);

                    $insert_siswa = mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

                    if($insert_siswa){
                        $sql = "INSERT INTO spp_siswa(nominal,nisn,id_spp) VALUES(?,?,?)";
                        $stmt = mysqli_stmt_init($con);
                        if(mysqli_stmt_prepare($stmt, $sql))
                        {
                            mysqli_stmt_bind_param($stmt, "isi",
                            $spp->nominal,$req->nisn,$spp->id_spp);
                            $insert_spp_siswa = mysqli_stmt_execute($stmt);
                            if($insert_spp_siswa){
                                mysqli_stmt_close($stmt);
                                $sql = "INSERT INTO pembayaran(bulan,tahun,jumlah_bayar,status,nisn)
                                VALUES(?,?,?,?,?)";
                                $stmt = mysqli_stmt_init($con);
                                if(mysqli_stmt_prepare($stmt,$sql)){
                                    $tahun = date('Y');
                                    $status = 0;
                                    $jan = 1;
                                    $jumlah_bayar = $spp->nominal / 12;
                                    mysqli_stmt_bind_param($stmt,'iiiis',$jan,$tahun,$jumlah_bayar,$status,$req->nisn);
                                    $insert_pembayaran = mysqli_stmt_execute($stmt);
                                    if($insert_pembayaran){
                                        mysqli_stmt_close($stmt);
                                        mysqli_close($con);
                                        flask('Berhasil Menambahkan Data','index.php');
                                    }else{
                                        echo 'Error: '. mysqli_error($con);
                                    }
                                }
                        }else{
                            echo 'Error: '. mysqli_error($con);
                        }
                        }else{
                            echo 'Error: '. mysqli_error($con);
                            }
                    }else{
                        echo 'Error: '. mysqli_error($con);
                    }
                }else{
                    echo 'Error: '. mysqli_error($con);
                }
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
    $sql = "DELETE FROM user WHERE id_user = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $req->nisn);

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

        $stmt = mysqli_stmt_init($con);
        $sql = "SELECT nisn FROM siswa WHERE nisn = ?";

        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt, "s", $req->nisn);

            mysqli_stmt_execute($stmt);

            $nisn = mysqli_stmt_get_result($stmt);
            $data_nisn = mysqli_fetch_object($nisn);
            if($data_nisn){
            
            if($data_nisn->nisn != $req->nisn_lama){
                if(mysqli_num_rows($nisn) > 0){
                    flask('NISN sudah terdaftar','index.php');
                    mysqli_stmt_close($stmt);
                }
            }
        }
    }
        mysqli_stmt_close($stmt);

    $stmt = mysqli_stmt_init($con);
    $sql = "UPDATE user SET id_user = ? WHERE id_user = ?";

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt,'ss',$req->nisn,$req->nisn_lama);
        $ubah_user = mysqli_stmt_execute($stmt);
        if($ubah_user){
        mysqli_stmt_close($stmt);
        $stmt = mysqli_stmt_init($con);
        $sql = "UPDATE siswa SET nisn = ?,nama = ?, no_telp = ?, alamat = ?, jk = ?,id_kelas=? WHERE nisn = ?";
        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ssissii",
            $req->nisn,$req->nama_siswa,$req->nomor_telepon,$req->alamat,$req->jk,$req->id_kelas,$req->nisn);
            $ubah = mysqli_stmt_execute($stmt);
            if($ubah)
            {
                mysqli_stmt_close($stmt);
                $password = password_hash($req->nisn,PASSWORD_DEFAULT);
                mysqli_query($con,"UPDATE user SET username ='$req->nisn',password='$password' WHERE id_user = '$req->nisn'");
                mysqli_close($con);
                flask('Berhasil Mengubah Data','index.php');
            }else{
                echo 'Error: '. mysqli_error($con);
            }
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else{
        echo 'Error: '. mysqli_error($con);
}}else{
    echo 'Error: '. mysqli_error($con);
}
mysqli_stmt_close($stmt);
mysqli_close($con);
break;
default : 
        die('error');
    break;
}