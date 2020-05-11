<?php include('../layout/header.php')?>
<?php
  $sql = 'SELECT * FROM tb_peminjaman JOIN tb_anggota on tb_peminjaman.id_anggota = tb_anggota.id_anggota JOIN tb_petugas on tb_peminjaman.id_petugas = tb_petugas.id_petugas';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $peminjaman = $stmt->fetchAll();
?>

<?php include('../layout/sidebar.php')?>
<section>
  <a href='add.php'><button class="button-add">Tambah</button></a>
  <h1 class="title">Peminjaman</h1>
  <table class="content-table">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>Nama Anggota</th>
        <th>Tangggal Pinjam</th>
        <th>Batas Kembali</th>
        <th>Petugas</th>
        <th style="width:18%;">Status</th>
        <th style="width:17%;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ; foreach($peminjaman as $dt): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $dt->nama_anggota ?></td>
        <td><?= $dt->tanggal_peminjaman ?></td>
        <td><?= date('Y-m-d', strtotime($dt->tanggal_peminjaman . ' + 7 days')); ?></td>
        <td><?= $dt->nama_petugas ?></td>
        <?php 
      switch ($dt->status) {
        case 'tuntas':
          echo "<td style='color:#28A745; font-weight:bold;'>$dt->status</td>";
          break;
        
        default:
          echo "<td style='color:#DC3545' font-weight:bold;'>$dt->status</td>";
          break;
      }
      ?>
        <td>
          <a href="delete.php?id_peminjaman=<?= $dt->id_peminjaman ?>"><button>delete</button></a>
          <button>Update</button>
          <a href="detail.php?id_peminjaman=<?= $dt->id_peminjaman ?>"><button>Detail</button></a>
        </td>
      </tr>
      <?php endforeach?>
      <tr class="active-row">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Peminjaman :</td>
        <td><?= $stmt->rowCount(); ?></td>
      </tr>
    </tbody>
  </table>
</section>
<?php include('../layout/footer.php')?>