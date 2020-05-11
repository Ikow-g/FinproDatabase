<?php
spl_autoload_register('AutoLoader');

function Autoloader($class){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    IF(strpos($url,'inc') !== false){
    $path = '../class/';
    }else{
    $path = 'class/';
    }
    $ext = '.class.php';
    $realpath = $path . $class . $ext;

    if (!file_exists($realpath)){return false;}

    include_once $realpath;
}