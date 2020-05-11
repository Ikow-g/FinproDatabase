<?php
require_once '../conn.php';
    if(isset($request->tmb))
    {
        $sql = "INSERT INTO sk VALUES('','$request->sk','$request->deskripsi')";
        $query = mysqli_query($conn,$sql);
        if(!$query){
            echo mysqli_error($conn);
            exit;
        }
        $new_id_sk = mysqli_insert_id($conn);

        $sql = "SELECT id_siswa FROM siswa";
        $query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($query);
        if($count > 0){
            while($siswa = mysqli_fetch_object($query)){
                $sql2 = "INSERT INTO siswa_sk VALUES('$new_id_sk','$siswa->id_siswa',NULL,FALSE)";
                $query2 = mysqli_query($conn,$sql2);
                if(!$query2){
                    echo mysqli_error($conn);
                    exit;
                }
            }
        }
        flask('Berhasil Membuat SK','index.php');

        }else if(isset($request->edt)){
            $sql = "UPDATE sk SET sk = '$request->sk', deskripsi='$request->deskripsi' WHERE id_sk = '$request->id'";
            $query = mysqli_query($conn,$sql);

            if(!$query){
                echo mysqli_error($conn);
                exit;
            }
            flask('Berhasil Mengubah Data','index.php');
    }else{
            $sql = "SELECT gambar FROM siswa_sk WHERE id_sk = '$request->id_sk'";
            $query = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($query);
            if($count > 0){
                while($gmb = mysqli_fetch_object($query)){
                    $filename = '../siswa/img_sk/'.$gmb->gambar;
                    if(!is_dir($filename)) {
                        if(file_exists($filename)){
                            unlink($filename);
                        }else{
                            continue;
                        }
                    }
                }
            }

            $sql = "DELETE FROM sk WHERE id_sk = '$request->id_sk'";
            $query = mysqli_query($conn,$sql);

            if(!$query){
                echo mysqli_error($conn);
                exit;
            }

            flask('Berhasil Mengapus Data','index.php');
    }