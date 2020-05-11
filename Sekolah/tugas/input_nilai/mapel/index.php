<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

$sql = 'SELECT * from mapel';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$mapel = $stmt->fetchAll();  
?>

<div class="main_content">
    <div class="header">
        <h2>List Mapel</h2>
    </div>
    <div class="info"><br>
        <a href="add.php"><button class="btn-tambah" style="float:right;">Tambah</button></a>
        <table bgcolor="white" border="0.5">
            <thead>
                <th style="width:10%">Nomor</th>
                <th>Nama Mapel</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no = 1; foreach($mapel as $dt): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->nama ?></td>
                    <td>
                        <a href="controller.php?id=<?= $dt->id ?>&&act=delete"><button
                                class="btn-del">Delete</button></a>
                        <a href="edit.php?id=<?= $dt->id ?>"><button class="btn-edit">Edit</button></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



<?php include '../layout/footer.php' ?>