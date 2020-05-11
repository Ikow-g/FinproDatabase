<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

        if($_SESSION["user"]['level'] != 'admin')
        {
            header("location:javascript://history.go(-1)");
        }


    if(!isset($req->s) || $req->s == NULL){
        $sql = "SELECT * FROM petugas";
        $data = mysqli_query($con,$sql);
                mysqli_close($con);
    }else{
        $sql = "SELECT * FROM petugas WHERE nama_petugas LIKE ?";
        $stmt = mysqli_stmt_init($con);

        $search = "%$req->s%";

        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $search);

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
        <a>Data Petugas</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info">
        <form action="index.php" style="display: inline;">
            <label for="s">Cari :</label>
            <input type="text" name="s" style="width: 20%;" placeholder="Nama Petugas"
                <?= isset($req->s) ? "value='$req->s'" : '' ?>>
            <button class="btn-info">Cari</button>
        </form>
        <a href="tambah.php"><button class="btn-tambah">Tambah</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Nomor Telpon</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($petugas = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $petugas->nama_petugas ?></td>
                    <td><?= $petugas->no_telp ?></td>
                    <td><?= $petugas->alamat ?></td>
                    <td><?= $petugas->level ?></td>
                    <td>
                        <a
                            href="aksi.php?aksi=hapus&id_petugas=<?=$petugas->id_petugas?>&id_user=<?=$petugas->id_user?>"><button
                                class="btn-del" name="act">Delete</button></a>
                        <a href="ubah.php?id_petugas=<?=$petugas->id_petugas?>"><button
                                class="btn-edit">Edit</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>