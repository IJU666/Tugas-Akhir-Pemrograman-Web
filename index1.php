<?php
// include"koneksi.php";
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
$totalDataPerPage = 5;
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


      
  <h1 style="text-align:center;">Daftar Dosen</h1>
  <div class="table-position">
    
  <form action="" method="post">
  <div class="search-position">
    <div class="form-position">
      <div class="form-search">
      <input type="text" name="keyword" id="" size="50" placeholder="Masukan Kata Kunci" class="form-custom" autocomplete="off">
      <button type="submit" name="cari" class="regist-button">Cari</button>
      </div>
      <a href="tambah.php" class="regist-button">Tambah data dosen</a>
  </div>
  </form>
  <table border="1" cellpadding="10" cellspacing="0" >
    <tr>
      <th>No.</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>NIDN</th>
      <th>Email</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr>
        <?php foreach ($result as $row) : ?>
      <tr>
        <td><?=$row["id"];?></td>
        <td><img src="img/<?= $row["foto"]; ?>" width="50"></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["NIDN"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["prodi"]; ?></td>
        <td>
          <div style="display: flex; gap: 5px;">
            <a href="ubah.php?id= <?= $row['id'];?>" class="ubah">ubah</a> |
            <a href="delete.php?id= <?= $row['id'];?>" onclick="return confirm('yakin menghapus data?')" class="hapus">hapus</a>
            </div>
          </td>
      </tr>
    <?php endforeach; ?>

  </table>
  <div class="pagination">
     <ul class="custom-pagination">
    <li>
      <?php if ($activePage > 1) : ?>
      <a href="?page= <?= $activePage - 1; ?>" aria-label="Previous">&laquo; </a>
      <?php endif ?>
    </li>
    <li>
        <?php for ($i=1; $i <= $totalPage; $i++) : ?>
        <?php if ($i == $activePage) : ?>
          <a href="index1.php?page=<?= $i; ?>" style="background-color: #368098; color: white; pointer-events: none;"><?= $i; ?></a>
          <?php else :?>
            <a href="index1.php?page=<?= $i; ?>"><?= $i; ?></a>
            <?php endif;?>
            <?php endfor; ?>
    </li>
    <li>
      <?php if ($activePage < $totalPage) : ?>
              <a href="?page= <?= $activePage + 1; ?>"aria-label="Next">&raquo;</a>
              <?php endif ?>
    </li>
  </ul>  
  </div>
              <div class="logout-position">
              <a class="button-logout" href="logout.php">Logout</a>
              </div>
            </div>
</body>
</html>