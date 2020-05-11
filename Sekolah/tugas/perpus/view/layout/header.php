<?php 
session_start();
if(!isset($_SESSION["login"]))
{
  header('Location: ../auth/login_view.php');
}
require_once('../../setting/conection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../asset/css/style.css">
      <meta charset="UTF-8">
    <title>Da Perpus</title>
</head>
<body>