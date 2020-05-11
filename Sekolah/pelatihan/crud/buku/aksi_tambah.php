<?php
    require '../koneksi.php';

    $nama = $_POST['nama'];

    $kategori = $_POST['kategori'];
    for($num =0;$num < count($_POST['nama']);$num++){
        $sql = "INSERT INTO buku VALUES('','$nama[$num]','$kategori[$num]')";
        $insert = mysqli_query($konek,$sql);
    }
    
    if($insert)
    {
        header('Location: index.php');
    }else{
        echo mysqli_error($konek);
    }