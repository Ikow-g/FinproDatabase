<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

$sql = "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
$data_kelas = mysqli_query($con,$sql);

    $sql = "SELECT * FROM siswa WHERE nisn = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
    mysqli_stmt_bind_param($stmt, "i", $req->nisn);

    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    $siswa = mysqli_fetch_object($data);

    }else{
    echo 'Error: '. mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

?>

<div class="main_content">
    <div class="header">
        Ubah Siswa <?=$siswa->nama?>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <input type="TEXT" name="nisn_lama" value="<?=$siswa->nisn?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">NISN</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nisn" placeholder="NISN" value="<?=$siswa->nisn?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Siswa</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_siswa" placeholder="Nama Siswa" value="<?=$siswa->nama?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea type="text" name="alamat" cols="30" rows="10"
                            placeholder="Alamat"><?=$siswa->alamat?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Jenis Kelamin</label>
                    </div>
                    <div class="col-75">
                        <select name="jk" required>
                            <option value="">--- Pilih Jenis Kelamin ---</option>
                            <option value="laki - laki" <?=$siswa->jk == 'laki - laki' ? 'selected' : ''?>>laki - laki
                            </option>
                            <option value="perempuan" <?=$siswa->jk == 'perempuan' ? 'selected' : ''?>>perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nomor Telepon</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="<?=$siswa->no_telp?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Kelas</label>
                    </div>
                    <div class="col-75">
                        <select name="id_kelas">
                            <option value="">--- Pilih Kelas ---</option>
                            <?php while($kelas = mysqli_fetch_object($data_kelas)):?>
                            <option value="<?=$kelas->id_kelas?>"
                                <?= $siswa->id_kelas == $kelas->id_kelas ? 'selected' : ''?>>
                                <?= $kelas->tingkatan_kelas.' '.$kelas->nama_jurusan.' '.$kelas->sub_kelas ?></option>
                            <?php endwhile;?>
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