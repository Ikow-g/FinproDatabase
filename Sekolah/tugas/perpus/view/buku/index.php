<?php include('../layout/header.php')?>
<?php
  $sql = 'SELECT * FROM tb_petugas';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $kategori = $stmt->fetchAll();
?>
<?php include('../layout/sidebar.php')?>
<section>
    <a href="add.php"><button class="button-add">Tambah</button></a>
    <h1 class="title">Buku</h1>
    </form>
    <table class="content-table">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Jumlah Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ; foreach($kategori as $dt): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dt->nama_petugas ?></td>
                <td><?= $dt->username ?></td>
                <td><?= $dt->alamat ?></td>
                <td><?= $dt->no_telp ?></td>
                <td>
                    <a
                        href="KategoriController.php?aksi=delete&id_kategori=<?= $dt->id_kategori ?>"><button>delete</button></a>
                    <a href="edit.php?id_kategori=<?= $dt->id_kategori ?>"><button>Edit</button></a>
                </td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</section>
<?php include('../layout/footer.php')?>