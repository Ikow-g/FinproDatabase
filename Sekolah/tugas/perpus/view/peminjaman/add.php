<?php include('../layout/header.php')?>
<?php
  $sql = 'SELECT * FROM tb_buku';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $buku = $stmt->fetchAll();

  $sql = 'SELECT * FROM tb_anggota';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $anggotas = $stmt->fetchAll();
?>

<?php include('../layout/sidebar.php')?>
<section>
  <h1 class="title">Tambah Peminjaman</h1>
  <div class='div-form'>
  <form action="add_act.php" method="POST">
    <input name="lines" id="lines" type="hidden" value="0">
      <label for="name">Nama anggota</label>
        <select name="id_anggota">
          <?php foreach($anggotas as $anggota): ?>
            <option value="<?php echo $anggota->id_anggota ?>"><?php echo $anggota->nama_anggota ?></option>
          <?php endforeach ?>
        </select>
    <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
    <input type="text" name="tanggal_peminjaman" value="<?php echo date("Y-m-d") ?>" disabled>
      <div id="books">
        <label for="buku">Buku</label><br>
          <select name="id_buku[]" id="id_buku[0]" required>
          <option value="">--- Pilih Buku ---</option>
          <?php foreach($buku as $dt): ?>
            <option value="<?php echo $dt->id_buku ?>"><?php echo $dt->nama_buku ?></option>
          <?php endforeach ?>
          </select>
      </div><br>
      <input type="submit" id="submit" value="Tambah">
      <div id="button-add-div">
        <button id="button-add">Tambah Buku</button>
      </div>
    </form>
  </div>
</section>

<script type="text/javascript">

  window.addEventListener("load", function () {
    document.getElementById("button-add").addEventListener("click", function () {
    var num = 0;
    var myLine = document.getElementById('lines');
  //Tes Select Field Value
  for(num; num <= myLine.value; num++){
    var select_field = document.getElementById("id_buku["+ num + "]");
    if(select_field){
      if(select_field.value != ""){
        event.preventDefault();
      }
      else{
        throw new error('error');
      }
    }
  }
  
    myLine.value++;

  // Create select
    var buku = document.createElement('select');
    buku.setAttribute('name',"id_buku[" + myLine.value + "]");
    buku.setAttribute('id',"id_buku[" + myLine.value + "]");
    buku.classList.add("select-buku");
    buku.required = true;
 
  // Create Option 
      function fncCreateSelectOption(ele){
        var objSelect = ele;
        var Item = new Option("--- Pilih Buku ---", "");
        objSelect.options[objSelect.length] = Item;
        <?php foreach($buku as $dt){?>
        var Item = new Option("<?php echo $dt->nama_buku;?>", "<?php echo $dt->id_buku;?>");
        objSelect.options[objSelect.length] = Item;
        <?php } ?>
        }
    fncCreateSelectOption(buku);

      // Button delete
        var buton_del = document.createElement('input');
        buton_del.setAttribute("type", "submit");
        buton_del.setAttribute("id", myLine.value);
        buton_del.setAttribute("onclick", "delete_row("+ myLine.value +")");
        buton_del.classList.add("select-buku-del");
        buton_del.value = "Hapus";

        //new div
        var div = document.createElement('div');
        div.setAttribute("id","new_row"+myLine.value);

        // Shoot New Div
        div.appendChild(buku);
        div.appendChild(buton_del);
        
        // div target
        var target = document.getElementById("books");
        // Shoot Div Target
        target.appendChild(div);

    });

});
    function delete_row(id)
    {
      event.preventDefault();
      document.getElementById("new_row"+id).remove();
    }
</script>

<?php include('../layout/footer.php')?>
