<?php

    $conn = mysqli_connect('localhost','root','','latihan');

    if(!$conn){
        mysqli_connect_error($conn);
        exit;
    }