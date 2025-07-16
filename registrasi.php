<?php
    require 'function.php';

    if (isset($_POST["tbl_register"])) {
        if (registrasi($_POST) > 0) {
            echo "<script>
                alert('User berhasil ditambahkan');
            </script>";
            header("Location: login.php");
            exit;
        } else {
            echo "<script>
            alert('Gagal Daftar'); </script>";
            echo mysqli_error($con);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="logo">
        <p>Logo</p>
    </div>
    <h1 class="judul">Daftar</h1>
    <div class="position-form">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="label-form">Nama Pengguna</label>
            <input type="text" name="username" id="user" class="form-custom" required>
        </div>
        <div class="form-group">
            <label for="pw" class="label-form">Kata Sandi</label>
            <input type="password" name="password" class="form-custom" id="pw" required>
        </div>
        <div class="form-group">
            <label for="pw2" class="label-form">Ulangi Kata Sandi</label>
            <input type="password" name="password2" class="form-custom" id="pw2" required>
        </div>
        <div class="button-position">
            <button type="submit" name="tbl_register" class="regist-button">Daftar Akun</button>
        </div>
        </form>
    </div>
    <p class="link-page">Sudah mempunyai akun?<a href="Login.php" class="">Masuk</a></p>
</body>
</html>