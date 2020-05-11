<?PHP require_once '../koneksi.php'; 
    $sql = "SELECT * FROM kategori";
    $kategori = mysqli_query($konek,$sql);
    $kategori2 = mysqli_query($konek,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buku2</title>
</head>

<body>
    <center>
        <h1>CRUD Buku</h1>
        <form action="aksi_tambah.php" method="POST">
            <label for="nama">Nama</label>

            <input type="text" name="nama[]"><br><br>

            <label for="kategori">Kategori</label>

            <select name="kategori[]" id="">
                <option value="">--- PILIH KATEGORI ---</option>
                <?php while($data=mysqli_fetch_array($kategori)) : ?>
                <option value="<?=$data['id']?>"><?=$data['nama']?></option>
                <?php endwhile ?>
            </select><br><br>

            <label for="nama">Nama</label>

            <input type="text" name="nama[]"><br><br>

            <label for="kategori">Kategori</label>

            <select name="kategori[]">
                <option value="">--- PILIH KATEGORI ---</option>
                <?php while($data=mysqli_fetch_array($kategori2)) : ?>
                <option value="<?=$data['id']?>"><?=$data['nama']?></option>
                <?php endwhile ?>
            </select><br><br><br>

            <button type="submit" name="ok" value="proses">Proses</button><br>
        </form>
    </center>
</body>

</html>