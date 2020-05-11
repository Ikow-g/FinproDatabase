<?php
    require_once 'conn.php';

    $id = $_GET['id'];
    $awal = 0;
    $bulan = "";
    $tahun = "";
    $sql = "SELECT * FROM penggunaan JOIN pelanggan ON penggunaan.id_pelanggan = pelanggan.id_pelanggan WHERE penggunaan.id_pelanggan = '$id' ORDER BY penggunaan.id_penggunaan DESC";
    $penggunaan = mysqli_query($conn, $sql);
    if (mysqli_num_rows($penggunaan) > 0) {
        $data = mysqli_fetch_assoc($penggunaan);
        $awal = $data['meter_akhir'];
        $check_bulan = $data['bulan'] + 1 ;
        $bulan = $check_bulan == 13 ? 1 : $check_bulan;
        $tahun = $check_bulan == 13 ? $data['tahun'] + 1 : $data['tahun'];
    } else {
        $sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
        $pelanggan = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($pelanggan);
    }

    $data_pelanggan = [
        'nama'  => $data['nama_pelanggan'],
        'alamat'=> $data['alamat'],
        'awal'  => $awal,
        'bulan' => $bulan,
        'tahun' => $tahun
    ];

    echo json_encode($data_pelanggan);
