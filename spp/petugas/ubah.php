<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if(!isset($_SESSION["login"]))
    {
    header("location: auth/login.php");
    }else if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

    $sql = "SELECT * FROM petugas WHERE id_petugas = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
    mysqli_stmt_bind_param($stmt, "i", $req->id_petugas);

    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    $petugas = mysqli_fetch_object($data);

    }else{
    echo 'Error: '. mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
?>

<div class="main_content">
    <div class="header">
        Ubah Petugas <?= $petugas->nama_petugas ?>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <input type="hidden" name="id_petugas" value="<?= $petugas->id_petugas ?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Petugas</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_petugas" placeholder="Nama Petugas"
                            value="<?= $petugas->nama_petugas ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nomor Telepon</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon"
                            value="<?= $petugas->no_telp ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea name="alamat" cols="30" rows="10"
                            placeholder="Alamat"><?= $petugas->alamat ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Level</label>
                    </div>
                    <div class="col-75">
                        <select name="level" readonly>
                            <option value="">--- Pilih Level ---</option>
                            <option value="admin" <?= $petugas->level == 'admin' ?'selected':''?>>Admin</option>
                            <option value="operator" <?= $petugas->level == 'operator'?'selected':'' ?>>Operator
                            </option>
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