<?php
    declare(strict_types = 1);
    include 'autoload.inc.php';

    $operator = $_POST['operator'];
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];

    $calc = new calc($operator,(int)$num1,(int)$num2);

    try{
        echo $calc->calculate();
    }catch(TypeError $e){
        echo "error!: " . $e->getMessage() ;
    }

?>