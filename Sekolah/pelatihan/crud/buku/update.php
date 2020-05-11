<?php

require_once '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['tembok'];
$kategori = $_POST['cat'];

$sql = "UPDATE buku SET nama='$nama',kategori='$kategori' WHERE id='$id'";

$update = mysqli_query($konek,$sql);

if($update)
{
    header('Location: index.php');
}
else{
    echo mysqli_error($konek);
}