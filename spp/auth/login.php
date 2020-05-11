<?php
require_once '../conn.php';
if(isset($_SESSION["login"]))
{
    header("location:javascript://history.go(-1)");
}
if(isset($_POST['login']))
{
    $stmt = mysqli_stmt_init($con);
    $sql = 'SELECT * FROM user WHERE username = ?';

    if(mysqli_stmt_prepare($stmt,$sql)){

    mysqli_stmt_bind_param($stmt, "s", $req->username);

    mysqli_stmt_execute($stmt);

    $cek_user = mysqli_stmt_get_result($stmt);

    
    if(mysqli_num_rows($cek_user) > 0){

        $user = mysqli_fetch_object($cek_user);

        if(password_verify($req->password,$user->password))
        {
            $_SESSION['login'] = true;
            if($user->id_user == $user->username){
                $sql = "SELECT * FROM siswa WHERE nisn = '$user->id_user'" ;
                $data_user = mysqli_fetch_object(mysqli_query($con,$sql));
                $nama = $data_user->nama;
                $level = 'siswa';
                $id_n = NULL;
            }else{
                $sql = "SELECT * FROM petugas WHERE id_user = '$user->id_user'" ;
                $data_user = mysqli_fetch_object(mysqli_query($con,$sql));
                $nama = $data_user->nama_petugas;
                $level = $data_user->level;
                $id_n = $data_user->id_petugas;
            }
                    $_SESSION['user'] = [
                        'id' => $user->id_user,
                        'name' => $nama,
                        'level' => $level,
                        'id_n' => $id_n
                    ];

            mysqli_stmt_close($stmt);
            mysqli_close($con);
            header('Location: ../main/index.php');
            exit;
        }else{
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            $error_password = true;   
			$old_value = $user->username;
        }
    }else{
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        $error_username = true;
	}
}else{
    echo 'Error: '. mysqli_error($con);
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit;
}
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>SPP</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="loginBox">
        <img src="avatar_blue.png" class="user">
        <h2>Login</h2>
        <form action="" method="POST">
            <p>Username</p>
            <input name="username" type="text" autocomplete="off" placeholder="Masukan Username"
                value="<?= isset($old_value) ? $old_value : ''?>" required>
            <?php if(isset($error_username)): ?> <a class="err">Username Salah</a><?php endif ?>
            <br><br>
            <p>Password</p>
            <input name="password" type="password" placeholder="••••••" required>
            <?php if(isset($error_password)): ?><a class='err'>Password Salah</a><?php endif ?>
            <br><br>
            <input type="submit" name="login" value="Sign In">
        </form>
    </div>
</body>

</html>