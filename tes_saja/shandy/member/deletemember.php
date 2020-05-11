<?php
include('../config.php');
$id_anggota=$_GET['id_anggota'];
$result=mysqli_query($mysqli, "DELETE FROM anggota WHERE id_anggota=$id_anggota");
header("Location: addmember.php");
?>