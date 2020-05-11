<?php

    include '../connection.php';

    // ambil id level
    $id_ruang = $_GET['id'];

    // ambil data dari database
    $ruang = mysqli_query($conn, "SELECT * FROM ruang WHERE id_ruang = '$id_ruang'");

    $data = mysqli_fetch_array($ruang);

    if ($_POST) {
        $nama_ruang = $_POST['nama_ruang'];
        $kode_ruang = $_POST['kode_ruang'];
        $keterangan = $_POST['keterangan'];
    

    $simpan = mysqli_query($conn, "UPDATE ruang SET nama_ruang = '$nama_ruang', kode_ruang = '$kode_ruang', keterangan = '$keterangan' WHERE 
    id_ruang = '$id_ruang '");
        

    if($simpan) {
        $_SESSION['status'] = 'ruang berhasil di update !';

        header('location: lihat.php');
    }
        else{
            echo 'ruang gagal diupdate !';
            echo mysqli_error($conn);
        }
    }

?>

<?php include '../admin/layout/header.php' ?>

    <main>
        <h1>tambah hak akses</h1>
        <form method = "post" action="">
            <div class="input-wrapper">
            <label> Nama ruang </label>
            <input type="text" value="<?php echo $data['nama_ruang']?>" name="nama ruang" required>
            </div>

            <div class="input-wrapper">
            <label> Kode ruang </label>
            <input type="text" value="<?php echo $data['kode_ruang']?>" name="kode ruang" required>
            </div>

            <div class="input-wrapper">
            <label> Keterangan </label>
            <textarea name="keterangan" required><?php echo $data['keterangan']?></textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>
</main>
 <?php include '../admin/layout/footer.php' ?>