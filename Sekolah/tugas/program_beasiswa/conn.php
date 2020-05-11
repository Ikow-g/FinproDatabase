<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sekolah_program_beasiswa';

session_start();

$conn = mysqli_connect($host,$user,$pass,$db);

$no = 1;

$request = (object)$_REQUEST;
date_default_timezone_set('Asia/Jakarta');

$root = realpath($_SERVER["DOCUMENT_ROOT"]).'/sekolah/tugas/program_beasiswa';

function dd($dt)
{
var_dump($dt);
exit;
}

function redirect($path){
    header('Location: '.$path);
    exit;
}

function flask($msg,$path){
    echo 
    "<script>
        alert('$msg');
        location.href = '$path';
    </script>";
    exit;
}

function is_login()
{
    if(!isset($_SESSION['login']))
    {   
        header("Location: ../auth/login.php");
    }
}