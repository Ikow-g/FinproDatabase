<?php
    session_start();
    if(isset($_SESSION['login']) == true){
        header('Location: index.php');
    }
?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <?php if(isset($_SESSION['error']) == true){ ?>
        <h4 style="color:red;display:inline;">user atau password salah</h4>
        <?php unset($_SESSION['error']); }?>
        <form action="login.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="" value="Login" style="margin-top: 12%;">
        </form>

    </div>

</body>
</head>

</html>