<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
        {
        header("location:javascript://history.go(-1)");
        }

    if(!isset($req->s) || $req->s == NULL){
        $sql = "SELECT siswa.*,kelas.*,jurusan.nama_jurusan FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan";
        $data = mysqli_query($con,$sql);
                mysqli_close($con);
    }else{
        $sql = "SELECT siswa.*,kelas.*,jurusan.nama_jurusan FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan WHERE nisn LIKE ? OR nama LIKE ?";
        $stmt = mysqli_stmt_init($con);

        $search = "%$req->s%";

        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ss", $search,$search);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);

        }else{
            echo 'Error: '. mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }

?>

<div class="main_content">
    <div class="header">
        <a>Data Siswa</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info">
        <form action="index.php" style="display: inline;">
            <label for="s">Cari :</label>
            <input type="text" name="s" style="width: 20%;" placeholder="Cari..."
                <?= isset($req->s) ? "value='$req->s'" : '' ?>>
            <button class="btn-info">Cari</button>
        </form>
        <a href="tambah.php"><button class="btn-tambah">Tambah</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>JK</th>
                    <th>Nomor Telpon</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($siswa = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $siswa->nisn ?></td>
                    <td><?= $siswa->nama ?></td>
                    <td><?= $siswa->jk ?></td>
                    <td><?= $siswa->no_telp ?></td>
                    <td><?= $siswa->tingkatan_kelas.' '. $siswa->nama_jurusan.' '. $siswa->sub_kelas?></td>
                    <td>
                        <a href="aksi.php?aksi=hapus&&nisn=<?=$siswa->nisn?>"><button class="btn-del"
                                name="act">Delete</button></a>
                        <a href="ubah.php?nisn=<?=$siswa->nisn?>"><button class="btn-edit">Edit</button></a>
                        <a href="detail.php?nisn=<?=$siswa->nisn?>"><button class="btn-info">Detail</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>