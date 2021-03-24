<?php 
    include "../layout/user/header.php"; 
    include "../layout/user/sidebar.php";
    include "../layout/user/navbar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>


    <h5 class="h5 mb-0 text-black-800">Selamat Datang Venti !</h5>

    <a href="../map/map.php" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">Split Button Success</span>
    </a>

    <!-- End of Main Content -->

    <?php
    include "../layout/user/footer.php";
?>