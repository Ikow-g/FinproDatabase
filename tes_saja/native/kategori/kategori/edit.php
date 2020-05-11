<?php

include '../conection.php';

// ambil id level
$id = $_GET['id'];

// ambil data dari database
$jenis = mysqli_query($conn, "SELECT * FROM kategori WHERE $id = $id");

$data = mysqli_fetch_array($jenis);

if ($_POST) {
    $nama = $_POST['nama'];

    $simpan = mysqli_query($conn, "UPDATE kategori SET nama = '$nama' WHERE id = $id ");


    if ($simpan) {
        $_SESSION['status'] = 'Data berhasil di update !';

        header('location: lihat.php');
    } else {
        echo 'Data gagal diupdate !';
        echo mysqli_error($conn);
    }
}

?>

<main>
    <h1>Edit Kategori</h1>
    <form method="post" action="">
        <div class="input-wrapper">
            <label> Nama Kategori </label>
            <input type="text" value="<?php echo $data['nama'] ?>" name="nama" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</main>