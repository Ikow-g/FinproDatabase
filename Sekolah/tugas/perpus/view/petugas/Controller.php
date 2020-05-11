<?php
    require_once '../../setting/conection.php';
    $ogg = false;
    if (isset($_GET['aksi'])){
        try{
            $kategori = $_GET['id_kategori'];
            $sql = 'DELETE FROM tb_kategori WHERE id_kategori = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$kategori]);
        }catch(PDOException $e)
        {
            print_r($stmt->errorInfo()); 
            exit;
        }
        header('Location: index.php');
    }else if($ogg){
        $id_kategori = $_POST['id'];
        try{
            $kategori = $_POST['edit_kategori'];
            $sql = 'UPDATE tb_kategori SET nama_kategori=? WHERE id_kategori=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$kategori,$id_kategori]);
        }catch(PDOException $e)
        {
            print_r($stmt->errorInfo()); 
            exit;
        }
        header('Location: index.php');
    }else{
        try{
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $sql = 'INSERT INTO tb_petugas(nama_petugas,username,password,alamat,no_telp) VALUES(:nama,:username,:password,:alamat,:no_telp)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["nama"=>$nama,"username"=>$username,"password"=>$password,"alamat"=>$alamat,"no_telp"=>$no_telp]);
        }catch(PDOException $e)
        {
            print_r($stmt->errorInfo()); 
            exit;
        }
        header('Location: index.php');
    }
