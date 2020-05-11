<?php

$host =  'localhost';
$user = 'root';
$password = '123456';
$dbname = 'pdoposts';


$dsn = 'mysql:host='. $host .';dbname='. $dbname;


$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
