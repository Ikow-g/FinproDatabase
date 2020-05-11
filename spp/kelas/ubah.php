<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

 if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

$sql = "SELECT * FROM jurusan";
$data = mysqli_query($con,$sql);

$sql2 = "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan WHERE id_kelas='$req->id_kelas'";
$kelas = mysqli_fetch_object(mysqli_query($con,$sql2));

?>

<div class="main_content">
    <div class="header">
        Edit Kelas <?= $kelas->tingkatan_kelas.' '. $kelas->nama_jurusan.' '. $kelas->sub_kelas?>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <input type="hidden" name="id_kelas" value="<?=$req->id_kelas?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Tingkatan Kelas</label>
                    </div>
                    <div class="col-75">
                        <select name="tingkatan_kelas" required>
                            <option value="">--- Pilih Tingkatan Kelas ---</option>
                            <?php for($a = 1; $a < 4;$a++): ?>
                            <option value="<?=$a?>" <?=$a==$kelas->tingkatan_kelas ? 'selected':''?>><?=$a?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Jurusan</label>
                    </div>
                    <div class="col-75">
                        <select name="jurusan" required>
                            <option value="">--- Pilih Jurusan</option>
                            <?php while($jurusan = mysqli_fetch_object($data)): ?>
                            <option value="<?=$jurusan->id_jurusan?>"
                                <?=$jurusan->id_jurusan == $kelas->id_jurusan ? 'selected' : ''?>>
                                <?=$jurusan->nama_jurusan?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Tingkatan Kelas</label>
                    </div>
                    <div class="col-75">
                        <select name="sub_kelas" required>
                            <option value="">--- Pilih Sub Kelas ---</option>
                            <?php for($a = 1; $a < 4;$a++): ?>
                            <option value="<?=$a?>" <?=$a==$kelas->sub_kelas ? 'selected':''?>><?=$a?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="aksi" value="ubah">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>