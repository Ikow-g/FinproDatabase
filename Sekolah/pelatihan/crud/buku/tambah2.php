<?php
    require_once '../conn.php';
    if(isset($_POST['ok']))
    {
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $sql = "INSERT INTO buku VALUES('','$nama','$kategori')";
        $insert = mysqli_query($conn,$sql);
        if(!$insert){
            echo mysqli_error($conn);
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buku</title>
</head>

<body>
    <h1>Buku2</h1>
    <form action="tambah2.php" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama"><br><br>
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori"><br><br>
        <button type="submit" name="ok">Proses</button><br>
    </form>
</body>

</html>