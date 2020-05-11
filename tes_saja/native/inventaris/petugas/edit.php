<?php

include '../connection.php';

// ambil id level
$id_petugas = $_GET['id'];

// ambil data dari database
$petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");

$data = mysqli_fetch_array($petugas);

if ($_POST) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];


    $simpan = mysqli_query($conn, "UPDATE petugas.*, level.nama_level JOIN level SET nama_petugas = '$nama_petugas', username = '$username', password = '$password' WHERE 
    petugas.id_level = tb_level.id_level");


    if ($simpan) {
        $_SESSION['status'] = 'pegawai berhasil di update !';

        header('location: lihat.php');
    } else {
        echo 'pegawai gagal diupdate !';
        echo mysqli_error($conn);
    }
}

?>

<?php include '../admin/layout/header.php' ?>

<main>
    <h1>edit petugas</h1>
    <form method="post" action="">
        <div class="input-wrapper">
            <label> Nama petugas </label>
            <input type="text" value="<?php echo $data['nama_pegawai'] ?>" name="nama pegawai" required>
        </div>

        <div class="input-wrapper">
            <label> username </label>
            <input type="text" value="<?php echo $data['username'] ?>" name="username" required>
        </div>

        <div class="input-wrapper">
            <label> Password </label>
            <textarea type="password" name="password" required><?php echo $data['password'] ?></textarea>
        </div>

        <div class="input-wrapper">
            <label> Hak Akses </label>
            <select name="level">
                <?php
                while ($data_level = mysqli_fetch_array($level)) { ?>
                    <option value="<?php echo $data_level['id_level'] ?>">
                        <?php echo $data_level['nama_level'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</main>

<?php include '../admin/layout/footer.php' ?>