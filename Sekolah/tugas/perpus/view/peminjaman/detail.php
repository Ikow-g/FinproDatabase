<?php include('../layout/header.php')?>
<?php

  $id_peminjaman = $_GET['id_peminjaman']; 
  $sql = 'SELECT * FROM tb_detailpinjam JOIN 
    tb_buku ON tb_detailpinjam.id_buku = tb_buku.id_buku
    WHERE tb_detailpinjam.id_peminjaman = ? ';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id_peminjaman]);
  $peminjaman = $stmt->fetchAll();
  $sql2 = 'SELECT * FROM tb_peminjaman JOIN tb_anggota on tb_peminjaman.id_anggota = tb_anggota.id_anggota WHERE id_peminjaman=?';
  $stmt2 = $pdo->prepare($sql2);
  $stmt2->execute([$id_peminjaman]);
  $identitas = $stmt2->fetch();

  $ers = 0;

  $batas_pinjam = date('Y-m-d',(strtotime($identitas->tanggal_peminjaman . '+ 7 days')));
  

if(date('Y-m-d') > $batas_pinjam){
  $datetime1 = date_create(date('Y-m-d'));
  $datetime2 = date_create($batas_pinjam);
  $interval = date_diff($datetime1, $datetime2);
  $ers = $interval->format('%a');
}
?>

<?php include('../layout/sidebar.php')?>
<section>
  <h1 class="title" style="text-transform:capitalize">Peminjamanan <?= $identitas->nama_anggota ?></h1>
  <h4>Hari Ini : <?=date('Y-m-d')?></h4>
  <h4>Batas Kembali : <?= $batas_pinjam ?></h4>
  <table class="content-table">
    <thead>
      <tr>
        <th style="width:10%;">Nomor</th>
        <th>Nama Buku</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th style="width:20%;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ; foreach($peminjaman as $dt): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $dt->nama_buku ?></td>
        <td><?= $dt->tanggal_kembali ?></td>
        <?php 
        $status = $dt->status;
        if($status == 'sudah kembali'){
          echo "<td style='color:#28A745; font-weight:bold;'>$dt->status</td>";
        }else if($status == 'hilang'){
          echo "<td style='color:#DC3545; font-weight:bold;'>$dt->status</td>";
        }else if($status == 'telat' || $ers > 0){
          echo "<td style='color:#DC3545; font-weight:bold;'>Telat</td>";
        }else{
          echo "<td style='color:#FFC107; font-weight:bold;'>Belum kembali</td>";
        }
      ?>
        <td>
          <?php if(!$dt->tanggal_kembali) : ?>
          <button>Hilang</button>
          <a
            href="delete_detail.php?id_peminjaman=<?=$id_peminjaman?>&&id_detail=<?=$dt->id_detailpinjam?>"><button>Delete</button></a>
          <?= $dt->status == 'hilang' || $ers > 0 && $dt->status != 'sudah kembali'  ? '<button>Denda</button>' : '<a href="kembali.php?id_detail='.$dt->id_detailpinjam.'&&id_peminjaman='.$id_peminjaman.'"><button>Kembalikan</button></a>' ?>
          <button>Update</button>
          <?php else :  ?>
          <button>Update</button>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
<?php include('../layout/footer.php') ?>