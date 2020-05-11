    <?php

        include '../connection.php';

        // ambil id level
        $id_jenis = $_GET['id'];

        // ambil data dari database
        $jenis = mysqli_query($conn, "SELECT * FROM jenis WHERE id_jenis = '$id_jenis'");

        $data = mysqli_fetch_array($jenis);

        if ($_POST) {
            $nama_jenis = $_POST['nama_jenis'];
            $kode_jenis = $_POST['kode_jenis'];
            $keterangan = $_POST['keterangan'];
        

        $simpan = mysqli_query($conn, "UPDATE jenis SET nama_jenis = '$nama_jenis', kode_jenis = '$kode_jenis', keterangan = '$keterangan' WHERE 
        id_jenis = '$id_jenis '");
            

        if($simpan) {
            $_SESSION['status'] = 'Jenis berhasil di update !';

            header('location: lihat.php');
        }
            else{
                echo 'Jenis gagal diupdate !';
                echo mysqli_error($conn);
            }
        }

    ?>

    <?php include '../admin/layout/header.php' ?>

        <main>
            <h1>tambah hak akses</h1>
            <form method = "post" action="">
                <div class="input-wrapper">
                <label> Nama Jenis </label>
                <input type="text" value="<?php echo $data['nama_jenis']?>" name="nama jenis" required>
                </div>

                <div class="input-wrapper">
                <label> Kode Jenis </label>
                <input type="text" value="<?php echo $data['kode_jenis']?>" name="kode jenis" required>
                </div>

                <div class="input-wrapper">
                <label> Keterangan </label>
                <textarea name="keterangan" required><?php echo $data['keterangan']?></textarea>
                </div>

                <button type="submit">Simpan</button>
            </form>
    </main>
     <?php include '../admin/layout/footer.php' ?>