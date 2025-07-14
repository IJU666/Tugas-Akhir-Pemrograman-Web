<?php 
    require 'function.php';
    session_start();

    // if (isset($_COOKIE['login'])) {
    //     if ($_COOKIE['login'] == 'true') {
    //         $_SESSION['login'] == true;
    //     }
    // }

    if (isset($_COOKIE['id']) && isset($_COOKIE['us'])) {
        $id = $_COOKIE['id'];
        $username = $_COOKIE['us'];
        $result = mysqli_query($con, "SELECT * FROM registrasi WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);

        if ($username === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }
    }

    if (isset($_SESSION["login"])) {
        header("Location: index1.php");
        exit;
    }

    if (isset($_POST["login"])) {
       $username = $_POST["username"];
       $password2 = $_POST["password"];

       $result = mysqli_query($con, "SELECT * FROM registrasi WHERE username = '$username'");

       if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password2, $row["password"])) {
            $_SESSION["login"] = true;
            if (isset($_POST['remember'])) {
                // setcookie('login','true',time()+60);
                setcookie('id',$row['id'],time()+60);
                setcookie('us', hash('sha256', $row['username']), time()+60);
            }
            echo "<script>
            alert('Login berhasil'); </script>";
            header("Location: index1.php");
            exit;
        }
       }
       $error = true;
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
    <h1>Halaman Login</h1>
    <a href="registrasi.php">Daftar Akun</a>
    <form action="" method="post">
    <ul>
        <li>
            <label for="user">Username </label>
            <input type="text" name="username" id="user">
        </li>
        <li>
            <label for="pw">password</label>
            <input type="password" name="password" id="pw">
        </li>
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
    </form>
</body>
</html>