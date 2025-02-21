<?php 
require 'functions.php';
session_start();
if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script> 
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
                alert('Data gagal ditambahkan! " . mysqli_error($conn) . "');
                document.location.href = 'index.php';
        </script>";
    }
}
?>

<?php include("components/layout.php") ?>
<div class="flex bg-gray-50 my-6 mx-5 rounded-lg shadow-lg">
    
    <?php include('components/aside.php') ?>

    <!-- Konten Utama -->
    <div class="flex-1 p-6">
        <header class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Selamat Datang di Dashboard</h2>
        </header>

        <main class="mt-6">
            <h3 class="text-xl font-semibold mb-4">Buat Berita Baru</h3>
            <form class="bg-white p-6 rounded shadow" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>">
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="judul" name="judul" required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Judul">
                </div>
                <div class="mb-4">
                    <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                    <textarea id="konten" name="konten" rows="4" required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Masukkan Konten"></textarea>
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Pilih foto konten</label>
                    <input type="file" id="foto" name="foto" required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Buat Data</button>
                </div>
            </form>
        </main>
    </div>
</div>
