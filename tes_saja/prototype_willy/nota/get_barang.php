<?php  
    require_once '../koneksi.php';
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    $total_harga = str_replace(',','',$_POST['total']);
    $query = mysqli_query($conn, "SELECT harga,nama_barang FROM barang WHERE id = $id");
    $data = mysqli_fetch_object($query);
    $total_harga_barang = $data->harga * $jumlah;
    $total = $total_harga + $total_harga_barang;

    echo json_encode(['harga_barang' => number_format($total_harga_barang),
                    'nama'=>$data->nama_barang,
                    'total'=> number_format($total)]);
?>