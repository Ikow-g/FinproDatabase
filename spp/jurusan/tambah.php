<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

?>

<div class="main_content">
    <div class="header">
        Tambah Jurusan
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Jurusan</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_jurusan" placeholder="Nama Jurusan">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="aksi" value="tambah">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>