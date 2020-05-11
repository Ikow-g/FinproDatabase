<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

$id = $_GET['id'];

$sql = "SELECT * FROM tarif WHERE id_tarif = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$data = $stmt->fetch();
?>

<div class="main_content">
    <div class="header">
        Edit Tarif
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
                        <label for="fname">daya</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="daya" name="daya" value="<?=$data->daya?>" placeholder="Daya">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">tarif per KWH</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="tarif" name="tarif" value="<?=$data->tarif_perkwh?>"
                            placeholder="Tarif Per KWH">
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