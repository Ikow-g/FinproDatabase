<?php

    include '../connection.php';
    $title = 'Tambah Data Level';

    if ($_POST) {
        $hak_akses = $_POST['nama_level'];
    

    $simpan = mysqli_query($conn, "INSERT INTO level VALUES('', '$hak_akses')");

    if($simpan) {
        $_SESSION['status'] = 'Hak akses baru berhasil ditambahkan !';

        header('location: lihat.php');
    }
        else{
            echo 'Hak akses gagal ditambahkan !';
            echo mysqli_error($conn);
        }
    }

?>

<? include '../admin/layout/header.php' ?>
    <main>
        <h1>tambah hak akses</h1>
        <form method = "post" action="">
            <div class="input-wrapper">
            <label> Nama Level </label>
            <input type="text" name="nama level" required>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </main>
<?php include '../admin/layout/footer.php' ?>