<?php
include 'koneksi.php';

$id = $_POST['id'];
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id");
$data = mysqli_fetch_array($query);

echo json_encode(array('nama' => $data['nama'], 'harga' => $data['harga']));

?>