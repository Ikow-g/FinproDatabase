<?php

    $search = 'data';

    $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%'";

    // inject get all data
    $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%'";//'";



?>