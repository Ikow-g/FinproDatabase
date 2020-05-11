<?php
include('../config.php');
$id_buku=$_GET['id_buku'];
$result=mysqli_query($mysqli, "DELETE FROM buku WHERE id_buku=$id_buku");
header("Location: addbuku.php");
?>