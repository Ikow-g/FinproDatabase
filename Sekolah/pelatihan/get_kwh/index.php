<?php
    require_once 'conn.php';
    $sql = "SELECT * FROM pelanggan";
    $pelanggan = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Get KWH</title>
</head>

<body>
    <h1 id="txt">Pelanggan</h1>
    <a>Nomor Kwh</a><br><br>
    <select name="nomor" id="kwh">
        <option value="">--- Pilih no KWH</option>
        <?php while ($dt = mysqli_fetch_assoc($pelanggan)) { ?>
        <option value="<?= $dt['id_pelanggan'] ?>"><?= $dt['no_kwh'] ?></option>
        <?php } ?>
    </select><br><br>
    <a>Nama</a><br><br>
    <input type="text" id="nama" readonly><br><br>
    <a>Alamat</a><br><br>
    <textarea name="" id="alamat" cols="30" rows="10"></textarea><br><br>
    <a>Meter Awal</a><br><br>
    <input type="text" id="awal" readonly><br><br>
    <a>Meter Akhir</a><br><br>
    <input type="text" id="akhir"><br><br>
    <a>Bulan</a><br><br>
    <select name="" id="bulan">
        <option value="">--- PILIH BULAN ---</option>
        <?php for($bulan = 1;$bulan<=12;$bulan++){ ?>
        <option value="<?=$bulan?>"><?=$bulan?></option>
        <?php }?>
    </select><br><br>
    <a>Tahun</a><br><br>
    <select name="" id="tahun">
        <option value="">--- PILIH TAHUN ---</option>
        <?php for($tahun = date('Y'); $tahun >= 2000; $tahun--){ ?>
        <option value="<?=$tahun?>"><?=$tahun?></option>
        <?php }?>
    </select><br><br>
</body>
<script src="jquery_3.4.1.js"></script>
<script src="index.js"></script>

</html>