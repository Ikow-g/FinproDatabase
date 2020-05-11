<?php 

include '../layout/header.php';

include '../layout/sidebar.php';

$sql = 'SELECT * from mapel';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$mapel = $stmt->fetchAll();

?>

<div class="main_content">
  <div class="header">
    Tambah Guru
  </div>
  <div class="info">
    <div class="container">
      <div class="row">
        <div class="col-25">
          <a href="index.php"><button class="btn-back">Back</button></a>
        </div>
      </div>
      <form action="controller.php" method="POST">
        <div class="row">
          <div class="col-25">
            <label for="fname">Nama</label>
          </div>
          <div class="col-75">
            <input type="text" id="nama" name="nama" placeholder="Your name..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="fname">Umur</label>
          </div>
          <div class="col-75">
            <input type="text" name="umur" placeholder="Your age.."
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Username</label>
          </div>
          <div class="col-75">
            <input type="text" name="username" placeholder="Your username..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Password</label>
          </div>
          <div class="col-75">
            <input type="password" id="pass" name="pass" placeholder="Your password..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Konfirmasi Password</label>
          </div>
          <div class="col-75">
            <input type="password" id="Cpass" name="Cpass" placeholder="Confirm Your password..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="subject">Alamat</label>
          </div>
          <div class="col-75">
            <textarea name="alamat" placeholder="Your address.." style="height:200px"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label>Pilih Mapel Anda</label>
          </div>
          <div class="col-75" style="margin-top:19px;">
            <ul class="checkbox-grid">
              <?php foreach($mapel as $dt): ?>
              <li>
                <label class="container-checkbox"><?= $dt->nama ?>
                  <input type="checkbox" name="mapel[]" value="<?= $dt->id ?>">
                  <span class="checkmark"></span>
                </label>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="row">
          <input type="submit" name="act" value="Tambah">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../layout/footer.php' ?>