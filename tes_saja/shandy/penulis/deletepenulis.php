<?php
include('../config.php');
$id_penulis=$_GET['id_penulis'];
$result=mysqli_query($mysqli, "DELETE FROM penulis WHERE id_penulis=$id_penulis");
header("Location: addpenulis.php");
?>