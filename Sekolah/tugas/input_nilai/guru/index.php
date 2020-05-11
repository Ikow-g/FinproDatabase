<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

$sql = 'SELECT * from guru JOIN user_profile ON guru.user_profile_id = user_profile.id';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$guru = $stmt->fetchAll();

?>

<div class="main_content">
    <div class="header">
        <h2>List Guru</h2>
    </div>
    <div class="info"><br>
        <a href="add.php"><button class="btn-tambah" style="float:right;">Tambah</button></a>
        <table bgcolor="white">
            <thead>
                <th style="width:10%">Nomor</th>
                <th>Nama</th>
                <th>Umur</th>
                <th style="width:10%">Tahun Masuk</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php $no = 1; foreach($guru as $dt): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->nama ?></td>
                    <td><?= $dt->umur ?></td>
                    <td><?= $dt->tahun_masuk ?></td>
                    <td>
                        <button class="btn-del">Delete</button>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-info">Detail</button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>