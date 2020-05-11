<?php
    include_once '../koneksi.php';

    $sql = "SELECT * FROM buku";

    $data = mysqli_query($konek,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lihatkan</title>
</head>

<body>
    <a href="tambah.php">
        <h1>Tambah Buku</h1>
    </a>
    <a href="tambah.php">Tambah</a>
    <table border="2" style="width:100%;">
        <thead>
            <th>Nomor</th>
            <th>id</th>
            <th>nama</th>
            <th>kategori</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php $no = 1; while($buku = mysqli_fetch_array($data)) :  ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $buku['id'] ?></td>
                <td><?= $buku['nama'] ?></td>
                <td><?= $buku['kategori'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $buku['id'] ?>">Delete</a>
                    <a href="edit.php?id=<?= $buku['id'] ?>">Edit</a>
                </td>
            </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</body>

</html>