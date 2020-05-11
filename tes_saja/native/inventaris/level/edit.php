<?php

    include '../connection.php';

    // ambil id level
    $id_level = $_GET['id'];

    // ambil data dari database
    $level = mysqli_query($conn, "SELECT * FROM level WHERE id_level = '$id_level'");

    $data = mysqli_fetch_array($level);

    if ($_POST) {
        $hak_akses = $_POST['nama_level'];
    

    $simpan = mysqli_query($conn, "UPDATE level SET nama_level = '$hak_akses' WHERE id_level = 
        '$id_level'");

    if($simpan) {
        $_SESSION['status'] = 'Hak akses berhasil di update !';

        header('location: lihat.php');
    }
        else{
            echo 'Hak akses gagal diupdate !';
            echo mysqli_error($conn);
        }
    }

?>

<?php include '../admin/layout/header.php' ?>

    <main>
        <h1>tambah hak akses</h1>
        <form method = "post" action="">
            <div class="input-wrapper">
            <label> Nama Level </label>
            <input type="text" value="<?php echo $data['nama_level']?>" name="nama level" required>
            </div>

            <button type="submit">Simpan</button>
        </form>
</main>
 <?php include '../admin/layout/footer.php' ?>