<?php
session_start();
if(isset($_SESSION["login"]))
{
  header('Location: ../main/index.php');
}
require_once '../../setting/conection.php';
if(isset($_POST['login']))
{
	$username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM tb_petugas where username = ?';
    $stmt = $pdo->prepare($sql);
	$stmt->execute([$username]);
	
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        if(password_verify($password,$user->password) || $password == $user->password)
        {
			$_SESSION['login'] = true;
			$_SESSION['user'] = [
				'id' => $user->id_petugas,
				'name' => $user->nama_petugas
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
	<title>Da Perpus</title>
	<link rel="stylesheet" href="../../asset/css/login.css">
</head>

<body>
	<div class="loginBox">
		<img src="../../asset/image/avatar.png" class="user">
		<h2>Log In Here</h2>
		<form action="" method="POST">
			<p>Email</p>
			<input name="username" type="text" autocomplete="off" placeholder="Masukan Username" value="<?= isset($old_value) ? $old_value : ''?>" required>
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