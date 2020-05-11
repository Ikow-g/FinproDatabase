<?php 

    require_once '../conn.php';
    if(!isset($_SESSION["login"]))
    {
    
    header('Location: main/index.php');
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
case 'batal':
    $id_pembayaran = $req->id_pembayaran;

    $sql2 = "SELECT pembayaran.*,spp_siswa.nominal FROM pembayaran JOIN spp_siswa ON pembayaran.nisn=spp_siswa.nisn
    WHERE id_pembayaran = '$id_pembayaran'";
    $data_pembayaran_lama = mysqli_fetch_object(mysqli_query($con,$sql2));
    $d = $data_pembayaran_lama;

    $sql = "UPDATE pembayaran SET status = 0,id_petugas=NULL,tanggal_bayar=NULL WHERE bulan =
    '$d->bulan'";
    $batal = mysqli_query($con,$sql);

    if($batal){
        $nonimal_baru = $d->nominal + $d->jumlah_bayar;
        $sql = "UPDATE spp_siswa SET nominal = '$nonimal_baru' WHERE nisn = '$d->nisn'";
        $update_spp_siswa = mysqli_query($con,$sql);
        if($update_spp_siswa){
            $bulan_p = $d->bulan+1;
            $sql = "DELETE FROM pembayaran WHERE bulan ='$bulan_p' AND nisn = '$d->nisn'";
            $del_pembayaran = mysqli_query($con,$sql);
            if($del_pembayaran){
                mysqli_close($con);
                flask('Pembatalan Berhasil','pembayaran.php?nisn='.$d->nisn.'');
            }else{
                echo ' Error: '. mysqli_error($con);
                mysqli_close($con);
            }
        }else{
            echo ' Error: '. mysqli_error($con);
            mysqli_close($con);
        }
    }else{
        echo ' Error: '. mysqli_error($con);
        mysqli_close($con);
    }
break;
case 'bayar':

    $id_petugas = $_SESSION['user']['id_n'];
    $id_pembayaran = $req->id_pembayaran;

    $sql2 = "SELECT pembayaran.*,spp_siswa.nominal FROM pembayaran JOIN spp_siswa ON pembayaran.nisn=spp_siswa.nisn
    WHERE id_pembayaran = '$id_pembayaran'";
    $data_pembayaran_lama = mysqli_fetch_object(mysqli_query($con,$sql2));
    $d = $data_pembayaran_lama;

    $date = date('Y-m-d');
    $sql = "UPDATE pembayaran SET status = '1',id_petugas='$id_petugas',tanggal_bayar='$date' WHERE id_pembayaran = '$id_pembayaran'";
    $bayar = mysqli_query($con,$sql);

    if($bayar){
        $nonimal_baru = $d->nominal - $d->jumlah_bayar;
        $sql = "UPDATE spp_siswa SET nominal = '$nonimal_baru' WHERE nisn = '$d->nisn'";
        $update_spp_siswa = mysqli_query($con,$sql);
        if($update_spp_siswa){
        $bulan = $d->bulan + 1;
        if($d->bulan < 12){
            $sql = "INSERT INTO pembayaran VALUES(NULL,NULL,'$bulan','$d->tahun','$d->jumlah_bayar','0','$d->nisn',NULL)";
            $tagihan_berikutnya = mysqli_query($con,$sql);
            if($tagihan_berikutnya){
                mysqli_close($con);
                flask('Pembayaran Berhasil','pembayaran.php?nisn='.$d->nisn.'');
            }else{
                echo 'Error: '. mysqli_error($con);
                mysqli_close($con);
            }
        }else{
            mysqli_close($con);
            flask('Pembayaran Berhasil','pembayaran.php?nisn='.$d->nisn.'');
        }
    }else{
        echo 'Error: '. mysqli_error($con);
        mysqli_close($con);
    }
    }else{
        echo 'Error: '. mysqli_error($con);
        mysqli_close($con);
    }
    
break;
default : 
        die('error');
    break;
}