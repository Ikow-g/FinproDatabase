<?php include '../layout/header.php';
?>

<?php include '../layout/sidebar.php' ?>

<div class="main_content">
  <div class="header">
    <a>Tanggal : <?= date('d-m-Y') ?></a>
  </div>
  <div class="info"><br>
    <h1>Selamat Datang <?= $_SESSION['user']['name'] ?></h1>
  </div>
</div>

<?php include '../layout/footer.php' ?>