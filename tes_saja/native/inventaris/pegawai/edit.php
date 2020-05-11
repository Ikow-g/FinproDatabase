<?php

include '../connection.php';

// ambil id level
$id_pegawai = $_GET['id'];

// ambil data dari database
$pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");

$data = mysqli_fetch_array($pegawai);

if ($_POST) {
    $nama_pegawai = $_POST['nama_pegawai'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];


    $simpan = mysqli_query($conn, "UPDATE pegawai SET nama_pegawai = '$nama_pegawai',nip = '$nip', alamat = '$alamat' WHERE 
    id_pegawai = '$id_pegawai '");


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
    <h1>tambah hak akses</h1>
    <form method="post" action="">
        <div class="input-wrapper">
            <label> Nama pegawai </label>
            <input type="text" value="<?php echo $data['nama_pegawai'] ?>" name="nama pegawai" required>
        </div>

        <div class="input-wrapper">
            <label> NIP </label>
            <input type="text" value="<?php echo $data['nip'] ?>" name="nip" required>
        </div>

        <div class="input-wrapper">
            <label> Alamat </label>
            <textarea name="alamat" required><?php echo $data['alamat'] ?></textarea>
        </div>

        <button type="submit">Simpan</button>
    </form>
</main>
<?php include '../admin/layout/footer.php' ?>