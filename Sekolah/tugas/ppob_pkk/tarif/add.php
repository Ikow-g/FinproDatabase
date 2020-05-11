<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

?>

<div class="main_content">
    <div class="header">
        Tambah Tarif
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="controller.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">daya</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="daya" name="daya" placeholder="Daya">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">tarif per KWH</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="tarif" name="tarif" placeholder="Tarif Per KWH">
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