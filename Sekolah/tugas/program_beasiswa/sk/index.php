<?php 
    require_once '../layout/header.php' ;

    if(isset($_SESSION['user']))
    {
            header("location:javascript://history.go(-1)");
    }

    $sql = "SELECT * FROM sk";
    $query = mysqli_query($conn,$sql);
?>

<h1 style="display:inline-block">Daftar Syarat Ketentuan</h1>
<a type="button" class="btn btn-tmb" onclick="show()">Tambah</a>
<br><br>
<table id="main">
    <tr>
        <th style="width:5%">No</th>
        <th>SK</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
    <?php while($data = mysqli_fetch_object($query)) : ?>
    <tr>
        <td style="text-align: center;"><?= $no++ ?></td>
        <td><?= $data->sk ?></td>
        <td><?= $data->deskripsi ?></td>
        <td style="text-align: center;">
            <a href="controller.php?id_sk=<?=$data->id_sk?>" type="button" class="btn btn-hps">Hapus</a>
            <a type="button" class="btn btn-edt" data-id="<?=$data->id_sk?>" data-sk="<?=$data->sk?>"
                data-deskripsi="<?=$data->deskripsi?>" onclick="edit(this)">Edit
            </a>
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
                <input type="hidden" id="id" name="id">
                <label for="nama">Syarat Ketentuan</label>
                <input type="text" id="sk" name="sk" placeholder="Syarat Ketentuan" required>
                <label for="sk">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Deskripsi"
                    required></textarea>
            </div>
            <div class="overlay-footer">
                <button class="btn btn-overlay" name="tmb" id="tmb">Tambah</button>
                <button class="btn btn-overlay" name="edt" id="edt">Edit</button>
            </div>
        </form>
    </div>

</div>

<script src="sk.js"></script>
<?php require_once '../layout/footer.php' ?>