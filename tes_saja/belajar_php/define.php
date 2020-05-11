<?php

//string
define('string1','stringku adalah define string1<br>');
echo string1;

//aray
define(
    'array1',[
        'nasi',
        'goreng',
        'enak'
    ]
);

define(
    'array_associative',[
        'karbo' =>'nasi',
        'cara_masak'=>'goreng',
        'penilaian'=>'enak'
    ]
);

define(
    'array2',array(
        'nasi',
        'kuning',
        'juga enak'
    )
);
echo array_associative['penilaian'];
// foreach(array_associative as $dt){
//     echo $dt.'<br>';
// }
// foreach(array2 as $dt){
//     echo $dt.'<br>';
// }