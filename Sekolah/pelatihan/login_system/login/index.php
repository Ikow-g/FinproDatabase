<?php
session_start();
if(!isset($_SESSION['login']))
    {header("Location: login_view.php");}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Utama</title>
</head>

<body>
    <h1>Haiiii <?= $_SESSION['identity'] ?></h1>
    <h1>Username</h1>
    <br>
    <a href="logout.php">LogOut</a>
</body>

</html>