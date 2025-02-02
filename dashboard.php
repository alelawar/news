<?php 
require("functions.php");


?>

<?php include("components/layout.php") ?>

<div class="flex bg-gray-50 my-6 mx-5 rounded-lg shadow-lg">

      <?php include('components/aside.php') ?>

        <!-- Konten Utama -->
        <div class="flex-1 p-6 ">
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Selamat Datang di Dashboard</h2>
            </header>

            <main class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-semibold">Statistik 1</h3>
                        <p class="text-gray-600">Deskripsi statistik 1.</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-semibold">Statistik 2</h3>
                        <p class="text-gray-600">Deskripsi statistik 2.</p>
                    </div>
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="font-semibold">Statistik 3</h3>
                        <p class="text-gray-600">Deskripsi statistik 3.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>