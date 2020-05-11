<?php
        require_once '../koneksi.php';
        $barang = mysqli_query($conn,"SELECT * FROM pelanggan");
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota Jual</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <h1>PPOB</h1>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Nama Pelanggan:</td>
            <td>
                <select class="select" name="state" style="width: 100%">
                    <option></option>
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Nomor</h2>
            </td>
            <td>
                <h2>KWH</h2>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>No KWH :</td>
            <td>
                <select class="select" name="state" style="width: 100%" id="nama_barang">
                    <option></option>
                    <?php while($data = mysqli_fetch_object($barang)): ?>
                    <option value="<?= $data->id ?>"><?= $data->no_kwh ?></option>
                    <?php endwhile ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Satuan :</td>
            <td>
                <select class="select" name="state" style="width: 70%" id="satuan">
                    <option></option>
                    <option value="Buah">Buah</option>
                    <option value="Kilogram">Kilogram</option>
                    <option value="Kodi">Kodi</option>
                    <option value="Lusin">Lusin</option>
                    <option value="Biji">Biji</option>
                </select>
                <button id="push" type="button">Tambah</button>
            </td>
        </tr>
    </table><br>
    <script src="../jquery_3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="nota.js"></script>
</body>

</html>