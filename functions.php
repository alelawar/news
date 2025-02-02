<?php

// Hubungkan PHP ke MySQL/XAMPP
$conn = mysqli_connect('localhost', 'root', '', 'news', 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO posts (judul, konten, foto) VALUES ('$judul', '$konten', '$gambar')";
    
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

?>
