<html>
<head>
	<title>Multiple Insert</title>
	<script src="jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<h1>Multiple Insert</h1>
	
	<form method="post" action="proses.php">
		<!-- Buat tombol untuk menabah form data -->
		<button type="button" id="btn-tambah-form">Tambah Data Form</button>
		<button type="button" id="btn-reset-form">Reset Form</button><br><br>
		
		<b>Data ke 1 :</b>
		<table>
			<tr>
				<td>NIS</td>
				<td><input type="text" name="nis[]" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama[]" required></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telp[]" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name="alamat[]" required></textarea></td>
			</tr>
		</table>
		<br><br>

		<div id="insert-form"></div>
		
		<hr>
		<input type="submit" value="Simpan">
	</form>
	
	<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
				"<table>" +
				"<tr>" +
				"<td>NIS</td>" +
				"<td><input type='text' name='nis[]' required></td>" +
				"</tr>" +
				"<tr>" +
				"<td>Nama</td>" +
				"<td><input type='text' name='nama[]' required></td>" +
				"</tr>" +
				"<tr>" +
				"<td>Telepon</td>" +
				"<td><input type='text' name='telp[]' required></td>" +
				"</tr>" +
				"<tr>" +
				"<td>Alamat</td>" +
				"<td><textarea name='alamat[]' required></textarea></td>" +
				"</tr>" +
				"</table>" +
				"<br><br>");
			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
		
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>
</body>
</html>
