<?php 
require 'functions.php';

$posts = query("SELECT * FROM posts ORDER BY judul ASC") ;


?>

<?php include("components/layout.php") ?>

<header class="bg-indigo-600 text-white p-2">
        <h1 class="text-3xl font-bold">Blog Berita</h1>
    </header>

    <main class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Berita Terbaru</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($posts as $post) ?>
            <!-- Contoh Berita 1 -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-semibold"><?= $post['judul'] ?></h3>
                <!-- <p class="text-gray-600">Tanggal: 1 Januari 2023</p> -->
                <p class="mt-2"><?= $post['konten'] ?></p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Baca Selengkapnya</a>
            </div>


            <!-- Tambahkan lebih banyak berita di sini -->
        </div>
    </main>
