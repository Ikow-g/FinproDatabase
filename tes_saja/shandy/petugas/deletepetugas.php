<?php
include('../config.php');
$id_petugas=$_GET['id_petugas'];
$result=mysqli_query($mysqli, "DELETE FROM petugas WHERE id_petugas=$id_petugas");
header("Location: addpetugas.php");
?>