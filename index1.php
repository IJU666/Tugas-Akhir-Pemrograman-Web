<?php
// include"koneksi.php";
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
$totalDataPerPage = 3;
// $result = query("SELECT * FROM dosen ORDER BY id ASC LIMIT 0,3");
// $result = query("SELECT * FROM dosen ORDER BY id ASC LIMIT 0,$totalDataPerPage");
$totalDataTabel = count(query("SELECT * FROM dosen "));
$totalPage = ceil($totalDataTabel/$totalDataPerPage);
// $activePage = $_GET['page'];
$activePage = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
$awalData = ($totalDataPerPage * $activePage) - $totalDataPerPage;
// var_dump($totalPage);
// var_dump($activePage);
// $result = query("SELECT * FROM dosen ORDER BY id ASC LIMIT 0,$totalDataPerPage");
$result = query("SELECT * FROM dosen LIMIT $awalData,$totalDataPerPage");

if (isset($_POST["cari"])) {
    $result = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

    <div style="margin: auto;">
      <a href="logout.php">Logout</a>
  <h1 style="text-align:center;">Daftar Dosen</h1>
  <form action="" method="post">
    <input type="text" name="keyword" id="" size="50" placeholder="Masukan Kata Kunci" autocomplete="off">
    <button type="submit" name="cari">Cari</button>
  </form>
  <a href="tambah.php" style="text-align:right;">Tambah data dosen</a>
  <br>
  <!-- <?php for ($i=1; $i <= $totalPage; $i++) : ?>
      <a href="index1.php?page=<?= $i; ?>"><?= $i; ?></a>
    <?php endfor; ?> -->
  <?php if ($activePage > 1) : ?>
      <a href="?page= <?= $activePage - 1; ?>">&laquo </a>
    <?php endif ?>
    
    <?php for ($i=1; $i <= $totalPage; $i++) : ?>
      <?php if ($i == $activePage) : ?>
        <a href="index1.php?page=<?= $i; ?>" style="font-weight: bold; color: blue;"><?= $i; ?></a>
      <?php else :?>
      <a href="index1.php?page=<?= $i; ?>"><?= $i; ?></a>
      <?php endif;?>
    <?php endfor; ?>

  
    
    <?php if ($activePage < $totalPage) : ?>
      <a href="?page= <?= $activePage + 1; ?>">&raquo </a>
    <?php endif ?>
  <table border="1" cellpadding="10" cellspacing="0" >
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>NIDN</th>
      <th>Email</th>
      <th>Prodi</th>
    </tr>
        <?php foreach ($result as $row) : ?>
      <tr>
        <td><?=$row["id"];?></td>
          <td>
              <a href="ubah.php?id= <?= $row['id'];?>">ubah</a> |
              <a href="delete.php?id= <?= $row['id'];?>" onclick="return confirm('yakin menghapus data?')">hapus</a>
            </td>
        <td><img src="img/<?= $row["foto"]; ?>" width="50"></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["NIDN"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["prodi"]; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>
  </div>

</body>
</html>