<?php
require_once '../conn.php';
if(isset($_SESSION["login"]))
{
  header('Location: ../main/index.php');
}
if(isset($_POST['login']))
{
	$username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM admin WHERE username = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        if(password_verify($password,$user->password) || $password == $user->password)
        {
			$_SESSION['login'] = true;
			$_SESSION['user'] = [
				'id' => $user->id_admin,
				'name' => $user->nama_admin
			];
            header('Location: ../main/index.php');
            exit;
        }else{
            $error_password = true;   
			$old_value = $user->username;
        }
    }else{
        $error_username = true;
	}
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>APN</title>
    <link rel="stylesheet" href="../asset/login.css">
</head>

<body>
    <div class="loginBox">
        <img src="../asset/img/avatar_blue.png" class="user">
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