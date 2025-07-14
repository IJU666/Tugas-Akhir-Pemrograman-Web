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
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <a href="Login.php">Login Akun</a>

    <form action="" method="post">
        <ul>
            <li>
                <label for="user">Nama : </label>
                <input type="text" name="username" id="user" required>
            </li>
            <li>
                <label for="pw">Password : </label>
                <input type="password" name="password" id="pw" required>
            </li>
            <li>
                <label for="pw2">Password : </label>
                <input type="password" name="password2" id="pw2" required>
            </li>
            <li>
                <button type="submit" name="tbl_register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>