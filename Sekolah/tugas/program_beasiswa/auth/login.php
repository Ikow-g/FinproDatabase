<?php
session_start();
if(isset($_SESSION['login']))
{
    header("location:javascript://history.go(-1)");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <div class="first">
            <img src="../img/cap.png" height="300px" width="300px">
            <h3 align="center">Selamat datang <br><small>Beasiswa Seeker</small></h3>
        </div>

        <div class="container" id="form_login" style="display: block;">
            <form action="controller.php" method="post" id="login">
                <h2>Login</h2>
                <input id="email" type="text" name="username" placeholder="NISN" required>
                <input id="password" type="password" name="password" placeholder="Password" required>
                <button id='button' name="login">Masuk</button>
                <a id='daftar' onclick="daftar()">Belum punya akun ?</a>
                <a href="#" id='lupa'>Lupa password anda ?</a>
            </form>
        </div>

        <div class="container2" style="display: none;" id="form_daftar">
            <form action="controller.php" method="post" id="form-daftar">
                <h2>Daftar</h2>
                <h3 id="notice">Password tidak sama</h3>
                <input id="email2" type="text" name="username" placeholder="Nama Lengkap" required>
                <input id="email3" type="email" name="email" placeholder="Email" required>
                <input id="phone" type="text" name="phone" placeholder="Nomor HP"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <input id="number" type="text" name="number" placeholder="NISN"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <input id="password2" type="password" name="password" placeholder="Password"
                    onclick="this.style.borderColor = 'initial'" required>
                <input id="confirm" type="password" placeholder="Konfirmasi Password"
                    onclick="this.style.borderColor = 'initial'" required>
                <button id="button2" name="daftar" onclick="checkPass()">Daftar</button>
                <a id='punya' onclick="punya()">Sudah punya akun ?</a>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>