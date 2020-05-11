<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    $sql = 'SELECT * from tarif';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tarif = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        Tambah Pelanggan
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="controller.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Pelanggan</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="Nama Pelanggan" name="nama" placeholder="Nama Pelanggan">
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-25">
                        <label for="fname">No KWH</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="no" name="no" placeholder="No KWH">
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Email</label>
                    </div>
                    <div class="col-75">
                        <input type="Email" name="email" placeholder="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">No HP</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nomor" name="nomor" placeholder="No HP"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Daya</label>
                    </div>
                    <div class="col-75">
                        <select name="tarif">
                            <option value="">Pilih Tarif</option>
                            <?php foreach($tarif as $dt) : ?>
                            <option value="<?= $dt->id_tarif ?>"><?= $dt->daya ?> VA || Rp. <?= $dt->tarif_perkwh ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
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