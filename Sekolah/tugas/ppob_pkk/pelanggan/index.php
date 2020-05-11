<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    $no = 1;
    $sql = 'SELECT * from pelanggan';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $pelanggan = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        <a>Data Pelanggan</a>
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
                    <th>Nama Pelanggan</th>
                    <th>Nomor KWh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pelanggan as $dt):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->nama_pelanggan?></td>
                    <td><?= $dt->no_kwh?></td>
                    <td>
                        <a href="controller.php?act=del&&id=<?=$dt->id_pelanggan?>"><button class="btn-del"
                                name="act">Delete</button></a>
                        <a href="edit.php?id=<?=$dt->id_pelanggan?>"><button class="btn-edit">Edit</button></a>
                        <a href="detail.php?id=<?=$dt->id_pelanggan?>"><button class="btn-info">Detail</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>