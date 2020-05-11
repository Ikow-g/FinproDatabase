<?php
        require_once '../koneksi.php';
        $data_buku = mysqli_query($conn,"SELECT * FROM buku");
        $data_petugas = mysqli_query($conn,"SELECT * FROM petugas");
        $data_anggota = mysqli_query($conn,"SELECT * FROM anggota");
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peminjaman</title>
    <style>
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
        }

        #push {
            background-color: #333;
            color: #fff;
            padding: 4px 15px;
            border: none;
        }

        button:hover,
        #push:hover {
            background-color: grey;
            color: #fff;
        }
    </style>
</head>

<body>
    <h1>Peminjaman</h1>
    <table style="width:70%;">
        <form action="addPeminjaman.php" method="post">
            <input type="hidden" name="insert_buku" id="insert_buku" readonly>
            <tr>
                <td></td>
                <td style="width:15%;">Nama Petugas:</td>
                <td>
                    <select class="select" name="petugas" style="width:40%;" required>
                        <option value="">--- Pilih Petugas ---</option>
                        <?php while($petugas = mysqli_fetch_assoc($data_petugas)) : 
                            echo '<option value="'. $petugas['id_petugas'] .'">'. $petugas['nama_petugas'] .'</option>';
                        endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width:15%;"></td>
                <td>Nama Anggota:</td>
                <td>
                    <select class="select" name="anggota" style="width:40%;" required>
                        <option value="">--- Pilih Anggota ---</option>
                        <?php while($anggota = mysqli_fetch_assoc($data_anggota)) : 
                            echo '<option value="'. $anggota['id_anggota'] .'">'. $anggota['nama_anggota'] .'</option>';
                        endwhile ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal Pinjam:</td>
                <td><input type="date" name="tanggal" id="date" value="<?= date('Y-m-d') ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>Batas Pinjam:</td>
                <td><input type="date" name="bts_tanggal" id="batas" required></td>
            </tr>
            <tr>
                <td>
                    <h2>Input Buku</h2>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Nama Buku :</td>
                <td>
                    <select class="select" name="buku" style="width:40%;" id="buku">
                        <option value="0">--- Pilih Buku ---</option>
                        <?php while($buku = mysqli_fetch_assoc($data_buku)) : 
                            echo '<option value="'. $buku['id_buku'] .'">'. $buku['judul'] .'</option>';
                        endwhile ?>
                    </select>
                    <button id="push" type="button">Tambah</button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button id="submit" type="submit">Simpan</button></td>
            </tr>
        </form>
    </table><br>

    <table border="2" style="width:100%;" id="target">
        <thead>
            <thead>
                <th style="width:50%">Nama Buku</th>
                <th style="width:50%">Opsi</th>
            </thead>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script src="../jquery_3.4.1.js"></script>
    <script src="peminjaman.js"></script>
</body>

</html>