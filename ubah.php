<?php
    require"function.php";
    $id = $_GET["id"];
    $dsn = query("SELECT * FROM dosen WHERE id = $id" )[0];
    // if (isset($_POST["submit"])) {
    //     $nama = $_POST["nama"];
    //     $nidn = $_POST["nidn"];
    //     $email = $_POST["email"];
    //     $prodi = $_POST["prodi"];
    //     $foto = $_POST["foto"];

    //     $query = "INSERT INTO dosen (nama,nidn,email,prodi,foto) VALUES ('$nama', '$nidn', '$email', '$prodi', '$foto')";
    //     mysqli_query($con, $query);

    //     if (mysqli_affected_rows($con)) {
    //         echo "Berhasil Input";
    //     } else {
    //         echo "Gagal Input"; 
    //     }
    // }

    if (isset($_POST["submit"])) {
        if (ubah($_POST) > 0) {
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
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center;">Tambah Data Dosen</h1>
    <form action="" method="post">
        <ul>
            <li>
                <input type="text" name="id" id="" value="<?= $dsn['id'];?>" hidden>
            </li>
            <li>
                <label for="nidn">NIDN : </label>
                <input type="number" name="nidn" id="nidn" required value="<?= $dsn['NIDN'];?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $dsn['nama'];?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $dsn['email'];?>">
            </li>
            <li>
                <label for="prodi">Prodi : </label>
                <input type="text" name="prodi" id="prodi" required value="<?= $dsn['prodi'];?>">
            </li>
            <li>
                <label for="foto">Foto : </label>
                <input type="text" name="foto" id="foto" required value="<?= $dsn['foto'];?>">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>