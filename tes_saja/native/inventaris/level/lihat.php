<?php
    include '../connection.php';
    $title = 'Lihat Data Level';

    $query = mysqli_query($conn, "SELECT * FROM level");
?>

<?php include '../admin/layout/header.php' ?>
    <main>
    <h1> Lihat Akses </h1>

        <link rel="stylesheet" href="../admin/assets/css/style.css">

        <a href="tambah.php">Tambah Akses</a>

    <?php if (ISSET($_SESSION['status'])): ?>
    <div class="status-wrapper">
        <h4><?php echo $_SESSION['status'] ?></h4>
    </div>
    <?php endif ?>
    <table>
        <thead>
            <tr>
                <th>NO.</th>
                <th>Hak Akses</th>
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
                        <td><?php echo $data['nama_level']?></td>

                        <td>
                             <a href="edit.php?id=<?php echo $data['id_level'] ?>">edit</a> |
                             <a href="hapus.php?id=<?php echo $data['id_level']?>">Hapus</a>
                        </td>
                    </tr>
                     <?php $no++; }
            ?>
        </tbody>
    </table>
                </main>
    <?php include'../admin/layout/footer.php' ?>