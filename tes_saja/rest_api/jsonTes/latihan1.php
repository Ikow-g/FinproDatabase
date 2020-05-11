<?php
// $mahasiswa = [
//     [
//         "nama" => "Richard TJ",
//         "kelas" => "XII RPL I"
//     ],
//     [
//         "nama" => "Richard TJ",
//         "kelas" => "XI RPL I"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=perpus;', 'root', '');

$db = $dbh->prepare('select* from books');
$db->execute();

$buku = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($buku);
echo $data;

// var_dump($data);
