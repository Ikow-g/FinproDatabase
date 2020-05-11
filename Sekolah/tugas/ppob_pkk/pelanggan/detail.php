<?php 

include '../layout/header.php';

include '../layout/sidebar.php';
    $id = $request->id;

    $sql = 'SELECT * from pelanggan JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif where id_pelanggan = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $pelanggan = $stmt->fetch();


?>

<div class="main_content">
    <div class="header">
        Detail Pelanggan <a style="text-transform:capitalize"><?= $pelanggan->nama_pelanggan ?></a>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Nama Pelanggan</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="nama" placeholder="Nama Pelanggan"
                        value="<?= $pelanggan->nama_pelanggan ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">No KWH</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="no" placeholder="No KWH" value="<?= $pelanggan->no_kwh ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Alamat</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="alamat" placeholder="Alamat" value="<?= $pelanggan->alamat ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Email</label>
                </div>
                <div class="col-75">
                    <input type="Email" readonly name="email" placeholder="email" value="<?= $pelanggan->email ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">No HP</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="nomor" placeholder="No HP" value="<?= $pelanggan->no_hp ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="fname">Tarif</label>
                </div>
                <div class="col-75">
                    <input type="text" readonly name="Tarif" placeholder="Tarif per KWH"
                        value="<?=$pelanggan->daya .' VA || RP.'. $pelanggan->tarif_perkwh ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>