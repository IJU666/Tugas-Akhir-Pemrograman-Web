<?php
include"koneksi.php";

function query($query){
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;

}

function registrasi($data){
    global $con;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);

    $result = mysqli_query($con, "SELECT username FROM registrasi WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($con, "INSERT INTO registrasi VALUES (null,'$username','$password')");
    
    return mysqli_affected_rows($con);
}

function upload(){
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('upload gambar terlebih dahulu');
            </script>";
            return false;
    } else {
            $fileValid = ['jpg', 'jpeg', 'png'];
            $fileExtension = explode('.', $filename);
            $fileExtension = strtolower(end($fileExtension));

            if (!in_array($fileExtension, $fileValid)) {
                echo "<script>
                        alert('yang anda upload bukan gambar');
                    </script>";
                    return false;
                   
            }
            else {

                if ($filesize > 1000000) {
                    echo "<script>
                    alert('ukuran gambar terlalu besar');
                </script>";
                return false;
                }
                $newFileName = uniqid();
            $newFileName .= '.';
            $newFileName .= $fileExtension;
            move_uploaded_file($tmpName, 'img/'.$newFileName);
            return $newFileName;
                return true;
            }
        }
            
    }




    function tambah($data){
        global $con;
        $nama = $_POST["nama"];
        $nidn = $_POST["nidn"];
        $email = $_POST["email"];
        $prodi = $_POST["prodi"];
        // $foto = $_POST["foto"];
        $foto = upload();

        if (!$foto) {
            return false;
            echo"Upload Gagal";
        }

        $query = "INSERT INTO dosen (nama,nidn,email,prodi,foto) VALUES ('$nama', '$nidn', '$email', '$prodi', '$foto')";
        mysqli_query($con, $query);

        return mysqli_affected_rows($con);
    }


    function hapus($id){
        global $con;
        $query = "DELETE FROM dosen WHERE id = $id";
        mysqli_query($con, $query);
        return mysqli_affected_rows($con);
    }

    function ubah($data){
        global $con;
        $id = $data["id"];
        $nama = $data["nama"];
        $nidn = $data["nidn"];
        $email = $data["email"];
        $prodi = $data["prodi"];
        $foto = $data["foto"];

        $query = "UPDATE dosen  SET 
        nama='$nama', 
        NIDN='$nidn', 
        email='$email', 
        prodi='$prodi', 
        foto='$foto' 
        WHERE id='$id'";
        mysqli_query($con, $query);

        return mysqli_affected_rows($con);
    }

    function cari($keyword){
        $query = "SELECT * FROM dosen WHERE nama LIKE '%$keyword%' OR prodi LIKE '%$keyword%' OR nidn LIKE '%$keyword%'"; 
        return query($query);
    }
    
?>