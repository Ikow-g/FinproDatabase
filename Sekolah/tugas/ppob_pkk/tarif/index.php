<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    $no = 1;
    $sql = 'SELECT * from tarif';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tarif = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        <a>Data tarif</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info"><br>
        <?php if(isset($_SESSION['notice'])){ ?>
        <div class="<?=  $_SESSION['notice']['class'] ?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong><?=  $_SESSION['notice']['msg'] ?></strong>
        </div>
        <?php } unset($_SESSION['notice']);?>
        <a href="add.php"><button class="btn-tambah">Tambah</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Daya</th>
                    <th>Tarif_perkwh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tarif as $dt):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->daya?> VA</td>
                    <td>RP. <?= number_format($dt->tarif_perkwh)?></td>
                    <td>
                        <a href="controller.php?act=del&&id=<?=$dt->id_tarif?>"><button class="btn-del"
                                name="act">Delete</button></a>
                        <a href="edit.php?act=edit&&id=<?=$dt->id_tarif?>"><button class="btn-edit" name="act"
                                value="edit-<?=$dt->id_tarif?>">Edit</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>