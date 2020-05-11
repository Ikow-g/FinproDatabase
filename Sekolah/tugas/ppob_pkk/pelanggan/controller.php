<?php
    require_once '../conn.php';


    switch ($request->act) {
        case 'Tambah':
        try{
            $sql = "SELECT MAX(id_pelanggan) AS latest FROM pelanggan";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $latest_id = $stmt->fetch();

            $id = $latest_id->latest ? $latest_id->latest + 1 : '001';
            switch (strlen($id)) {
                case '1':
                    $id = "00$id";
                    break;
                case '2':
                    $id = "0$id";
                    break;
                default:
                    $id;
                    break;
            }

            $sql = "INSERT INTO pelanggan VALUES(:id,:nama,:no,:alamat,:email,:nomor,:tarif)";
            $date = date('Y-m-d');
            $explode = explode('-',$date);
            $join = implode('',$explode);

            $stmt = $pdo->prepare($sql);
            $insert = $stmt->execute
                ([
                'id'    => $id,
                'nama' => $request->nama,
                'no' => $join.$id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'tarif' => $request->tarif
                ]);
            if($insert){
            $_SESSION['notice'] = [
            'msg' => 'Berhasil Menambahkan Data',
            'class' => 'alert-success',
            ];
            header('Location: index.php');exit;
        }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
            break;
        case 'del':
            try{
                $sql = "DELETE FROM pelanggan WHERE id_pelanggan = ?";
                $stmt = $pdo->prepare($sql);
                $delete = $stmt->execute([$request->id]);
                if($delete){
                    $_SESSION['notice'] = [
                    'msg' => 'Berhasil Menghapus Data',
                    'class' => 'alert-success',
                    ];
                    header('Location: index.php');exit;}
            }catch(PDOException $e){
                if(strpos($e->getMessage(),'Cannot delete or update a parent row')){
                $_SESSION['notice'] = [
                'msg' => 'Terdapat data yang terhubung dengan data ini',
                'class' => 'alert-error',
                ];
                header('Location: index.php');
                exit;
                }
                echo "Error: " . $e->getMessage();
            }
            break;
        case 'update':
            try{
            $sql = "UPDATE pelanggan SET nama_pelanggan = :nama, no_kwh = :no,alamat = :alamat,email = :email,no_hp = :nomor,id_tarif = :tarif WHERE id_pelanggan = :id";
            $stmt = $pdo->prepare($sql);
            $update = $stmt->execute
                ([
                    'id' => $request->id,
                    'nama' => $request->nama,
                    'no' => $request->no,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'nomor' => $request->nomor,
                    'tarif' => $request->tarif
                ]);
                if($update){
                    $_SESSION['notice'] = [
                    'msg' => 'Berhasil Mengubah Data',
                    'class' => 'alert-success',
                    ];
                    header('Location: index.php');
                    exit;}
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
            break;
        default:
                die('kelewatan');
            break;
    }