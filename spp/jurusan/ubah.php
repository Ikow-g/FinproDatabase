<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

    if($_SESSION["user"]['level'] != 'admin')
    {
    header("location:javascript://history.go(-1)");
    }

    $sql = "SELECT * FROM jurusan WHERE id_jurusan = ?";
    $stmt = mysqli_stmt_init($con);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
    mysqli_stmt_bind_param($stmt, "i", $req->id_jurusan);

    mysqli_stmt_execute($stmt);
    
    $data = mysqli_stmt_get_result($stmt);

    $jurusan = mysqli_fetch_object($data);

    }else{
        echo 'Error: '. mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

?>

<div class="main_content">
    <div class="header">
        Ubah Jurusan
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn-back">Back</button></a>
            </div>
            <form action="aksi.php" method="POST">
                <input type="hidden" name="id_jurusan" value="<?=$jurusan->id_jurusan?>">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Nama Jurusan</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="nama_jurusan" value="<?=$jurusan->nama_jurusan?>"
                            placeholder="Nama Jurusan">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="aksi" value="ubah">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>