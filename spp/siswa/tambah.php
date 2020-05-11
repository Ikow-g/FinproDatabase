<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

$sql = "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
$data_kelas = mysqli_query($con,$sql);

?>

<div class="main_content">
    <div class="header">
        Tambah Siswa
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">NISN</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nisn" placeholder="NISN"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Siswa</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_siswa" placeholder="Nama Siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea type="text" name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Jenis Kelamin</label>
                    </div>
                    <div class="col-75">
                        <select name="jk" required>
                            <option value="">--- Pilih Jenis Kelamin ---</option>
                            <option value="laki - laki">laki - laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nomor Telepon</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Kelas</label>
                    </div>
                    <div class="col-75">
                        <select name="kelas">
                            <option value="">--- Pilih Kelas ---</option>
                            <?php while($kelas = mysqli_fetch_object($data_kelas)):?>
                            <option value="<?=$kelas->id_kelas?>">
                                <?= $kelas->tingkatan_kelas.' '.$kelas->nama_jurusan.' '.$kelas->sub_kelas ?></option>
                            <?php endwhile;?>
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