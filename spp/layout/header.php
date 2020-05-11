<?php

require_once '../conn.php';
if(!isset($_SESSION["login"]))
{
    header("location: ../auth/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SPP</title>
    <link rel="stylesheet" type="text/css" href="../asset/style.css">
</head>

<body>