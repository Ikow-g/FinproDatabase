<?php 
    include '../layout/header.php';
    include '../layout/sidebar.php';
    if($_SESSION['user']['level'] == 'siswa'){
    if($req->nisn != $_SESSION['user']['id']){
        header("location:javascript://history.go(-1)");
    }
}

    $sql = "SELECT nama FROM siswa where nisn = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $req->nisn);

        mysqli_stmt_execute($stmt);

        $data_nama = mysqli_stmt_get_result($stmt);
        $nama = mysqli_fetch_object($data_nama);

        mysqli_stmt_close($stmt);
    }else{
        echo 'Error: '. mysqli_error($con);
        exit;
        }
    if(isset($req->tahun) && isset($req->bulan) && $req->bulan != NULL && $req->tahun != NULL){
        $sql = "SELECT pembayaran.*,siswa.nama,petugas.nama_petugas FROM pembayaran JOIN siswa ON
        pembayaran.nisn =
        siswa.nisn LEFT JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas WHERE pembayaran.nisn = ? AND
        pembayaran.bulan = ? AND pembayaran.tahun = ?";
        $stmt = mysqli_stmt_init($con);

        if(mysqli_stmt_prepare($stmt, $sql))
        {
        mysqli_stmt_bind_param($stmt, "ssi", $req->nisn,$req->bulan,$req->tahun);

        mysqli_stmt_execute($stmt);

        $data = mysqli_stmt_get_result($stmt);

        }else{
        echo 'Error: '. mysqli_error($con);
        }
    }elseif(isset($req->tahun) && $req->tahun != NULL){
        $sql = "SELECT pembayaran.*,siswa.nama,petugas.nama_petugas FROM pembayaran JOIN siswa ON
        pembayaran.nisn =
        siswa.nisn LEFT JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas WHERE pembayaran.nisn = ? AND pembayaran.tahun = ?";
        $stmt = mysqli_stmt_init($con);

        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "si", $req->nisn,$req->tahun);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);

        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }elseif(isset($req->bulan) && $req->bulan != NULL){
        $sql = "SELECT pembayaran.*,siswa.nama,petugas.nama_petugas FROM pembayaran JOIN siswa ON
        pembayaran.nisn =
        siswa.nisn LEFT JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas WHERE pembayaran.nisn = ? AND
        pembayaran.bulan = ?";
        $stmt = mysqli_stmt_init($con);

        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ss", $req->nisn,$req->bulan);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);
        }else{
            echo 'Error: '. mysqli_error($con);
        }
    }else if(!isset($req->bulan) || $req->bulan == NULL|| $req->tahun == NULL || !isset($req->bulan)){
        $sql = "SELECT pembayaran.*,siswa.nama,petugas.nama_petugas FROM pembayaran JOIN siswa ON pembayaran.nisn =
        siswa.nisn LEFT JOIN petugas ON petugas.id_petugas = pembayaran.id_petugas WHERE pembayaran.nisn = ?";
        $stmt = mysqli_stmt_init($con);

        if(mysqli_stmt_prepare($stmt, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $req->nisn);
            mysqli_stmt_execute($stmt);
            $data = mysqli_stmt_get_result($stmt);

            $sb = date('m');
            $st = date('Y');
        }else{
            echo 'Error: '. mysqli_error($con);
            exit;
        }
    }else{
        var_dump('lewat');
        exit;
    }
    $c_bulan = mysqli_fetch_object(mysqli_query($con,"SELECT bulan AS max_bulan,status FROM pembayaran WHERE nisn = '$req->nisn' ORDER BY id_pembayaran DESC"));
    mysqli_stmt_close($stmt);
    mysqli_close($con);
if($_SESSION['user']['level'] == 'siswa'){
?>
<style>
    .siswa {
        display: none;
    }
</style>
<?php }?>
<div class="main_content">
    <div class="header">
        <a>Pembayaran <?= $nama->nama ?></a>
        <a id="date">Tanggal : <?= date('d-m-Y') ?></a>
    </div>
    <a href="index.php" class="siswa"><button class="btn-back">Back</button></a>
    <div class="info">
        <form action="pembayaran.php" style="display: inline;">
            <input type="hidden" name="nisn" value="<?=$req->nisn?>">
            <label>Cari Tagihan:</label>
            <select name="bulan" style="width:20%;text-align-last:center;">
                <option value="">--- Pilih Bulan ---</option>
                <?php 
                for ($jan = 1; $jan <= 12; $jan++): 
                $dummy=strtotime("$jan/01/0000"); 
                $month=date('F',$dummy); 
                ?>
                <option value='<?=$jan?>'><?=$month?></option>
                <?php   endfor;
                ?>
            </select>
            <select name="tahun" style="width:20%;text-align-last:center;">
                <option value="">--- Pilih Tahun ---</option>
                <?php 
                    $year = date('Y');
                    $min_year = date('Y', strtotime('-20 year'));
                    for ($year; $year >= $min_year; $year--) { ?>
                <option value='<?=$year?>'><?=$year?></option> <?php } ?>
            </select>
            <button class="btn-info">Cari</button>
        </form>
        <a href="print.php?nisn=<?=$req->nisn?>" class="siswa"><button class="btn-tambah">Print Nota</button></a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan Tahun Tagihan</th>
                    <th>Jumlah Bayar</th>
                    <th>Status</th>
                    <th>Petugas</th>
                    <th class="siswa">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($pembayaran = mysqli_fetch_object($data)):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pembayaran->tanggal_bayar ? $pembayaran->tanggal_bayar : '-' ?></td>
                    <td><?= date('F', strtotime("$pembayaran->bulan/01/0000")).' '.$pembayaran->tahun ?>
                    </td>
                    <td><?= number_format($pembayaran->jumlah_bayar) ?></td>
                    <td><?= $pembayaran->status == 1 ? '<a style="color:green">Lunas</a>' : '<a style="color:red;">Belum Lunas</a>' ?>
                    </td>
                    <td><?= $pembayaran->nama_petugas ? $pembayaran->nama_petugas : '-' ?></td>
                    <td class="siswa">
                        <?php if($pembayaran->status == 0){ ?>
                        <a href="aksi.php?aksi=bayar&&id_pembayaran=<?=$pembayaran->id_pembayaran?>"><button
                                class="btn-info">Bayar</button></a>
                        <?php }else if($pembayaran->bulan == 12 && $c_bulan->status !=0){?>
                        <a href="aksi.php?id_pembayaran=<?=$pembayaran->id_pembayaran?>&&aksi=batal">
                            <button class="btn-edit">Batal</button></a>
                        <?php }else if($pembayaran->bulan == $c_bulan->max_bulan-1 && $c_bulan->status == 0){ ?>
                        <a href="aksi.php?id_pembayaran=<?=$pembayaran->id_pembayaran?>&&aksi=batal"><button
                                class="btn-edit">Batal</button></a>
                        <?php }else{ ?>-
                        <?php } ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php' ?>