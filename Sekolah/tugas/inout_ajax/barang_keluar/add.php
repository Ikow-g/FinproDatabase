<?php
    require_once '../koneksi.php';
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $count_row = $_POST['count_row'];
    $date = date('Y-m-d');
    $jumlah_barang_keluar = $count_row + 1;

    $query = "INSERT INTO barang_keluar(tanggal_keluar,jumlah_barang_keluar) VALUES('$date','$jumlah_barang_keluar')";
    $insert = mysqli_query($koneksi,$query);
    if($insert){
        $id_barang_keluar = mysqli_insert_id($koneksi);
        for($counts = 0 ; $counts <= $count_row ; $counts++){
            $query2 = "INSERT INTO detail_barang_keluar VALUES('','$jumlah[$counts]','$harga[$counts]','$total[$counts]','$barang[$counts]','$id_barang_keluar')";
            $insert2 = mysqli_query($koneksi,$query2);
            if(!$insert2){
                echo mysqli_error($koneksi);
                exit;    
            }
        }
        $query3 = "SELECT SUM(total) FROM detail_barang_keluar WHERE id_barang_keluar='$id_barang_keluar'";
        $count_total = mysqli_query($koneksi,$query3);
        if($count_total) {
            $total = mysqli_fetch_array($count_total);
            $total_harga = $total[0];
            $query4 = "UPDATE barang_keluar SET total_harga = '$total_harga' WHERE id_barang_keluar = $id_barang_keluar ";
            $update =  mysqli_query($koneksi,$query4);
            if($update){
                header('location: barang_keluar.php');
                exit;
            }else{
                echo mysqli_error($koneksi);
                exit;
            }
        }else{
            echo mysqli_error($koneksi);
        }
    }else{
        echo mysqli_error($koneksi);
        exit;
    }
