<?php 
    require_once '../conn.php';

        if(!isset($_SESSION["login"]))
        {
        header("location: auth/login.php");
        }else if($_SESSION["user"]['level'] == 'siswa')
        {
        header("location:javascript://history.go(-1)");
        }

    $sql = "SELECT siswa.nama,siswa.nisn,spp_siswa.nominal AS sisa,kelas.tingkatan_kelas,kelas.sub_kelas,jurusan.nama_jurusan ,spp.nominal FROM siswa JOIN spp_siswa ON siswa.nisn = spp_siswa.nisn JOIN spp ON spp_siswa.id_spp = spp.id_spp JOIN kelas ON kelas.id_kelas = siswa.id_kelas JOIN jurusan ON jurusan.id_jurusan = kelas.id_jurusan";
    $data = mysqli_query($con,$sql);
    if(!$data){
        echo 'Error: '. mysqli_error($con);
        mysqli_close($con);
        exit;
    }

    $home = 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP</title>
    <style>
        #m_table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            vertical-align: middle;
        }

        th {
            height: 50px;
            background-color: #c8c8c8;
        }

        .td_s {
            height: 50px;
        }
    </style>
</head>

<body style="margin: 2% 5% 0% 5%">
    <input type="hidden" id="home" value="<?=$home?>">
    <center>
        <h2>SMK PASEO</h2>
        <h2>Laporan Pembayaran SPP</h2>
        <hr>
    </center>
    <br>
    <table border="1" id="m_table">
        <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jumlah</th>
            <th>Sisa Pembayaran</th>
        </thead>
        <?php while($dt = mysqli_fetch_object($data)):  ?>
        <tr>
            <td class="td_s"><?=$no++?></td>
            <td class="td_s"><?=$dt->nisn?></td>
            <td class="td_s"><?=$dt->nama?></td>
            <td><?= $dt->tingkatan_kelas.' '. $dt->nama_jurusan.' '. $dt->sub_kelas?></td>
            <td class="td_s"><?=number_format($dt->nominal)?></td>
            <td class="td_s"><?=number_format($dt->sisa)?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <!-- <br><br><br> -->
    <!-- <div style="float: right; margin-right:2%;">
        Samarinda , <?=date('d/m/Y')?><br>
        Petugas, <?=$_SESSION['user']['name']?>
        <br><br><br><br><br>
        _____________________
    </div> -->
</body>

<script>
    window.print();
    window.onafterprint = function () {
        home = document.getElementById('home').value;
        location.href = home;
    }
</script>

</html>