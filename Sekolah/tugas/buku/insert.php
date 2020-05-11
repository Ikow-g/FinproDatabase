<?php

    include 'conn.php';

    $nama_nuku = $_GET['nama_buku'];
    $sumary = $_GET['sumary'];

    $query = "INSERT INTO buku(nama_buku,sumary) VALUES('$nama_nuku','$sumary')";
    $insert = mysqli_query($conn,$query) or trigger_error("query error: ".mysqli_error($conn));
    mysqli_close($conn);