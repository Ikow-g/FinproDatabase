<?php
    require_once '../conn.php';

    if(isset($_GET['id'])){
        try
        {
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
    }else{
        switch (isset($_POST['act'])) 
        {
            case 'Tambah':
                        try
                        {
                            $username = $_POST['username'];
                            $nama = $_POST['nama'];
                            $umur = $_POST['umur'];
                            $password = password_hash($_POST['pass'],PASSWORD_DEFAULT) ;
                            $alamat = $_POST['alamat'];
                            $tahun = date('Y');
                            $mapel = $_POST['mapel'];
                            $sql = "INSERT INTO user_profile VALUES('',:username,:nama,:umur,:password,:alamat)";
                            $stmt = $pdo->prepare($sql);
                            $insert_user_profile = $stmt->execute([
                                                    'username'  =>  $username,
                                                    'nama'      =>  $nama,
                                                    'umur'      =>  $umur,
                                                    'password'  =>  $password,
                                                    'alamat'    =>  $alamat
                                                ]);
                            if($insert_user_profile)
                            {
                                try
                                {
                                    $user_profile_id = $pdo->lastInsertId();
                                    $sql2 = "INSERT INTO guru VALUES('',?,?)";
                                    $stmt = $pdo->prepare($sql2);
                                    $insert_guru = $stmt->execute([$tahun,$user_profile_id]);
                                    if($insert_guru)
                                    {
                                        try{
                                                $guru_id = $pdo->lastInsertId();
                                                $sql3 = "INSERT INTO guru_mapel VALUES('',?,?)";
                                                $stmt = $pdo->prepare($sql3);
                                                for($num = 0; $num < count($mapel); $num++)
                                                {
                                                    $insert_guru_mapel = $stmt->execute([$guru_id,$mapel[$num]]);
                                                }
                                                if($insert_guru_mapel)
                                                {
                                                    header('Location: index.php');
                                                    exit;
                                                }
                                            }
                                            catch(PDOException $e)
                                            {
                                                echo "Error: " . $e->getMessage();
                                                exit;
                                            }
                                    }
                                }
                                catch(PDOException $e)
                                {
                                    echo "Error: " . $e->getMessage();
                                    exit;
                                }
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo "Error: " . $e->getMessage();
                            exit;
                        }
                        break;
                    
            default:
                    var_dump('default');    
                    exit;
                    break;
        }
    }