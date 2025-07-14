<?php
    include"koneksi.php";
    require"function.php";

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
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center;">Tambah Data Dosen</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="foto"> Foto : </label>
                <input type="file" name="foto" id="foto">
            </li>
            <li>
                <label for="nidn">NIDN : </label>
                <input type="number" name="nidn" id="nidn">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="prodi">Prodi : </label>
                <input type="text" name="prodi" id="prodi">
            </li>
            <!-- <li>
                <label for="foto">Foto : </label>
                <input type="text" name="foto" id="foto">
            </li>
            <li> -->
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>