<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

$id_mapel = $_GET['id'];
$sql = 'SELECT * from mapel where id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_mapel]);
$mapel = $stmt->fetch();
?>


<div class="main_content">
    <div class="header">
        Edit Mapel <?= $mapel->nama ?>
    </div>
    <div class="info">
        <div class="container">
            <form action="controller.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Mapel</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="nama_mapel" name="nama_mapel" placeholder="Nama Mapel"
                            value="<?= $mapel->nama ?>">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Edit">
                </div>
            </form>
        </div>

        <?php include '../layout/footer.php' ?>