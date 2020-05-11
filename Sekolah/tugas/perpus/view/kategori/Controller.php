<?php
    require_once '../../setting/conection.php';
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
    }else if(($_POST['edit_kategori'])){
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
        $kategori = $_POST['kategori'];
        $sql = 'INSERT INTO tb_kategori(nama_kategori) VALUES(?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$kategori]);
        }catch(PDOException $e)
        {
            print_r($stmt->errorInfo()); 
            exit;
        }
        header('Location: index.php');
    }
