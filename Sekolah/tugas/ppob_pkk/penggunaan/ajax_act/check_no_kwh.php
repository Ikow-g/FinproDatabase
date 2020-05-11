<?php
    require_once '../../conn.php';

    $no_kwh =  $request->no_kwh;
    $sql = "SELECT pelanggan.id_pelanggan,pelanggan.nama_pelanggan,pelanggan.alamat,tarif.tarif_perkwh ,pelanggan.email
    FROM pelanggan JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif WHERE no_kwh = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$no_kwh]);
    
    if($stmt->rowCount() > 0 ){
        $data_pelanggan = $stmt->fetch();
        $awal = 0;$Nbulan="";$Ntahun="";
        $sql2 = 'SELECT meter_akhir AS awal,bulan, tahun
        FROM penggunaan where penggunaan.id_pelanggan = ? ORDER BY id_penggunaan DESC';
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$data_pelanggan->id_pelanggan]);
        
        if($stmt2->rowCount() > 0){
            $data_penggunaan = $stmt2->fetch();
            $bulan = $data_penggunaan->bulan;
            $tahun = $data_penggunaan->tahun;

            $Nbulan = $bulan == 12 ? 1 : $bulan + 1 ;
            $Ntahun = $bulan == 12 ? $tahun + 1 : $tahun;
            $awal = $data_penggunaan->awal;
        }
        $data = [
            'nama' => $data_pelanggan->nama_pelanggan,
            'alamat'=> $data_pelanggan->alamat,
            'awal' => $awal,
            'id_pelanggan' => $data_pelanggan->id_pelanggan,
            'bulan' =>  $Nbulan,
            'tahun' =>  $Ntahun,
            'tarif' => $data_pelanggan->tarif_perkwh,
            'email' => $data_pelanggan->email
        ];
        echo json_encode($data);
    }else{
        echo false;
    }