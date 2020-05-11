<?php

$a = 27.89;

//is_numeric checking yang pasti angka
//is_float cheking ex: 25.78 yang ada komanya
//is_int cek angka ex: 2578 yang gk ada koma
if(is_float($a))
{
    $b = str_replace('.','',$a);
}

echo 'Value lamanya '.$a.'<br>';
echo 'value_barunya '.$b.'<br>';