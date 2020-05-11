<?php

    include '../connection.php';
    $title = 'Tambah Data pegawai';

    if ($_POST) {
        $nama_pegawai = $_POST['nama_pegawai'];
        $nip = $_POST['nip'];
        $alamat = $_POST['alamat'];
    

    $simpan = mysqli_query($conn, "INSERT INTO pegawai VALUE
        ('', '$nama_pegawai', '$nip', '$alamat')");

    if($simpan) {
        $_SESSION['status'] = 'pegawai berhasil ditambahkan !';

        header('location: lihat.php');
    }
        else{
            echo 'pegawai gagal ditambahkan !';
            echo mysqli_error($conn);
        }
    }

?>

<? include '../admin/layout/header.php' ?>
    <main>
        <h1>tambah pegawai</h1>
        <form method = "post" action="">
            <div class="input-wrapper">
            <label> Nama pegawai </label>
            <input type="text" name="nama_pegawai" required>
            </div>

            <div class="input-wrapper">
            <label> NIP </label>
            <input type="text" name="nip" required>
            </div>

            <div class="input-wrapper">
            <label> Alamat </label>
            <textarea name="alamat" required></textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </main>
<?php include '../admin/layout/footer.php' ?>