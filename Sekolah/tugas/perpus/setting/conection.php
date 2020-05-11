<?php

    
$host =  'localhost';
$user = 'root';
$pass = '';
$dbname = 'sekolah_perpustakaan';


$dsn = 'mysql:host='. $host .';dbname='. $dbname;


$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
