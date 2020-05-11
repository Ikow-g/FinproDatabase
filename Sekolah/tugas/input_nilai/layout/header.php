<?php
require_once '../conn.php';
session_start();
if(!isset($_SESSION["login"]))
{
header('Location: ../auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Nilai</title>
    <link rel="stylesheet" type="text/css" href="../asset/styles.css">
</head>

<body>