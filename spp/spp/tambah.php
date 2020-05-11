<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

$year = date('Y');
$min_year = $year-20; 
$plus_year = $year + 10;

?>

<div class="main_content">
    <div class="header">
        Tambah SPP
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Tahun Ajaran</label>
                    </div>
                    <div class="col-75">
                        <select name="dari" style="width:30%;" required>
                            <option value="">Dari</option>
                            <?php for($plus_year; $plus_year > $min_year; $plus_year-- ): ?>
                            <option value="<?=$plus_year?>" <?= $year==$plus_year ? 'selected':''?>><?=$plus_year?>
                            </option>
                            <?php endfor; ?>
                        </select>
                        <input type="text" name="nama_jurusan" value='-' style="text-align:center;width:5%;" readonly>
                        <select name="sampai" style="width:30%;" required>
                            <option value="">Sampai</option>
                            <?php for($plus_year =  $year + 10 ; $plus_year > $min_year; $plus_year-- ): ?>
                            <option value="<?=$plus_year?>"><?=$plus_year?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class=" row">
                    <div class="col-25">
                        <label for="fname">Nominal</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nominal" placeholder="Nominal" style="width:66%;" required
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="aksi" value="tambah">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>