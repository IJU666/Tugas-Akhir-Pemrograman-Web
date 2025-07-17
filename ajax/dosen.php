<?php
require '../function.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM dosen WHERE nama LIKE '%$keyword%' OR prodi LIKE '%$keyword%' OR nidn LIKE '%$keyword%'"; 
$dsn =  query($query);
?>

 <table border="1" cellpadding="10" cellspacing="0" >
      <tr>
        <th class="table-heading">No.</th>
        <th class="table-heading">Foto</th>
        <th class="table-heading">Nama</th>
        <th class="table-heading">NIDN</th>
        <th class="table-heading">Email</th>
        <th class="table-heading">Prodi</th>
        <th class="table-heading">Aksi</th>
      </tr>
          <?php foreach ($dsn as $row) : ?>
        <tr>
          <td><?=$row["id"];?></td>
          <td><img src="img/<?= $row["foto"]; ?>" width="50"></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["NIDN"]; ?></td>
          <td><?= $row["email"]; ?></td>
          <td><?= $row["prodi"]; ?></td>
          <td>
            <div style="display: flex; gap: 5px; justify-content: center; align-items: center;">
              <a href="ubah.php?id= <?= $row['id'];?>" class="ubah">ubah</a> |
              <a href="delete.php?id= <?= $row['id'];?>" onclick="return confirm('yakin menghapus data?')" class="hapus">hapus</a>
              </div>
            </td>
        </tr>
      <?php endforeach; ?>
    </table>