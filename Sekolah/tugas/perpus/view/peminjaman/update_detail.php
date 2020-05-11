<?php include('../layout/header.php')?>
<?php
  $kategori = $_GET['id_kategori'];
  $sql = 'SELECT * FROM tb_kategori where id_kategori = ?';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$kategori]);
  $kategori = $stmt->fetch();
?>
<?php include('../layout/sidebar.php')?>
<section>
    <h1 class="title">Edit Kategori</h1>
    <div class='div-form'>
        <form action="Controller.php" method="POST">
            <input type="hidden" name="id" value="<?= $kategori->id_kategori ?>">
            <label for="edit_kategori">Nama Kategori</label>
            <input type="text" name="edit_kategori" value="<?= $kategori->nama_kategori ?>">
            <input type="submit" id="submit" value="Edit">
        </form>
    </div>
</section>
<?php include('../layout/footer.php')?>