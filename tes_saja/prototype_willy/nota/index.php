<?php
        require_once '../koneksi.php';
        $barang = mysqli_query($conn,"SELECT * FROM barang");
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota Jual</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <h1>Nota Jual</h1>
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
                <h2>Input</h2>
            </td>
            <td>
                <h2>Barang</h2>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Nama Barang :</td>
            <td>
                <select class="select" name="state" style="width: 100%" id="nama_barang">
                    <option></option>
                    <?php while($data = mysqli_fetch_object($barang)): ?>
                    <option value="<?= $data->id ?>"><?= $data->nama_barang ?></option>
                    <?php endwhile ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Jumlah :</td>
            <td><input type="text" name="jumlah" style="width:98%" placeholder="Jumlah Barang" id="jumlah"></td>
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
        <tr>
            <td></td>
            <td></td>
            <td>Total :</td>
            <td style="text-align:center;" id="total">0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Bayar :</td>
            <td><input type="text" name="jumlah" value="0"> <input type="checkbox" name="utang"> Utang</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Kembalian :</td>
            <td style="text-align:center;">0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align:center;"><a href=""><button>Simpan</button></a></td>
        </tr>
    </table><br>

    <table border="2" style="width:100%;" id="target">
        <thead>
            <tr>
                <th>Opsi</th>
                <th>Nama barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script src="../jquery_3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="nota.js"></script>
</body>

</html>