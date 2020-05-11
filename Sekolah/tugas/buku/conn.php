<?php

    DEFINE('DBUSER', 'id11632745_localhost');
    DEFINE('DBPW', '123456');
    DEFINE('DBHOST', 'localhost');
    DEFINE('DBNAME', 'id11632745_buku');

    $conn = mysqli_connect(DBHOST,DBUSER,DBPW,DBNAME);

    if(!$conn){
        die("Database connection failed: " . mysqli_error($conn));
        exit();
    }