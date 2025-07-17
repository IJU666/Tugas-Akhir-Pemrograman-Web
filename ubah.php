<?php
    require"function.php";
    
    session_start();
    if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }

    $id = $_GET["id"];
    $dsn = query("SELECT * FROM dosen WHERE id = $id" )[0];



if (isset($_POST["submit"])) {
    if (ubah($_POST)) {
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href='index1.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah');
        document.location.href='index1.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <h2>LOGO</h2>
    </div>
    <div class="container">
        <div class="form-section">
            <h3>Ubah Data Dosen</h3>
            <p>Ubah Data NIDN,dll</p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container-form">
                <div class="box-form">
                    <input type="text" name="id" id="" value="<?= $dsn['id'];?>" hidden>
                    
                    
                    <label for="nidn"><b>NIDN</b></label><br>
                    <input type="text" name="NIDN" id="NIDN" required value="<?= $dsn['NIDN']; ?>"><br><br>
                    
                    <label for="nama"><b>Nama</b></label><br>
                    <input type="text" name="nama" id="nama" required value="<?= $dsn['nama'];?>"><br><br>
                    
                    <label for="email"><b>Email</b></label><br>
                    <input type="text" name="email" id="email" required value="<?= $dsn['email'];?>"><br><br>
            
                    <label for="prodi"><b>Prodi</b></label><br>
                    <input type="text" name="prodi" id="prodi" required value="<?= $dsn['prodi'];?>"><br><br>
                    
                    <div class="btn-segment">
                        <button type="submit" name="submit" class="btn-submit">Tambah Data</button>
                        <a href="index1.php" class="btn-cancel">Batal</a>
                    </div>
    
                </div>
    
    
                <div class="box-img">
                    <img src="img/<?= $dsn['foto']; ?>" class="img-thumbnail">
                    <label class="btn-submit ">
                    Ubah Foto
                    <input type="file" name="foto" hidden class="btn-submit ">
                </div>
            </div>
        </form>
    </div>
</body>
</html>