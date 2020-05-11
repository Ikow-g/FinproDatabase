<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'spp';

    $con = mysqli_connect($host,$user,$pass,$db);

    if(mysqli_connect_errno()){
        die('error: '.mysqli_connect_error());
    }

    $req = (object)$_REQUEST ;
    $no = 1;

    function flask($msg,$path){
    echo
    "<script>
        alert('$msg');
        location.href = '$path';
    </script>";
    exit;
    }

    session_start();