<?php
    include '../layout/header.php';
    include '../layout/sidebar.php';

    $no = 1;

        $id = $_GET['id'];
        $sql = 'SELECT * from tagihan JOIN penggunaan ON tagihan.id_penggunaan = penggunaan.id_penggunaan
        JOIN pelanggan ON penggunaan.id_pelanggan = pelanggan.id_pelanggan
        WHERE penggunaan.id_pelanggan = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() < 1) {
            $sql = 'SELECT * FROM pelanggan where id_pelanggan = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        }
        $pelanggan = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        <a>Data Tagihan <?= $pelanggan{0}->nama_pelanggan ?></a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info"><br>
        <?php if (isset($_SESSION['notice'])) { ?>
        <div class="<?=  $_SESSION['notice']['class'] ?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong><?=  $_SESSION['notice']['notice'] ?></strong>
        </div>
        <?php } unset($_SESSION['notice']);?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan Tahun</th>
                    <th>Total_harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($stmt->rowCount() > 0) :
                foreach ($pelanggan as $dt):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <?php   $time = strtotime("$dt->bulan/01/$dt->tahun");
                            $date = date('F-Y', $time);
                    ?>
                    <td><?= $date ?></td>
                    <td>Rp. <?= number_format($dt->total_harga) ?></td>
                    <td><?= $dt->status ?></td>
                    <td>
                        <a href="detail.php?id=<?=$dt->id_pelanggan?>"><button class="btn-info" disabled>Bayar</button></a>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>