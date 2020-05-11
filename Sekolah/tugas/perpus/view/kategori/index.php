
<?php include('../layout/header.php')?>
<?php
  $sql = 'SELECT * FROM tb_kategori';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $kategori = $stmt->fetchAll();
?>
<?php include('../layout/sidebar.php')?>
    <section>
        <h1 class="title">Kategori</h1>
    <form action="Controller.php" method="post">
        <table>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="kategori" placeholder="Nama Kategori" required></td>
                <td><button type="submit" name="AddKategori" class="button-addC">Tambah</button></td>
            </tr>
        </table>
    </form>
      <table class="content-table">
  <thead>
    <tr>
      <th>Nomor</th>
      <th>Nama Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
      <?php $no = 1 ; foreach($kategori as $dt): ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $dt->nama_kategori ?></td>  
      <td>
            <a href="Controller.php?aksi=delete&id_kategori=<?= $dt->id_kategori ?>"><button>delete</button></a>
            <a href="edit.php?id_kategori=<?= $dt->id_kategori ?>"><button>Edit</button></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
    </section>
<?php include('../layout/footer.php')?>
