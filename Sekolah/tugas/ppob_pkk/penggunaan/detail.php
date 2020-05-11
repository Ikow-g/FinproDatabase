<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    $id = $request->id;
    $no = 1;
    $penggunaan = TRUE;
    $sql = 'SELECT penggunaan.*,pelanggan.nama_pelanggan,pelanggan.no_kwh from penggunaan 
    JOIN pelanggan ON penggunaan.id_pelanggan = pelanggan.id_pelanggan 
    WHERE penggunaan.id_pelanggan = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    if($stmt->rowCount() < 1){
            $penggunaan = FALSE;
            $sql = 'SELECT nama_pelanggan,no_kwh FROM pelanggan WHERE id_pelanggan = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
    }
    $data = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        <a>Data Penggunaan <?= $data{0}->nama_pelanggan ?> <b>|| Nomor KWh : <?=$data{0}->no_kwh?></b></a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info"><br>
        <?php if(isset($_SESSION['notice'])){ ?>
        <div class="<?=  $_SESSION['notice']['class'] ?>">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong><?=  $_SESSION['notice']['notice'] ?></strong>
        </div>
        <?php } unset($_SESSION['notice']);?>
        <a href="index.php"><button class="btn-back" style="float:left;">Kembali</button></a>
        <a href="add.php?id=<?=$id?>"><button class="btn-tambah" style="float:right;">Tambah</button></a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan Tahun</th>
                    <th>Meter Awal</th>
                    <th>Meter Akhir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$penggunaan){ ?>
                <td colspan="7" style="font-weight:bolder;color:black;">Tidak ada data penggunaan</td>
                <?php } else{ 
                $count = count($data); 
                foreach($data as $dt):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <?php 
                        $time = strtotime("$dt->bulan/01/$dt->tahun");
                        $date = date('F-Y',$time); 
                    ?>
                    <td><?= $date ?></td>
                    <td><?= $dt->meter_awal ?></td>
                    <td><?= $dt->meter_akhir ?></td>
                    <td>
                        <?php if($no - 1 == $count) :?>
                        <a href="controller.php?act=del&&id=<?=$dt->id_penggunaan?>"><button class="btn-del" name="act"
                                disabled>Delete</button></a>
                        <a href="edit.php?act=edit&&id=<?=$dt->id_penggunaan?>"><button class="btn-edit" name="act"
                                value="edit-<?=$dt->id_penggunaan?>" disabled>Edit</button></a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach;}?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>