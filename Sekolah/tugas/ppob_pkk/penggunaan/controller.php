<?php
    require_once '../conn.php';

    switch ($request->act) {
        case 'Tambah':
        try {
            $sql = "INSERT INTO penggunaan VALUES('',:bulan,:tahun,:meter_awal,:meter_akhir,:id_pelanggan)";
            $stmt = $pdo->prepare($sql);
            $insert_penggunaan = $stmt->execute([
                'bulan'         => $request->bulan ?? $request->bulan2,
                'tahun'         => $request->tahun ?? $request->tahun2,
                'meter_awal'    =>  $request->awal,
                'meter_akhir'   =>  $request->akhir,
                'id_pelanggan'  =>  $request->id_pelanggan
                ]);
            if ($insert_penggunaan) {
                $id_penggunaan = $pdo->lastInsertId();
                $jumlah_meter = $request->akhir - $request->awal;
                $total = $jumlah_meter * $request->tarif;
                $sql = "INSERT INTO tagihan VALUES('',:jumlah_meter,:status,:total,:id_penggunaan)";
                $stmt = $pdo->prepare($sql);
                $insert_penggunaan = $stmt->execute([
                'jumlah_meter'  => $jumlah_meter,
                'status'        => 'belum bayar',
                'total'         => $total,
                'id_penggunaan' => $id_penggunaan
                ]);
                if ($insert_penggunaan) {
                    $_SESSION['notice'] = [
                        "notice" => 'Berhasil Menambahkan Data',
                        "class" => "alert-success"
                    ];
                    $redirect = "Location: detail.php?id=$request->id_pelanggan";
                    header($redirect);
                    exit;
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit;
        }
            break;
        case 'del':
            try {
                $sql = "DELETE FROM tarif WHERE id_tarif = ?";
                $stmt = $pdo->prepare($sql);
                $delete = $stmt->execute([$request->id]);
                if ($delete) {
                    header('Location: index.php');
                    exit;
                }
            } catch (PDOException $e) {
                if (strpos($e->getMessage(), 'Cannot delete or update a parent row')) {
                    $_SESSION['notice'] = 'Terdapat Data Yang terhubung dengan ini';
                    header('Location: index.php');
                    exit;
                }
                echo "Error: " . $e->getMessage();
            }
            break;
        case 'update':
            try {
                $sql = "UPDATE tarif SET daya = :daya , tarif_perKwh = :tarif WHERE id_tarif = :id";
                $stmt = $pdo->prepare($sql);
                $update = $stmt->execute([
                    'daya'=> $request->daya,
                    'tarif'=> $request->tarif,
                    'id'=> $request->id,
                ]);
                if ($update) {
                    header('Location: index.php');
                    exit;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            break;
        default:
                var_dump('kelewatan');
            break;
    }