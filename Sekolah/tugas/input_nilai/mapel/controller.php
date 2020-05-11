<?php
    require_once '../conn.php';

    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'delete':
                try{
                    $id_mapel = $_GET['id'];
                    $sql = "DELETE FROM mapel WHERE id = ?";
                    $stmt = $pdo->prepare($sql);
                    if($stmt->execute([$id_mapel]))
                    {
                        header('Location: index.php');
                        exit;
                    }
                }
                catch(PDOException $e) 
                {
                    echo "Error: " . $e->getMessage();
                }
                break;
            default:
                    
                break;
        }
    }else{
        $nama_mapel = $_POST['nama_mapel'];
        $sql = "INSERT INTO mapel VALUES('',:nama_mapel)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nama_mapel' => $nama_mapel]);

        header('Location: index.php');
        exit;
    }