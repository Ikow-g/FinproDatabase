<?php
require_once '../conn.php';
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;
    if(isset($request->tmb))
    {
        $now = date('Y-m-d');
        $pass = password_hash($request->nisn,PASSWORD_DEFAULT);
        $sql = "INSERT INTO user VALUES('$request->nisn','$pass','user',NULL,'$now')";
        $query = mysqli_query($conn,$sql);
        
        if(!$query){
            flask('NISN sudah pernah terdaftar','index.php');
        }

        $sql = "INSERT INTO siswa VALUES('$request->nisn','$request->nama','$request->email','$request->phone',FALSE)";
        $query = mysqli_query($conn,$sql);

        if(!$query){
            echo mysqli_error($conn);
            exit;
            }

        $sql = "SELECT id_sk FROM sk";
        $query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($query);
        if($count > 0){
            while($sk = mysqli_fetch_object($query)){
                $sql2 = "INSERT INTO siswa_sk VALUES('$sk->id_sk','$request->nisn',NULL,FALSE)";
                $query2 = mysqli_query($conn,$sql2);
                    if(!$query2){
                    echo mysqli_error($conn);
                    exit;
                    }
                }
        }
            flask('Berhasil Membuat Akun','index.php');
        }else if(isset($request->edt)){
            $pass = password_hash($request->nisn,PASSWORD_DEFAULT);
            $sql = "UPDATE user SET id_user = '$request->nisn', password='$pass' WHERE id_user = '$request->old_nisn'";
            $query = mysqli_query($conn,$sql);
        
            $sql = "UPDATE user SET id_user = '$request->nisn', password='$pass'";
            $query = mysqli_query($conn,$sql);

            $sql = "UPDATE siswa SET nama='$request->nama',email='$request->email',no_hp='$request->phone' WHERE id_siswa = '$request->nisn'";
            $query = mysqli_query($conn,$sql);

            if(!$query){
                echo mysqli_error($conn);
                exit;
            }
            flask('Berhasil Mengubah Data','index.php');

        }else if(isset($request->upload)){
            $file = $_FILES['gambar'];

            $name =  $file['name'];
            $TmpName = $file['tmp_name'];
            $size = $file['size'];
            $err = $file['error'];

            $ext = explode('.',$name);
            $Actualext = strtolower(end($ext));

            $allowed = ['jpg','jpeg','png'];

            if(in_array($Actualext,$allowed)){
                if($err === 0){
                    $new_name = uniqid('',true).".$Actualext";
                    $path = 'img_sk/'.$new_name;
                    $upload = move_uploaded_file($TmpName,$path);
                    $sql = "UPDATE siswa_sk SET gambar='$new_name' WHERE id_sk = '$request->id_sk' AND id_siswa = '$request->id_siswa'";
                    $query = mysqli_query($conn,$sql);
                    if(!$query){
                        echo mysqli_error($conn);
                        exit;
                    }
                    
                    flask('Berhasil Mengupload Gambar','detail.php?id_siswa='.$request->id_siswa);
                }else{
                    flask('Terjadi kesalahan. Silahkan coba lagi','detail.php?id_siswa='.$request->id_siswa);
                }
            }else{
                flask('Ekstensi file salah !','detail.php?id_siswa='.$request->id_siswa);
            }
        }else if(isset($request->verif)){
            if($request->verif == 'verifikasi'){
                $status = FALSE;
            }elseif($request->verif == 'tolak' ){
                // dd($request);
                $status = FALSE;
                $mg = Mailgun::create('079ad03e14423c2b671b020734fdc478-f8faf5ef-448a06e5'); // For US servers

                $mg->messages()->send('sandbox300fcfaa91f14f5cb2a234eb4f608afe.mailgun.org',
                [
                'from' => 'beasiswainn@gmail.com',
                'to' => $request->email,
                'subject' => 'Penolakan file',
                'text' => 'File ini ditolak karena '.$request->deskripsi
                ]);

            }else{
                $status = TRUE;
            }
            $sql = "UPDATE siswa_sk SET status = '$status' WHERE id_sk='$request->id_sk' AND id_siswa='$request->id_siswa'";
            $query = mysqli_query($conn,$sql);
            if(!$query){
                echo mysqli_error($conn);
                exit;
            }
            flask('Berhasil Mengubah Status','detail.php?id_siswa='.$request->id_siswa);
        }else if(isset($request->hpsImg)){
            $file = 'img_sk/'.$request->img;
            unlink($file);

            $sql = "UPDATE siswa_sk SET gambar = NULL WHERE id_sk = '$request->id_sk' AND id_siswa='$request->id_siswa'";
            $query = mysqli_query($conn,$sql);

            flask('Berhasil Menghapus gambar','detail.php?id_siswa='.$request->id_siswa);
        }
        else{
            $sql = "SELECT gambar FROM siswa_sk WHERE id_siswa = '$request->id_user'";
            $query = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($query);
            if($count > 0){
                while($gmb = mysqli_fetch_object($query)){
                    $filename = 'img_sk/'.$gmb->gambar;
                    if(!is_dir($filename)) {
                        if(file_exists($filename)){
                            unlink($filename);
                        }else{
                            continue;
                        }
                    }
                }
            }

            $sql = "DELETE FROM user WHERE id_user = '$request->id_user'";
            $query = mysqli_query($conn,$sql);
            if(!$query){
                echo mysqli_error($conn);
                exit;
            }

            flask('Berhasil Mengapus Akun','index.php');
    }