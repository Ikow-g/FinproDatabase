<?php 
    require_once '../layout/header.php' ;

    if(isset($_SESSION['user']))
    {
        header("location:javascript://history.go(-1)");
    }

    if(isset($request->search)){
        $sql = "SELECT * FROM siswa WHERE nama LIKE '%$request->search%' OR email LIKE '%$request->search%'
        '%$request->search%' OR id_siswa LIKE '%$request->search%'";
    }else{
        $sql = "SELECT * FROM siswa";
    }

    if(isset($request->status)){
        $status = $request->status;
        if($status == 'lengkap'){
            $sql = "SELECT * FROM siswa WHERE id_siswa NOT IN(SELECT id_siswa FROM siswa_sk WHERE status = FALSE)";
        }else{
            $sql = "SELECT * FROM siswa WHERE id_siswa IN(SELECT id_siswa FROM siswa_sk WHERE status = FALSE)";
        }
    }
    $query = mysqli_query($conn,$sql);
?>

<h1 style="display:inline">Daftar Siswa</h1>
<a type="button" class="btn btn-tmb" onclick="show()">Tambah</a>
<a type="button" class="btn btn-prnt" onclick="window.print();">Print</a><br>
<!-- <a type="button" class="btn btn-info" style="display:block;" onclick="show()">Filter</a> -->
<form action="index.php" method="get" id="search">
    <input type="text" name="search" style="width:20%"><button class="btn btn-info"
        style="padding:8.5px 12px">Cari</button>
    <div class="dropdown">
        <button class="dropbtn" style="background-color: blue; text-transform:none; right:initial">Filter</button>
        <div class="dropdown-content">
            <a href="index.php?status=lengkap">Lengkap</a>
            <a href="index.php?status=belum_lengkap">Belum lengkap</a>
        </div>
    </div>
    <?php if(isset($request->status) || isset($request->search)): ?>
    <a href="index.php" class="btn btn-hps">Reset</a>
    <?php endif; ?>
</form>
<br>
<table id="main">
    <tr>
        <th style="width:5%">No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Status</th>
        <th class="aksi">Aksi</th>
    </tr>
    <?php while($data = mysqli_fetch_object($query)) : ?>
    <tr>
        <td style="text-align: center;"><?= $no++ ?></td>
        <td><?= $data->id_siswa ?></td>
        <td><?= $data->nama ?></td>
        <td><?= $data->email ?></td>
        <td><?= $data->no_hp ?></td>
        <?php if(mysqli_num_rows(mysqli_query($conn,"SELECT status FROM siswa_sk WHERE id_siswa='$data->id_siswa' AND status = FALSE")) > 0) :?>
        <td style="color:red">Data Belum Lengkap</td>
        <?php elseif(mysqli_num_rows(mysqli_query($conn,"SELECT id_sk FROM SK")) < 0) : ?>
        <td style="color:red">Belum ada SK</td>
        <?php else : ?>
        <td class="stat" style="color:green">Data Lengkap</td>
        <?php endif;?>
        <td style="text-align: center;" class="aksi">
            <a href="controller.php?id_user=<?=$data->id_siswa?>" type="button" class="btn btn-hps">Hapus</a>
            <a type="button" class="btn btn-edt" data-id="<?=$data->id_siswa?>" data-nama="<?=$data->nama?>"
                data-email="<?=$data->email?>" data-phone="<?=$data->no_hp?>" onclick="edit(this)">Edit
            </a>
            <a href="detail.php?id_siswa=<?=$data->id_siswa?>" type="button" class="btn btn-info">Detail</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<div id="overlay" class="overlay">
    <!-- content -->
    <div class="overlay-content">
        <div class="overlay-header">
            <span class="close">&times;</span>
            <h2 id="head"></h2>
        </div> <br>
        <form action="controller.php" method="post">
            <div class="overlay-body">
                <input type="hidden" id="old_nisn" name="old_nisn">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Emai;" required>
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" placeholder="NISN"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <label for="phone">Nomor HP</label>
                <input type="text" id="phone" name="phone" placeholder="Nomor HP"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
            </div>
            <div class="overlay-footer">
                <button class="btn btn-overlay" name="tmb" id="tmb">Tambah</button>
                <button class="btn btn-overlay" name="edt" id="edt">Edit</button>
            </div>
        </form>
    </div>

</div>

<script src="siswa.js"></script>
<script type="text/javascript">
    window.onafterprint = function () {
        console.log(10);
    };
</script>
<?php require_once '../layout/footer.php' ?>