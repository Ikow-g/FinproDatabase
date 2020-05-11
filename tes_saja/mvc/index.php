<?php
    declare(strict_types = 1);
    include 'inc/autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>

<body>
    <p>Calculator</p>
    <form action="inc/calc.inc.php" method="post">
        <input type="number" name="number1" placeholder="number1">

        <select name="operator">
            <option value="add">Addition</option>
            <option value="sub">Subtraction</option>
            <option value="div">Division</option>
            <option value="mul">Multiplication</option>
        </select>

        <input type="number" name="number2" placeholder="number2">

        <button type="submit" name="submit">Calculate</button>
    </form>
</body>

</html>