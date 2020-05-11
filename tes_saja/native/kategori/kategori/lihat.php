<?php
include '../conection.php';
$title = 'Lihat Data Jenis';

$query = mysqli_query($conn, "SELECT * FROM kategori");
?>

<main>
    <h1> Lihat Data Jenis </h1>
    <a href="tambah.php"><button>Tambah</button></a>

    <?php if (isset($_SESSION['status'])) : ?>
    <div class="status-wrapper">
        <h4><?php echo $_SESSION['status'] ?></h4>
    </div>
    <?php endif ?>

    <table border="1">
        <thead>
            <tr>
                <th>NO.</th>
                <th>Nama</th>
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
                <td><?php echo $data['nama'] ?></td>

                <td>
                    <a href="edit.php?id=<?php echo $data['id'] ?>"><button>edit</button></a> |
                    <a href="hapus.php?id=<?php echo $data['id'] ?>"><button>Hapus</button></a>
                </td>
            </tr>
            <?php $no++;
            }
            ?>
        </tbody>
    </table>
</main>