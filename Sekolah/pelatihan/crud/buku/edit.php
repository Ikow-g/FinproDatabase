<?php
    include_once '../koneksi.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM buku WHERE id ='$id'";

    $data = mysqli_query($konek,$sql);

    $dt = mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buku2</title>
</head>

<body>
    <center>
        <h1>Edit Buku</h1>
        <form action="update.php" method="POST">

            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

            <label for="nama">Nama</label>

            <input type="text" name="tembok" value="<?= $dt['nama']?>"><br><br>

            <label for="kategori">Kategori</label>

            <input type="text" name="cat" value="<?= $dt['kategori']?>"><br><br>

            <button type="submit" name="ok" value="proses">Proses</button><br>
        </form>
    </center>
</body>

</html>