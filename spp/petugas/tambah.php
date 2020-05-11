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

?>

<div class="main_content">
    <div class="header">
        Tambah Petugas
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Petugas</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_petugas" placeholder="Nama Petugas">
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
                        <label for="fname">Alamat</label>
                    </div>
                    <div class="col-75">
                        <textarea name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Level</label>
                    </div>
                    <div class="col-75">
                        <select name="level" required>
                            <option value="">--- Pilih Level ---</option>
                            <option value="admin">Admin</option>
                            <option value="operator">Operator</option>
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