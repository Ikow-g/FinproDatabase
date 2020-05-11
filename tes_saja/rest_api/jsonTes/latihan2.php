<?php
$data = file_get_contents('coba.json');
$dt = json_decode($data, true);
var_dump($dt);

echo $dt[0]["guru"]["BASDAT"];
