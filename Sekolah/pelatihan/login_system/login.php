<?php
    require_once '../conn.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    
    $login = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($login) > 0){
        $data = mysqli_fetch_assoc($login);
        $_SESSION['login'] = true;
        $_SESSION['identity'] = $data['nama_admin'];
        header('Location: index.php');
    }else{
        // $_SESSION['error'] = true;
        // header('Location: index.php');
    }