<!DOCTYPE html>
<html lang="en">

<head>
    <title>Latihan Seleksi Kondisi</title>
</head>

<body>
    <?php
    $nilai = 60;
    echo $nilai > 70 ? 'lulus' : ($nilai == 70 ? 'Pas' : 'Tidak Lulus');
    echo '<hr>';
    echo $nilai < 60 || $nilai == 60 ? 'nilai anda E' : ($nilai < 70 ? 'nilai anda D' : ($nilai < 80 ? 'nilai anda C' : ($nilai < 90 ? 'nilai anda B' : 'nilai Anda A')));
    ?>
</body>

</html>