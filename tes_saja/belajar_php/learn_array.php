<?php


$array1 = ['a',1];
$array2 = array('a',1);


// foreach($array1 as $dt)
// {
//         echo $dt.'<br>';
// }
$a = 0;
while($a < count($array2))
{
        echo $array2[$a].'<br>';
        $a++;
}

?>
