<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
        {
            header("location:javascript://history.go(-1)");
        }

    if(!isset($req->s) || $req->s == NULL){
        $sql = "SELECT * FROM jurusan";
        $data = mysqli_query($con,$sql);
                mysqli_close($con);
    }else{
        $sql = "SELECT * FROM jurusan WHERE nama_jurusan LIKE ?";
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
        <a>Data Jurusan</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info">
        <form action="index.php" style="display: inline;">
            <label for="s">Cari :</label>
            <input type="text" name="s" style="width: 20%;" placeholder="Nama Jurusan"
                <?= isset($req->s) ? "value='$req->s'" : '' ?>>
            <button class="btn-info">Cari</button>
        </form>
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
                <?php while($jurusan = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $jurusan->nama_jurusan ?></td>
                    <td>
                        <a href="aksi.php?aksi=hapus&&id_jurusan=<?=$jurusan->id_jurusan?>"><button class="btn-del"
                                name="act">Delete</button></a>
                        <a href="ubah.php?id_jurusan=<?=$jurusan->id_jurusan?>"><button
                                class="btn-edit">Edit</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>