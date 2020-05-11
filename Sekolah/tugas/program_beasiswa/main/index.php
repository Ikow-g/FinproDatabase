<?php require_once '../layout/header.php' ; ?>

<section>
    <?php if(isset($_SESSION['user'])): ?>
    <h1>Selamat datang <?= $_SESSION['identity']['nama'] ?></h1>
    <h3><?= $_SESSION['identity']['nisn'] ?></h3>
    <?php else: $siswa = mysqli_num_rows(mysqli_query($conn,"SELECT id_siswa FROM siswa"));?>
    <h1 style="margin-bottom: 5%;">Selamat datang Admin</h1>
    <h3>Jumlah Siswa : <?= $siswa ?></h3>
    <?php endif; ?>
</section>
<?php require_once '../layout/footer.php' ; ?>