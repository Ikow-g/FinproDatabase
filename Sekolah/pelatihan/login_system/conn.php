<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sekolah_db_ppob';

$dsn = "mysql:host=$host;dbname=$db";

$pdo = new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

function dd($dt)
{
var_dump($dt);
exit;
}

$request = (object)$_REQUEST;