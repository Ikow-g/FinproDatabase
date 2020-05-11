<?php

include '../conection.php';

if ($_POST) {
    $nama = $_POST['nama'];

    $simpan = mysqli_query($conn, "INSERT INTO kategori VALUES('', '$nama')");
    
    $simpan2 = mysqli_query($conn, "INSERT INTO kategori VALUES('', 'database()')"); //");

    if ($simpan) {
        $_SESSION['status'] = 'data berhasil ditambahkan !';

        header('location: lihat.php');
    } else {
        echo 'Data gagal ditambahkan !';
        echo mysqli_error($conn);
    }
}

?>

<main>
    <h1>tambah jenis</h1>
    <form method="post" action="">
        <div class="input-wrapper">
            <label> Nama Jenis </label>
            <input type="text" name="nama" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</main>