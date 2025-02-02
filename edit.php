<?php 
require 'functions.php';

$id = $_GET["id"];

$dataEdit = query("SELECT * FROM posts WHERE Id = '$id'")[0];

if (isset($_POST["submit"])) {
    //ambil data dari tiap element form
    
    if (ubah($_POST) > 0) {
        echo "<script> 
                alert('Data Berhasil Diubah');
                document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script> 
                alert('Data Gagal Diubah');
                document.location.href = 'dashboard.php';
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
            <h3 class="text-xl font-semibold mb-4">Edit Berita</h3>
            <form class="bg-white p-6 rounded shadow" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="id" value="<?= $dataEdit["id"] ; ?>">
            <input type="hidden" name="fotoLama" value="<?= $dataEdit["foto"] ; ?>">    
            <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" id="judul" name="judul" required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="<?= $dataEdit['judul'] ?>">
                </div>
                <div class="mb-4">
                    <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                    <textarea id="konten" name="konten"  required class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" ><?= $dataEdit['konten'] ?></textarea>
                </div>
                <div class="mb-4">
                    <label for="foto" class="block text-sm font-medium text-gray-700">Pilih foto konten</label>
                        <p class="block text-sm font-medium text-gray-700">Foto saat ini :</p>
                        <div class="w-56 h-56 shadow-lg mb-4 rounded-lg overflow-hidden">
                            <img src="img/<?= $dataEdit['foto'] ?>" alt="" class="object-cover">
                        </div>
                    <input type="file" id="foto" name="foto"  class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <div class="flex justify-end">
                    <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Perbarui Data</button>
                </div>
            </form>
        </main>
    </div>
</div>