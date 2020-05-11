<?php
    require_once '../conn.php';

    switch ($request->act) {
        case 'Tambah':
        try{
            $sql = "INSERT INTO tarif VALUES('',?,?)";
            $stmt = $pdo->prepare($sql);
            $insert = $stmt->execute([$request->daya,$request->tarif]);
            if($insert){header('Location: index.php');exit;}
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
            break;
        case 'del':
            
            try{
                $sql = "DELETE FROM tarif WHERE id_tarif = ?";
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
                $sql = "UPDATE tarif SET daya = :daya , tarif_perKwh = :tarif WHERE id_tarif = :id";
                $stmt = $pdo->prepare($sql);
                $update = $stmt->execute([
                    'daya'=> $request->daya,
                    'tarif'=> $request->tarif,
                    'id'=> $request->id,
                ]);
                if($update){
                    $_SESSION['notice'] = [
                    'msg' => 'Berhasil Mengubah Data',
                    'class' => 'alert-success',
                    ];
                    header('Location: index.php');exit;
                }
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
            break;
        default:
                var_dump('kelewatan');
            break;
    }