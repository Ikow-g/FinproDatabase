<?php
include '../connection.php';
$title = 'Lihat Dpegawai';

$query = mysqli_query($conn, "SELECT * FROM pegawai");
?>

<?php include '../admin/layout/header.php' ?>

<main>
    <h1> Lihat Data pegawai </h1>
    <a href="tambah.php">Tambah Data pegawai</a>

    <link rel="stylesheet" href="../admin/assets/css/style.css">

    <?php if (isset($_SESSION['status'])) : ?>
        <div class="status-wrapper">
            <h4><?php echo $_SESSION['status'] ?></h4>
        </div>
    <?php endif ?>

    <table border="1">
        <thead>
            <tr>
                <th>NO.</th>
                <th>Pegawai</th>
                <th>NIP</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nama_pegawai'] ?></td>
                    <td><?php echo $data['nip'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $data['id_pegawai'] ?>">edit</a> |
                        <a href="hapus.php?id=<?php echo $data['id_pegawai'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php $no++;
            }
            ?>
        </tbody>
    </table>
</main>

<?php include '../admin/layout/footer.php' ?>