<?php

    require_once '../conn.php';
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;

    if(isset($request->login)){
        $sql = "SELECT * FROM user WHERE id_user = '$request->username'";
        $user = mysqli_query($conn,$sql);
        $data_user = mysqli_fetch_object($user);
        if($data_user && password_verify($request->password,$data_user->password)){
            $now = date('Y-m-d H:i:s', strtotime('1 hour'));
            $sql = "UPDATE user SET login_terakhir ='$now' WHERE id_user = '$request->username'";
            mysqli_query($conn,$sql);
            $_SESSION['id'] = $data_user->id_user;
            $is_user = $data_user->level;
            if($is_user == 'user'){
                $sql = "SELECT * FROM siswa WHERE id_siswa = '$request->username'";
                $user = mysqli_query($conn,$sql);
                $data_user = mysqli_fetch_object($user);
                $_SESSION['user'] = true;
                $_SESSION['identity'] = [
                    'nama' => $data_user->nama,
                    'nisn' => $data_user->id_siswa
                ];
            }
            $_SESSION['login'] = true;
            redirect('../main/index.php');
        }else{
            flask('Username atau Password salah','login.php');
        }
    }else{
        $sql = "SELECT * FROM siswa WHERE email='$request->email'";
        $query = mysqli_query($conn,$sql);

        if(mysqli_num_rows($query) > 0){
            flask('Email sudah pernah terdaftar','login.php');
        }


        $now = date('Y-m-d');
        $pass = password_hash($request->password,PASSWORD_DEFAULT);
        $explode = explode('-',$now);
        $implode = implode('',$explode);
        $sql = "INSERT INTO user VALUES('$request->number','$pass','user',NULL,'$now')";
        $query = mysqli_query($conn,$sql);
        if(!$query){
            flask('NISN sudah pernah terdaftar','login.php');
        }
        $sql = "INSERT INTO siswa VALUES('$request->number','$request->username','$request->email','$request->phone',FALSE)";
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
                $sql2 = "INSERT INTO siswa_sk VALUES('$sk->id_sk','$request->number',NULL,FALSE)";
                $query2 = mysqli_query($conn,$sql2);
                if(!$query2){
                    echo mysqli_error($conn);
                    exit;
                }
            }
        }

        $code = $implode.'iddi'.$request->number;

        $mg = Mailgun::create('079ad03e14423c2b671b020734fdc478-f8faf5ef-448a06e5'); // For US servers

        $mg->messages()->send('sandbox300fcfaa91f14f5cb2a234eb4f608afe.mailgun.org',
            [
            'from' => 'beasiswainn@gmail.com',
            'to' => $request->email,
            'subject' => 'Verifikasi akun anda sekarang '.$request->username,
            'text' => 'Klik link berikut untuk memverifikasi akun anda
            http://localhost/sekolah/tugas/program_beasiswa/verify/verify.php?nuka='.$code
            ]);
        flask('Berhasil Membuat Akun','login.php');
    }