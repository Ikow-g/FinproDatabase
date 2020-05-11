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
        <a>Data Tagihan Pelanggan</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info"><br>
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
                    <td><?= $dt->nama_pelanggan ?></td>
                    <td><?= $dt->no_kwh ?></td>
                    <td>
                        <a href="detail.php?id=<?=$dt->id_pelanggan?>"><button class="btn-info">Detail</button></a>
                        <a href="../tagihan/index.php?id=<?=$dt->id_pelanggan?>"><button
                                class="btn-del">Tagihan</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>