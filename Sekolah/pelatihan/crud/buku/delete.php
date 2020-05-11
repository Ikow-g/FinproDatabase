<?php
    include_once '../koneksi.php';

     $id =  $_GET['id'];

     $sql = "DELETE FROM buku WHERE id='$id'";

     mysqli_query($konek,$sql);

     header('Location: index.php');