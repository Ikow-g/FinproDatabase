<?php require_once('../koneksi.php'); 
$query = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barang Keluar</title>
</head>
<body>
    <h1>Form Barang Keluar</h1>
    <table>
        <tr>
            <td>Kode Transaksi</td>
            <td><input type="text" nama='kode_transaksi' value="<?= chr(65 + rand(0, 25)); ?>"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><input type="date" nama='tanggal' value="<?= date('Y-m-d') ?>">
            <br><a style="color:blue;">Today : <?= date('D-d-M-Y') ?></a>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input type="text" nama='keterangan'></td>
        </tr>
    </table>
    <h4>Detail Barang</h4>
    <button type="button" id="tambah_item">Tambah Item</button>
    <form action="add.php" method="POST" id="main">
        <input type="hidden" id="count_row" name="count_row" value='0'>
        <table border="1" width='50%' id="tb_detail">
            <tr>
                <td>Kode Barang</td>
                <td>Harga</td>
                <td>Jumlah</td>
                <td>Total</td>
            </tr>
            <tr>
                <td>
                    <select name="barang[]" onchange="select_barang(0,this.value);">
                        <option value="">--- PILIH KODE ---</option>
                        <?php while($data =  mysqli_fetch_object($query)){ ?>
                        <option value="<?= $data->id_barang ?>"><?= $data->kode .' || '. $data->nama ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" name='harga[]' id="harga0" class="harga_barang" readonly></td>
                <td><input type="text" name='jumlah[]' id="jumlah0" class="jumlah-barang" onkeyup="count_total(0)"></td>
                <td><input type="text" name='total[]' id='total0' class="total" readonly></td>
            </tr>
        </table><br><br>
        <button type="submit" name="submit" value="ok">Proses !</button>
    </form>
    <script src="../asset/jquery_3.4.1.js"></script>
    <script src="keluar.js"></script>
</body>
</html>