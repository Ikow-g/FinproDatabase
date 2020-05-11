<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }



    $sql = "SELECT * FROM siswa WHERE nisn = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
    mysqli_stmt_bind_param($stmt, "i", $req->nisn);

    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    $siswa = mysqli_fetch_object($data);

    $sql = "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan WHERE id_kelas =
    $siswa->id_kelas";
    $data_kelas = mysqli_query($con,$sql);
    $kelas = mysqli_fetch_object($data_kelas);

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
                <div class="row">
                    <div class="col-25">
                        <label for="fname">NISN</label>
                    </div>
                    <div class="col-75">
                        <input type="text" readonly name="nisn" placeholder="NISN" value="<?=$siswa->nisn?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Siswa</label>
                    </div>
                    <div class="col-75">
                        <input type="text" readonly name="nama_siswa" placeholder="Nama Siswa"
                            value="<?=$siswa->nama?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea type="text" readonly name="alamat" cols="30" rows="10"
                            placeholder="Alamat"><?=$siswa->alamat?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Jenis Kelamin</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?=$siswa->jk?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nomor Telepon</label>
                    </div>
                    <div class="col-75">
                        <input type="text" readonly name="nomor_telepon" placeholder="Nomor Telepon"
                            value="<?=$siswa->no_telp?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Kelas</label>
                    </div>
                    <div class="col-75">
                        <input type="text" readonly
                            value="<?= $kelas->tingkatan_kelas.' '.$kelas->nama_jurusan.' '.$kelas->sub_kelas ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>