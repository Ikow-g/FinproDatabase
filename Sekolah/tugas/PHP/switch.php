<!DOCTYPE html>
<html lang="en">

<head>
    <title>Switch</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="input" required>
        <input type="submit">
    </form>
    <?php
    $jawaban = 'A';
    switch ($jawaban) {
        case 'A':
            echo 'benar';
            break;
        case 'B':
            echo 'salah';
            break;
        case 'C':
            echo 'salah';
            break;
        case 'D':
            echo 'salah';
            break;
        default:
            echo 'Pilihan Tidak dikenal';
            break;
    }
    $_POST["name"] ? $name = $_POST["name"] : '';
    ?>
    <a><?
        $name ? $name : '';
        echo $name
        ?></a>
</body>

</html>