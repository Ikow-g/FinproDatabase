<?php include('../layout/header.php')?>
<?php include('../layout/sidebar.php')?>
<section>
  <h1 class="title">Tambah Petugas</h1>
  <div class='div-form'>
  <form action="Controller.php" method="POST">
    <label for="name">Nama Petugas</label>
        <input type="text" name="nama" placeholder="Nama Petugas" required>
    <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required>
    <label for="password">Password</label>
        <input type="password" id="pass1" name="password" placeholder="Password" required>
    <label for="password">Konfirmasi Password</label>
        <input type="password" id="pass2" placeholder="Konfirmasi Password" required>
    <label for="username">Nomor Telpon</label>
        <input type="text" name="no_telp" placeholder="Nomor telpon" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
    <label for="Alamat">Alamat</label><br>
        <textarea name="alamat" rows="5" placeholder="Alamat"></textarea><br>
      <input type="submit" id="submit" value="Tambah">
    </form>
  </div>
</section>
<script type="text/javascript">
window.addEventListener("load", function () {
    document.getElementById("submit").addEventListener("click", function () {
        var pass = document.getElementById('pass1').value;
        var pass2 = document.getElementById('pass2').value;
        if(pass != pass2)
        {
            event.preventDefault();
            alert('password belum sama');
        }
    });
});
</script>

<?php include('../layout/footer.php')?>
