<?php 

    require_once '../conn.php';

    if(!isset($_SESSION["login"]))
    {
    header('Location: main/index.php');
    }
switch ($req->aksi) {
case 'tambah':
    $sql = "INSERT INTO spp(tahun_ajaran,nominal,status) VALUES(?,?,?)";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        $tahun_ajaran = $req->dari.' - '.$req->sampai;
        $stat = 0;
        mysqli_stmt_bind_param($stmt, "sii", $tahun_ajaran,$req->nominal,$stat);

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
    if($req->status == 1){
        flask('data sedang aktif','index.php');
    }
    $sql = "DELETE FROM spp WHERE id_spp = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $req->id_spp);

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
case 'status':
    $check_active = mysqli_query($con,"SELECT id_spp,status FROM spp WHERE status = 1");
    if($req->status == 0){
        if(mysqli_num_rows($check_active) > 0){
            flask('Terdapat spp yang sudah aktif','index.php');
            mysqli_close($con);
        }
    }    
    if(mysqli_num_rows($check_active) > 0){
        $spp_active = mysqli_fetch_object($check_active);
        $check_lunas = mysqli_query($con,"SELECT nisn FROM spp_siswa WHERE id_spp = '$spp_active->id_spp' AND nominal != 0");
        if(mysqli_num_rows($check_lunas) > 0)
        {
            flask('Masih terdapat siswa yang belum lunas','index.php');
            mysqli_close($con);
        }
    }

    $sql = "UPDATE spp SET status = ? WHERE id_spp = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        $stat = $req->status == 1 ? 0 : 1;
        mysqli_stmt_bind_param($stmt, "ii", $stat ,$req->id_spp);

        $ubah = mysqli_stmt_execute($stmt);

        if($ubah)
        {
            if($stat == 1){
                $sql_siswa = "SELECT siswa.nisn,spp_siswa.nominal FROM siswa JOIN spp_siswa ON siswa.nisn = spp_siswa.nisn";
                $data_siswa = mysqli_query($con,$sql_siswa);
                $year = date('Y');
                while($siswa = mysqli_fetch_object($data_siswa)){
                    $spp_bayar = $siswa->nominal / 12;
                    $sql_pembayaran = "INSERT INTO pembayaran VALUES(NULL,NULL,1,'$year','$spp_bayar',0,'$siswa->nisn',NULL)";
                    $pembayaran = mysqli_query($con,$sql_pembayaran);
                    if(!$pembayaran){
                        echo 'Error: '. mysqli_error($con);
                        mysqli_stmt_close($stmt);
                        mysqli_close($con);
                        exit;
                    }
                }
            }
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