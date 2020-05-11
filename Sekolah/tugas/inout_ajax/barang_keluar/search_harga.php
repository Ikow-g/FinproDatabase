<?php
    require_once '../koneksi.php';

    $id_barang = $_GET['id_barang'];
    $query = mysqli_query($koneksi,"SELECT harga FROM barang where id_barang = $id_barang");
    if($query){
        $data = mysqli_fetch_object($query);
        echo json_encode([
            'harga' => $data->harga, 
        ]);
    }else{
        echo mysqli_error($koneksi);
        exit;    
    }
?>