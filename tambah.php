<?php
    require"function.php";
    
    if (isset($_POST["submit"])) {
        var_dump($_POST);
        var_dump($_FILES);


        if (tambah($_POST) > 0) {
            echo "<script>
                alert('data berhasil di input');
                document.location.href = 'index1.php';
            </script>";
        } else {
            echo "<script>
            alert('data gagal di input');
            document.location.href = 'index1.php';
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
            <h3>Tambah Data Dosen</h3>
            <p>Tambah Data NIDN,dll</p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container-form">
                <div class="box-form">
                    <input type="text" name="id" id="" value="<?= $dsn['id'];?>" hidden>
                    
                    
                    <label for="nidn"><b>NIDN</b></label><br>
                    <input type="text" name="NIDN" id="NIDN" required ><br><br>
                    
                    <label for="nama"><b>Nama</b></label><br>
                    <input type="text" name="nama" id="nama" required ><br><br>
                    
                    <label for="email"><b>Email</b></label><br>
                    <input type="text" name="email" id="email" required ><br><br>
            
                    <label for="prodi"><b>Prodi</b></label><br>
                    <input type="text" name="prodi" id="prodi" required ><br><br>
                    
                    <div class="btn-segment">
                        <button type="submit" name="submit" class="btn-submit">Tambah Data</button>
                        <a href="index1.php" class="btn-cancel">Batal</a>
                    </div>
    
                </div>
    
    
                <div class="box-img">
                    <img src="img/<?= $dsn['foto']; ?>" class="img-thumbnail">
                    <label class="btn-submit ">
                    Tambah Foto
                    <input type="file" name="foto" hidden>
                </div>
            </div>
        </form>
    </div>
</body>
</html>