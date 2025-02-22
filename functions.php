<?php

// Hubungkan PHP ke MySQL/XAMPP
$conn = mysqli_connect('localhost', 'root', '', 'news', 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// request url supaya active
function isActive($path)
{
    return strpos($_SERVER['REQUEST_URI'], $path) !== false ? 'active' : '';
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $konten = htmlspecialchars($data["konten"]);
    $link = $data["link"];
    $category = htmlspecialchars($data["category"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO posts (judul, konten, link,foto ,category_id) VALUES ('$judul', '$konten','$link' , '$gambar', '$category')";
    
    if (!mysqli_query($conn, $query)) {
        die("Query gagal: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['foto']['name'];
    $sizeFile = $_FILES['foto']['size'];
    $eror = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah ada gambar yang diupload
    if ($eror === 4) {
        echo "<script>alert('Masukkan Gambar Terlebih dahulu');</script>";
        return false;
    }

    // Pastikan yang diupload adalah gambar
    $extensiGambarValid = ['jpg', 'png', 'jpeg'];
    $extensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($extensiGambar, $extensiGambarValid)) {
        echo "<script>alert('File Gambar harus JPG, PNG, atau JPEG');</script>";
        return false;
    }

    // Pastikan ukuran file tidak terlalu besar
    if ($sizeFile > 5000000) {
        echo "<script>alert('File Gambar Terlalu Besar');</script>";
        return false;
    }

    // Pastikan nama file gambar berbeda
    $namaFileBaru = uniqid() . '.' . $extensiGambar;

    // Pastikan folder img ada
    if (!is_dir('img')) {
        mkdir('img', 0777, true);
    }

    // Pindahkan file ke folder img/
    if (!move_uploaded_file($tmpName, 'img/' . $namaFileBaru)) {
        echo "<script>alert('Gagal mengupload gambar');</script>";
        return false;
    }

    return $namaFileBaru;
}

function ubah($data) {
    global $conn;

    $id = $data["id"] ;     
    $judul = htmlspecialchars($data ["judul"]);
    $konten = htmlspecialchars( $data ["konten"]);
    $link =  $data ["link"];
    $gambarLama = htmlspecialchars($data ["fotoLama"]);
    $cateoryBaru = htmlspecialchars($data ["categoryBaru"]);

    //cek apakah user menambahkan gambar baru atau tidak
    if ( $_FILES ['foto'] ['error'] === 4 ) {
        $gambar = $gambarLama ;
    } else {
        $gambar = upload() ;
    }



    //query insert data / tambahkan data
    $query = "UPDATE posts SET 
        judul = '$judul',
        konten = '$konten',
        link = '$link',
        foto = '$gambar',
        category_id = '$cateoryBaru'
        WHERE id = $id 
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// fungsi search



function reg ($data) {
    global $conn;

    $username= strtolower(stripcslashes( $data["username"]));
    $password= mysqli_real_escape_string($conn, $data["password"] ) ;
    $password2= mysqli_real_escape_string($conn, $data["password2"]) ;

    //cek apakah password dan konfirmasi password sama
    if ($password !== $password2) {
        echo "<script> 
            alert('Password Tidak sama');
            document.location.href = ''
    </script>";

    return false;
    }

    //cek apakah username sudah ditambahkan 
    $result = mysqli_query ($conn, "SELECT username FROM users WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script> 
            alert('Username Sudah ada');
            document.location.href = ''
    </script>";

    return false;
    }

    //enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);
    

    //tambahkan akun ke database 
    mysqli_query($conn,"INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM posts WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function createCategory($data) {
    global $conn;

    $nama = htmlspecialchars($data["name"]);


    // Query insert data
    $query = "INSERT INTO categories (name) VALUES ('$nama')";
    
    if (!mysqli_query($conn, $query)) {
        die("Query gagal: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}
?>
