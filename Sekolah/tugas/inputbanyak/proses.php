 <?php
// Include / load file koneksi.php
include "koneksi.php";

// Ambil data yang dikirim dari form
$nis = $_POST['nis']; // Ambil data nis dan masukkan ke variabel nis
$nama = $_POST['nama']; // Ambil data nama dan masukkan ke variabel nama
$telp = $_POST['telp']; // Ambil data telp dan masukkan ke variabel telp
$alamat = $_POST['alamat']; // Ambil data alamat dan masukkan ke variabel alamat

// Proses simpan ke Database
$query = "INSERT INTO siswa VALUES";

$index = 0; // Set index array awal dengan 0
foreach($nis as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
	$query .= "('".$datanis."','".$nama[$index]."','".$telp[$index]."','".$alamat[$index]."'),";
	$index++;
}

// Kita hilangkan tanda koma di akhir query
// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
$query = substr($query, 0, strlen($query) - 1).";";

// Eksekusi $query
mysqli_query($connect, $query);

// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
echo "<script>alert('Data berhasil disimpan');window.location = 'index.php';</script>";
?>

