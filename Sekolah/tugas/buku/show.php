<?php

    include 'conn.php';

    if(isset($_GET['cari'])){
        $search = $_GET['cari'];
        if($search){
            $query = "SELECT * FROM buku WHERE nama_buku LIKE '%$search%'";
        }else{
            $query = "SELECT * FROM buku";
        }
    }else{
        $query = "SELECT * FROM buku";
    }
    $get = mysqli_query($conn,$query) or trigger_error("query error: ".mysqli_error($conn));
    mysqli_close($conn);

    if(mysqli_num_rows($get) > 0)
    {
        while($data = mysqli_fetch_object($get)){
            echo "ID Buku : ";
            echo $data->id_buku."\n";
            echo "Nama Buku : ";
            echo $data->nama_buku."\n";
            echo "Sipnosis : ";
            echo $data->sumary."||";
        }
    }
        ?>