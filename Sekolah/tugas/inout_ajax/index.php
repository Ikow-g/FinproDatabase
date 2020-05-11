<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Kode</td>
                <td>
                <select name="kode" class="kode-barang">
                <option value="">--Pilih--</option>
                <?php while ($data = mysqli_fetch_array($query)) { ?>
                    <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['kode'] ?></option>
                    <?php } ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama" class="nama-barang" readonly>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" class="harga-barang" onchange="hitung();" readonly>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>
                    <input type="text" name="jumlah" onkeyup="hitung();" class="jumlah-barang">
                </td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td>
                    <input type="text" name="subtotal" id="total" class="subtotal-barang" readonly>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <button type="submit" name="submit" value="oke">Submit</button>
                </td>
            </tr>
        </table>
    </form>
    <script src="asset/jquery_3.4.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('.kode-barang').change(function(){
            var id_barang = $(this).val();
            $.ajax({
                url: 'getdata.php',
                type: 'POST',
                data: {id: id_barang},
                dataType: 'json'
            })
            .done(function(result){
                $(".nama-barang").val(result.nama);
                $(".harga-barang").val(result.harga);
            })
            .fail(function(){
                alert("eror");
            })
            .always(function(){
                console.log("complete");
            });
        });
    }); 

    function hitung(){
        var a = $(".harga-barang").val();
        var b = $(".jumlah-barang").val();
        if(!a || !b){
            return false;
        }
        var result = a * b;

        $('#total').val(result);
    }
  </script>
</body>
</html>