<?php 
    require_once '../layout/header.php' ;

    if(isset($_SESSION['user']))
    {
        if($_SESSION['identity']['nisn'] != $request->id_siswa){
            header("location:javascript://history.go(-1)");
        }
    }
    $sql = "SELECT * FROM siswa_sk JOIN sk ON siswa_sk.id_sk = sk.id_sk JOIN siswa ON siswa_sk.id_siswa = siswa.id_siswa WHERE siswa_sk.id_siswa='$request->id_siswa'";
    $query = mysqli_query($conn,$sql);
    $nama = mysqli_fetch_object(mysqli_query($conn,"SELECT nama,isVerify,email FROM siswa WHERE id_siswa = '$request->id_siswa'"));

    if(isset($_SESSION['user']))
    {
        if($nama->isVerify == FALSE){
            header("location:javascript://history.go(-1)");
        }
    }
?>

<link rel="stylesheet" href="dstyle.css">

<h1 style="display:inline-block">SK <?=$nama->nama?></h1>

<div class="container">
    <?php while($data = mysqli_fetch_object($query)): ?>
    <form action="controller.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_siswa" value="<?=$data->id_siswa?>">
        <input type="hidden" name="id_sk" value="<?=$data->id_sk?>">
        <label for="fname" style="font-weight: bold;"><?= $data->sk ?></label>
        <div class="inline">
            <?php 
        if($data->gambar == NULL){
            echo '<input type="file" name="gambar" accept=".png, .jpg, .jpeg" required>';
        }
        else{
            echo '<input type="text" name="gambar" value="'.$data->gambar.'" data-id="'.$data->id_siswa.'"
                data-idSK="'.$data->id_sk.'" onclick="img(this)" readonly>';
        }
            if($data->gambar == NULL || $data->status == FALSE){
                echo '<input type="text" class="stat" style="color:red;" value="Belum Diverivikasi" readonly>';
            }else{
                echo '<input type="text" class="stat" style="color:green;" value="Terverivikasi" readonly>';
            }
        if($data->status == FALSE || $data->gambar == NULL){
            echo '<img src="../img/wrong.png" alt="picture" class="gmb">';
        }else{
            echo '<img src="../img/Right.png" alt="picture" class="gmb">';
        }
            ?>
            <button type="button" data-sk="<?=$data->sk?>" data-deskripsi="<?=$data->deskripsi?>" data-img="123.pg"
                onclick="show(this)">Detail</button>
            <?php
        if($data->gambar == NULL)
        {
            echo '<button type="submit" name="upload" class="btn-hps">Upload</button>';
        }else{
            echo '<button class="btn-hps disabled" disabled>Upload</button>';
        }
        if(!isset($_SESSION['user'])){
            if($data->gambar != NULL)
            {?>
            <div class="dropdown">
                <button type="button" name="verif" class="btn-edt" value="<?=$data->status?>">
                    Ubah Status</button>
                <div class="dropdown-content" style="right:initial;">
                    <button value="verif" type="button" data-id_sk="<?=$data->id_sk?>"
                        data-id_siswa="<?=$data->id_siswa?>" data-email="<?=$nama->email?>"
                        onclick="show(this);">Tolak</button>
                    <button name="verif" type="submit">Verifikasi</button>
                    <button name="verif" type="submit">Belum diverifikasi</button>
                </div>
            </div>
            <?php }else{
                echo '<button class="btn-edt disabled" disabled>Ubah Status</button>';
            }
        }
            ?>
        </div>
    </form>
    <?php endwhile; ?>
</div>

<div id="overlay" class="overlay">
    <!-- content -->
    <div class="overlay-content">
        <div class="overlay-header">
            <span class="close">&times;</span>
            <h2 id="head"></h2>
        </div> <br>
        <form action="controller.php" method="post">
            <div class="overlay-body">
                <input type="hidden" id="id_siswa" name="id_siswa">
                <input type="hidden" id="id_sk" name="id_sk">
                <input type="hidden" id="email" name="email">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" readonly></textarea>
            </div>
            <div class="overlay-footer">
                <button class="btn btn-overlay" name="verif" value='tolak' id="verif">Kirim</button>
            </div>
        </form>
    </div>

</div>

<div id="myModal" class="modal">
    <form action="controller.php" method="post">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption">
            <input type="hidden" id="id_siswa2" name="id_siswa">
            <input type="hidden" id="id_sk2" name="id_sk">
            <input type="hidden" id="del-img" name="img">
            <button class="btn btn-hps" name="hpsImg">Hapus</button>
            <a class="btn btn-info" id="download" download="">Download</a>
        </div>
    </form>
</div>

<script src="detail.js"></script>


<?php require_once '../layout/footer.php' ?>