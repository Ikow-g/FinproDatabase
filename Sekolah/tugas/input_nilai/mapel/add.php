<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

?>

<div class="main_content">
  <div class="header">
    Tambah Mapel
  </div>
  <div class="info">
    <div class="container">
      <form action="controller.php" method="POST">
        <div class="row">
          <div class="col-25">
            <label for="fname">Nama Mapel</label>
          </div>
          <div class="col-75">
            <input type="text" id="nama_mapel" name="nama_mapel" placeholder="Nama Mapel">
          </div>
        </div>
        <div class="row">
          <input type="submit" value="Tambah">
        </div>
      </form>
    </div>

    <?php include '../layout/footer.php' ?>