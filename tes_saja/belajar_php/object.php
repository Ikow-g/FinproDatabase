<?php
class Car {
    function Car() {
        $this->model = "VW";
        $this->fuel = "pertamax";
        $this->owner = "";
    }
}
// create an object
$honda = new Car();
$honda->owner = 'Mrs.Henderson';
// show object properties
echo $honda->fuel.'<br>';
echo $honda->owner.'<br>';

class Sex{
    function Sex()
    {
        $this->name = "Herera";
        $this->gender = "Male";
    }
}

$human = new Sex();
    echo $human->name.'<br>';
    echo $human->gender.'<br>';
$human->gender = 'female';
    echo $human->gender.'<br>';
