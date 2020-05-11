<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
        header("location:javascript://history.go(-1)");
    }



    if(!isset($req->s) || $req->s == NULL){
        $sql = "SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
        $data = mysqli_query($con,$sql);
                mysqli_close($con);
    }

?>

<div class="main_content">
    <div class="header">
        <a>Data Kelas</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info">
        <a href="tambah.php"><button class="btn-tambah">Tambah</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($kelas = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kelas->tingkatan_kelas.' '. $kelas->nama_jurusan.' '. $kelas->sub_kelas?></td>
                    <td>
                        <a href="aksi.php?aksi=hapus&&id_kelas=<?=$kelas->id_kelas?>"><button class="btn-del"
                                name="act">Delete</button></a>
                        <a href="ubah.php?id_kelas=<?=$kelas->id_kelas?>"><button class="btn-edit">Edit</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>