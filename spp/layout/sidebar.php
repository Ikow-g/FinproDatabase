<?php 
    // var_dump($_SESSION);
?>


<div class="wrapper">
    <div class="sidebar">
        <h2>SPP</h2>
        <ul>
            <a href="../main/index.php" style="color:white;">
                <li>Home</li>
            </a>
            <?php if($_SESSION['user']['level'] == 'siswa'){?>
            <a href="../pembayaran/pembayaran.php?nisn=<?=$_SESSION['user']['id']?>" style="color:white;">
                <li>Pembayaran</li>
            </a>
            <?php }else if($_SESSION['user']['level'] == 'admin'){ ?>
            <a href="../spp/index.php" style="color:white;">
                <li>SPP</li>
            </a>
            <a href="../kelas/index.php" style="color:white;">
                <li>Kelas</li>
            </a>
            <a href="../siswa/index.php" style="color:white;">
                <li>Siswa</li>
            </a>
            <a href="../jurusan/index.php" style="color:white;">
                <li>Jurusan</li>
            </a>
            <a href="../petugas/index.php" style="color:white;">
                <li>Petugas</li>
            </a>
            <a href="../pembayaran/index.php" style="color:white;">
                <li>Pembayaran</li>
            </a>
            <?php }else if($_SESSION['user']['level'] == 'operator'){ ?>
            <a href="../pembayaran/index.php" style="color:white;">
                <li>Pembayaran</li>
            </a>
            <?php } ?>
            <a href="../auth/logout.php" style="color:white;">
                <li>Log Out</li>
            </a>
        </ul>
    </div>