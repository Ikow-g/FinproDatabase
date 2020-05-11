<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

$sql = "SELECT * FROM jurusan";
$data = mysqli_query($con,$sql);

?>

<div class="main_content">
    <div class="header">
        Tambah Kelas
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Tingkatan Kelas</label>
                    </div>
                    <div class="col-75">
                        <select name="tingkatan_kelas" required>
                            <option value="">--- Pilih Tingkatan Kelas ---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
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
                            <option value="<?=$jurusan->id_jurusan?>"><?=$jurusan->nama_jurusan?></option>
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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
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