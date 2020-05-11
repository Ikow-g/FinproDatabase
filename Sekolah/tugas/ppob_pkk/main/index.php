<?php 
  include '../layout/header.php';
  include '../layout/sidebar.php' ;
?>

<div class="main_content">
  <div class="header">
    <a>Halaman Utama</a>
    <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
  </div>
  <div class="info"><br>
    <h1>Selamat Datang <?= $_SESSION['user']['name'] ?></h1>
  </div>
</div>

<?php include '../layout/footer.php' ?>