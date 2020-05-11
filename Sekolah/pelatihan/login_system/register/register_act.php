<?php
    require_once '../../conn.php';

    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $sql = "INSERT INTO user VALUES('','$username','$password')";

    $insert = mysqli_query($conn,$sql);

    echo !$insert ? mysqli_error($conn) : header("Location: login.php") ;