<?php

include '../layout/header.php';
include '../asset/functions/MY.function.php';
$id_pelanggan = $request->id;

$bulan = '';$tahun = '';$awal ='';
$sql = 'SELECT penggunaan.meter_akhir,penggunaan.bulan,penggunaan.tahun,pelanggan.*,tarif.daya,tarif.tarif_perkwh 
        FROM penggunaan JOIN pelanggan ON penggunaan.id_pelanggan = pelanggan.id_pelanggan
        JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif
        WHERE penggunaan.id_pelanggan = ? ORDER BY id_penggunaan DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_pelanggan]);

if($stmt->rowCount() < 1) {
    $sql = 'SELECT pelanggan.*,tarif.daya,tarif.tarif_perkwh from pelanggan JOIN tarif
            ON pelanggan.id_tarif = tarif.id_tarif 
            WHERE pelanggan.id_pelanggan = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_pelanggan]);
    $data = $stmt->fetch();
}else{
    $data = $stmt->fetch();
    $bulan = $data->bulan  == 12 ? 1 : $data->bulan + 1;
    $tahun = $bulan == 1 ? $data->tahun + 1 : $data->tahun;
    $awal = $data->meter_akhir;
}
?>
<style>
    /* [list]::-webkit-calendar-picker-indicator {
        display: none;
    } */
    select {
        -webkit-appearance: none;
    }
</style>
<?php
include '../layout/sidebar.php';
?>

<div class="main_content">
    <div class="header">
        Tambah Penggunaan <?=$data->nama_pelanggan?>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="detail.php?id=<?=$data->id_pelanggan?>">
                    <button class="btn-back">Kembali</button>
                </a>
            </div>
            <form action="controller.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nomor KWh</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nomor_kwh" placeholder="Nomor KWh Pelanggan"
                            value="<?= $data->no_kwh ?>" readonly>
                        <input type="hidden" name="id_pelanggan" value="<?=$data->id_pelanggan?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Bulan Tahun</label>
                    </div>
                    <div class="col-75">
                        <div class="col-25">
                            <label for="fname">Bulan</label>
                            <select name="bulan" <?= $awal ? 'disabled' : 'required'?>>
                                <option value=''>--- Pilih Bulan ---</option>
                                <?php bulan($bulan); ?>
                            </select>
                            <input type="hidden" name="bulan2" value="<?= $bulan ?>">
                        </div>
                        <div class="col-25">
                            <label for="fname">Tahun</label>
                            <select name="tahun" <?= $awal ? 'disabled' : 'required '?>>
                                <option value="">--- Pilih Tahun ---</option>
                                <?php tahun($tahun) ?>
                            </select>
                            <input type="hidden" name="tahun2" value="<?= $tahun ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Pelanggan</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama" placeholder="Nama Pelanggan" value="<?= $data->nama_pelanggan ?>"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="email" placeholder="Email" value="<?= $data->email ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea cols="30" rows="10" style="resize:none;" readonly><?= $data->alamat ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Tarif per KWh</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="tarif" placeholder="Tarif"
                            value="<?= $data->daya . ' VA || RP '. $data->tarif_perkwh?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Meter Awal</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="awal" placeholder="Meter Awal" value="<?= $data->meter_akhir ?? '0'?>"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Meter Akhir</label>
                    </div>
                    <div class="col-75">
                        <input type="number" id="akhir" name="akhir" placeholder="Meter Akhir"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="act" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>
<script src="<?=PATH?>/asset/js/penggunaan.js"></script>