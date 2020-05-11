<?php 
    require_once '../conn.php';

        if(!isset($_SESSION["login"]))
        {
        header("location: auth/login.php");
        }else if($_SESSION["user"]['level'] == 'siswa')
        {
        header("location:javascript://history.go(-1)");
        }

    $sql = "SELECT siswa.nama,spp_siswa.nominal AS sisa,kelas.tingkatan_kelas,kelas.sub_kelas,jurusan.nama_jurusan ,spp.nominal FROM siswa JOIN spp_siswa ON siswa.nisn = spp_siswa.nisn JOIN spp ON spp_siswa.id_spp = spp.id_spp JOIN kelas ON kelas.id_kelas = siswa.id_kelas JOIN jurusan ON jurusan.id_jurusan = kelas.id_jurusan where siswa.nisn = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $req->nisn);

        mysqli_stmt_execute($stmt);

        $data = mysqli_stmt_get_result($stmt);
        $dt = mysqli_fetch_object($data);

        mysqli_stmt_close($stmt);
    }else{
        echo 'Error: '. mysqli_error($con);
        exit;
    }

    $home = 'pembayaran.php?nisn='.$req->nisn;
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
        <h2>Slip Pembayaran SPP</h2>
        <hr>
    </center>
    <br>
    <table style="font-weight:bold;">
        <tr>
            <td>Nama :</td>
            <td><?=$dt->nama?></td>
        </tr>
        <tr>
            <td>Kelas :</td>
            <td><?= $dt->tingkatan_kelas.' '. $dt->nama_jurusan.' '. $dt->sub_kelas?></td>
        </tr>
    </table>
    <br>
    <table border="1" id="m_table">
        <thead>
            <th>No</th>
            <th>Jenis Pembayaran</th>
            <th>Jumlah</th>
            <th>Sisa Pembayaran</th>
        </thead>
        <tr>
            <td class="td_s">1</td>
            <td class="td_s">SPP</td>
            <td class="td_s"><?=number_format($dt->nominal)?></td>
            <td class="td_s"><?=number_format($dt->sisa)?></td>
        </tr>
    </table>
    <br><br><br>
    <div style="float: right; margin-right:2%;">
        Samarinda , <?=date('d/m/Y')?><br>
        Petugas, <?=$_SESSION['user']['name']?>
        <br><br><br><br><br>
        _____________________
    </div>
</body>

<script>
    window.print();
    window.onafterprint = function () {
        home = document.getElementById('home').value;
        location.href = home;
    }
</script>

</html>