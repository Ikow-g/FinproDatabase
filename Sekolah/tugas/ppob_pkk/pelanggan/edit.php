<?php 

include '../layout/header.php';

include '../layout/sidebar.php';
    $id = $request->id;

    $sql = 'SELECT * from tarif';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tarif = $stmt->fetchAll();

    $sql = 'SELECT * from pelanggan where id_pelanggan = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $pelanggan = $stmt->fetch();

?>

<div class="main_content">
    <div class="header">
        Edit Pelanggan
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="controller.php" method="POST">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Pelanggan</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama" placeholder="Nama Pelanggan"
                            value="<?= $pelanggan->nama_pelanggan ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">No KWH</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="no" placeholder="No KWH" value="<?= $pelanggan->no_kwh ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="alamat" placeholder="Alamat" value="<?= $pelanggan->alamat ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="Email" name="email" placeholder="email" value="<?= $pelanggan->email ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">No HP</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nomor" placeholder="No HP" value="<?= $pelanggan->no_hp ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Daya</label>
                    </div>
                    <div class="col-75">
                        <select name="tarif">
                            <option value="">Pilih Daya</option>
                            <?php foreach($tarif as $dt) : ?>
                            <option value="<?= $dt->id_tarif ?>"
                                <?= $dt->id_tarif == $pelanggan->id_tarif ? 'selected' : '' ?>><?= $dt->daya ?>VA || Rp.
                                <?= $dt->tarif_perkwh ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="act" value="update">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>