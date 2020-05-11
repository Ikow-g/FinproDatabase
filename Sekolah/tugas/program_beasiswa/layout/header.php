<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);

    include "$root/sekolah/tugas/program_beasiswa/conn.php";

    is_login();

    if(isset($_SESSION['user'])){
    $id = $_SESSION['id'];
    $sql = "SELECT isVerify FROM siswa WHERE id_siswa = '$id'";
    $query = mysqli_query($conn,$sql);

    $data = mysqli_fetch_object($query);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Beasiswain</title>
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Beasiswain</label>
        <ul>
            <?php if(isset($_SESSION['user'])) : ?>
            <li><a class="active" href="../main/index.php">Home</a></li>
            <?php if($data->isVerify == TRUE) : ?>
            <li><a href="../siswa/detail.php?id_siswa=<?=$_SESSION['identity']['nisn']?>">SK</a></li>
            <?php else :?>
            <li><a style="cursor:not-allowed;">SK</a></li>
            <?php endif;?>
            <li><a href="#">Contact</a></li>
            <div class="dropdown">
                <button class="dropbtn">Akun</button>
                <div class="dropdown-content">
                    <a href="#">Pengaturan</a>
                    <a href="../auth/logout.php">LogOut</a>
                </div>
            </div>
            <?php else :?>
            <li><a class="active" href="../main/index.php">Home</a></li>
            <li><a href="../siswa/index.php">Siswa</a></li>
            <li><a href="../sk/index.php">SK</a></li>
            <li><a href="#">Contact</a></li>
            <div class="dropdown">
                <button class="dropbtn">Akun</button>
                <div class="dropdown-content">
                    <a href="#">Pengaturan</a>
                    <!-- <a href="#">Link 2</a> -->
                    <a href="../auth/logout.php">LogOut</a>
                </div>
            </div>
            <?php endif; ?>
        </ul>
    </nav>
    <section>

        <?php      
if(isset($_SESSION['user'])){   
    if($data->isVerify == FALSE){?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Akun belum melakukan verifikasi email <a href="https://mail.google.com/" target="_blank"
                style="color:white; font-weight:bold">Verifikasi
                sekarang</a>
        </div>
        <?php } 
        }
        ?>