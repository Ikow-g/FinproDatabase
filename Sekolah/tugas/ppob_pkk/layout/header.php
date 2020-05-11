<?php
define('PATH','/sekolah/tugas/ppob_pkk');
require_once '../conn.php';

if(!isset($_SESSION["login"]))
{
header('Location: ../auth/login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PPOB PKK</title>
    <link rel="stylesheet" type="text/css" href="../asset/styles.css">
</head>

<body>