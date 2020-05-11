<?php

    include '../connection.php';
    $title = 'Tambah Data Jenis';

    if ($_POST) {
        $nama_jenis = $_POST['nama_jenis'];
        $kode_jenis = $_POST['kode_jenis'];
        $keterangan = $_POST['keterangan'];
    

    $simpan = mysqli_query($conn, "INSERT INTO jenis VALUE
        ('', '$nama_jenis', '$kode_jenis', '$keterangan')");

    if($simpan) {
        $_SESSION['status'] = 'Jenis berhasil ditambahkan !';

        header('location: lihat.php');
    }
        else{
            echo 'Jenis gagal ditambahkan !';
            echo mysqli_error($conn);
        }
    }

?>

<? include '../admin/layout/header.php' ?>
    <main>
        <h1>tambah jenis</h1>
        <form method = "post" action="">
            <div class="input-wrapper">
            <label> Nama Jenis </label>
            <input type="text" name="nama_jenis" required>
            </div>

            <div class="input-wrapper">
            <label> Kode jenis </label>
            <input type="text" name="kode_jenis" required>
            </div>

            <div class="input-wrapper">
            <label> Keterangan </label>
            <textarea name="keterangan" required></textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </main>
<?php include '../admin/layout/footer.php' ?>