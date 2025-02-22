<?php 
require 'functions.php';
session_start();
if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["submit"])) {
    if (createCategory($_POST) > 0) {
        echo "<script> 
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script> 
                alert('Data gagal ditambahkan! " . mysqli_error($conn) . "');
                document.location.href = 'dashboard.php';
        </script>";
    }
}

$username = $_SESSION["username"];

?>

<?php include("components/layout.php") ?>
<div class="flex bg-gray-50 my-6 mx-5 rounded-lg shadow-lg">
    
    <?php include('components/aside.php') ?>

    <!-- Konten Utama -->
    <div class="flex-1 p-6">

        <main class="">
            <h3 class="text-xl font-semibold mb-4">Buat Berita Baru</h3>
            <form class="bg-white p-6 rounded shadow" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>">
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Nama Category: </label>
                    <input type="text" id="judul" name="name" required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan nama">
                </div>
                <div class="flex justify-end">
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Buat Data</button>
                </div>
            </form>
        </main>
    </div>
</div>
