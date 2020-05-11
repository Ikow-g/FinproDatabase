<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';


    if($_SESSION["user"]['level'] != 'admin')
        {
        header("location:javascript://history.go(-1)");
        }

    $sql = "SELECT tahun_ajaran,id_spp FROM spp ORDER BY tahun_ajaran DESC";
    $data_tahun = mysqli_query($con,$sql);

    if(!isset($req->s) || $req->s == NULL){
        $sql = "SELECT * FROM spp ORDER BY tahun_ajaran DESC";
        $data = mysqli_query($con,$sql);
        mysqli_close($con);
    }else{
        $sql = "SELECT * FROM spp WHERE id_spp = ?";
        $stmt = mysqli_stmt_init($con);

        if(mysqli_stmt_prepare($stmt, $sql))
        {

            $search = "$req->s";

            mysqli_stmt_bind_param($stmt, "i", $search);

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
        <a>Data SPP</a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <div class="info">
        <form action="index.php" style="display: inline;">
            <label for="s">Tahun Ajaran :</label>
            <select name="s" style="width:20%;">
                <option value="">Semua</option>
                <?php while($tahun_ajaran = mysqli_fetch_object($data_tahun)):?>
                <option value="<?=$tahun_ajaran->id_spp?>"
                    <?=isset($req->s) ? $tahun_ajaran->id_spp == $req->s ? 'selected' : '' :''?>>
                    <?=$tahun_ajaran->tahun_ajaran?></option>
                <?php endwhile;?>
            </select>
            <button class="btn-info">Cari</button>
        </form>
        <a href="tambah.php"><button class="btn-tambah">Tambah</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nominal</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($spp = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= number_format($spp->nominal) ?></td>
                    <td><?= $spp->tahun_ajaran  ?></td>
                    <td><?= $spp->status == 1 ? '<a style="color:green">Aktif</a>' : '<a style="color:red;">Tidak Aktif</a>' ?>
                    </td>
                    <td>
                        <a href="aksi.php?aksi=hapus&&id_spp=<?=$spp->id_spp?>&&status=<?=$spp->status?>"><button
                                class="btn-del" name="act">Delete</button></a>
                        <a href="aksi.php?id_spp=<?=$spp->id_spp?>&&aksi=status&&status=<?=$spp->status?>"><button
                                class="btn-info">Ubah
                                Status</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>