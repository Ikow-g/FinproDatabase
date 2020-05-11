<?php
    require_once('../koneksi.php');
    $query = mysqli_query($koneksi, "SELECT * FROM barang");
    $new_count = $_GET['count'];
    echo'
    <tr id="table-row'.$new_count.'">
    <td>
    <select name="barang[]" onchange="select_barang('.$new_count.',this.value)">
    <option value="">--- PILIH KODE ---</option>';
    while($data =  mysqli_fetch_array($query)){ 
    echo '<option value='.$data['id_barang'].'>'.$data['kode'].' || '. $data['nama'] .'</option>';
    } 
    echo'
    </select>
    </td>
    <td><input type="text" id="harga'.$new_count.'" name="harga['.$new_count.']" class="harga_barang" readonly></td>
    <td><input type="text" id="jumlah'.$new_count.'" name="jumlah['.$new_count.']" class="jumlah-barang"></td>
    <td><input type="text" id="total'.$new_count.'" name="total['.$new_count.']" class="total" readonly></td>
    <td><button type="button" class="btn-remove">Hapus</button></td>
    </tr>';
    
?>