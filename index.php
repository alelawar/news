<?php
require 'functions.php';

session_start();

$username = $_SESSION["username"] ?? null;


$posts = query("SELECT * FROM posts ORDER BY judul ASC");
?>

<?php include("components/layout.php") ?>

<!-- Main Content -->
<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 p-6">
    <!-- Main News Section -->
    <section class="col-span-2  ">
        <!-- main ssection atas -->
        <div class=" p-6 rounded-lg shadow-lg bg-gray-800">
            <div class="flex justify-between border-b-2 pb-4 border-white/80 items-center gap-5">
                <div class="max-w-2xs">
                    <h2 class="text-2xl font-semibold text-white">
                        KPK Tahan Sekjen PDIP Hasto Kristiyanto Kasus Harun Masiku
                    </h2>
                    <p class="mt-2 text-sky-500 font-medium">
                        Nasional
                    </p>
                    <p class="mt-2 text-white/80">
                        Komisi Pemberantasan Korupsi (KPK) menahan Sekjen PDIP Hasto
                        Kristiyanto usai pemeriksaan, Kamis (20/2).
                    </p>
                </div>
                <img src="img/ss.jpeg" alt="Hasto Kristiyanto Ditahan" class="w-full h-full object-cover" />
            </div>
            <!-- end main section atas -->

            <!-- main bawah -->
            <div class="flex grid-cols-2 items-center mt-4 gap-8">
                <div class="w-full flex grid-cols-1 border-r-2 px-4 border-white/80">
                    <p class="text-white/80 text-lg">Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="aspect-square size-20">
                        <img src="img/sec-1.jpeg" class="w-full h-full object-cover" alt="">
                    </div>
                </div>
                <!-- span 2x -->
                <div class="w-full flex grid-cols-1">
                    <p class="text-white/80 text-lg">Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="aspect-square size-20">
                        <img src="img/sec-1.jpeg" class="w-full h-full object-cover" alt="">
                    </div>
                </div>
            </div>
            <!-- end main bawah -->
        </div>
    </section>

    <!-- Sidebar -->
    <aside class="bg-white p-6 rounded-lg overflow-y-scroll h-3/4 shadow-lg">
        <h3 class="text-2xl font-semibold">Terpopuler :</h3>
        <ul class="mt-4 space-y-4">
            <li>
                <a href="#" class="text-blue-600  hover:underline">KPK Tahan Sekjen PDIP Hasto Kristiyanto Kasus Harun Masiku</a>
            </li>
            <li>
                <a href="#" class="text-blue-600 hover:underline">Hasto Kristiyanto Ditahan KPK</a>
            </li>

            <li>
                <a href="#" class="text-blue-600 hover:underline">Hasto Kristiyanto Ditahan KPK</a>
            </li>
            <li>
                <a href="#" class="text-blue-600 hover:underline">Penyataan Maaf Band Sukatani soal Lagu Bayar Bayar</a>
            </li>
            <li>
                <a href="#" class="text-blue-600 hover:underline">Hasto Resmi Ditahan di KPK</a>
            </li>
        </ul>
    </aside>
    <!-- end Sidebar -->
</div>

<!-- berita utama -->
<div class="container mx-auto p-6 mb-8">
    <div class="mt-6">
        <h3 class="text-2xl font-bold mb-5 border-red-500 w-1/6 border-b-4 uppercase">Berita Utama :</h3>
        <div class="flex grid-cols-5 gap-8">
            <!-- artikel -->
            <article class="bg-white p-4 rounded shadow w-full">
                <img src="img/sd.jpeg" alt="" class="w-full object-cover">
                <h3 class="text-sm font-semibold">Mantan Wakapolri Komjen Purn Syafruddin Meninggal Dunia</h3>
                <p class="mt-2 text-xs">Brief description of the article content.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
            </article>
            <article class="bg-white p-4 rounded shadow w-full">
                <img src="img/sd.jpeg" alt="" class="w-full object-cover">
                <h3 class="text-sm font-semibold">Mantan Wakapolri Komjen Purn Syafruddin Meninggal Dunia</h3>
                <p class="mt-2 text-xs">Brief description of the article content.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
            </article>
            <article class="bg-white p-4 rounded shadow w-full">
                <img src="img/sd.jpeg" alt="" class="w-full object-cover">
                <h3 class="text-sm font-semibold">Mantan Wakapolri Komjen Purn Syafruddin Meninggal Dunia</h3>
                <p class="mt-2 text-xs">Brief description of the article content.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
            </article>
            <article class="bg-white p-4 rounded shadow w-full">
                <img src="img/sd.jpeg" alt="" class="w-full object-cover">
                <h3 class="text-sm font-semibold">Mantan Wakapolri Komjen Purn Syafruddin Meninggal Dunia</h3>
                <p class="mt-2 text-xs">Brief description of the article content.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
            </article>
            <article class="bg-white p-4 rounded shadow w-full">
                <img src="img/sd.jpeg" alt="" class="w-full object-cover">
                <h3 class="text-sm font-semibold">Mantan Wakapolri Komjen Purn Syafruddin Meninggal Dunia</h3>
                <p class="mt-2 text-xs">Brief description of the article content.</p>
                <a href="#" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
            </article>
            <!-- end artikel -->
        </div>
    </div>
</div>
<!-- end berita utama -->


<!-- scroll content -->
<div class="px-16">
    <h3 class="text-2xl font-bold mb-5  uppercase">Terbaru :</h3>
</div>
<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 p-6">
    <!-- section start -->
    <section class="col-span-2  ">
        <!-- main ssection atas -->
        <div class=" p-6 shadow-lg bg-gray-50/70">
            <div class="flex justify-between border-b-2 pb-4 border-dark/80 gap-5">
                <div class="w-1/2">
                    <img src="img/ss.jpeg" alt="Hasto Kristiyanto Ditahan" class="w-full h-full object-cover" />
                </div>
                <div class="max-w-full mt-2">
                    <h2 class="text-2xl font-semibold text-dark">
                        KPK Tahan Sekjen PDIP Hasto Kristiyanto Kasus Harun Masiku
                    </h2>
                    <p class="mt-2 text-sky-500 font-medium">
                        Nasional
                    </p>
                </div>
            </div>
            <!-- end main section atas -->


    </section>
    <!-- sidebar scroll -->
    <aside class="bg-gray-900 p-6 overflow-y-scroll h-3/4 shadow-lg">
        <h3 class="text-2xl font-semibold text-white border-red-500  border-b-4">Rekondasi untuk kamu :</h3>
        <ul class="mt-4 space-y-4">
            <li class="items-center flex flex-col">
                <img src="https://akcdn.detik.net.id/visual/2023/11/10/bring-me-the-horizon-3_169.jpeg?w=300&q=90" alt="">
                <a href="#" class="text-white/80 mx-3  hover:underline">Akhir Semrawut Konser Bring Me The Horizon di Jakarta</a>
            </li>
        </ul>
    </aside>
    <!-- end Sidebar scroll -->
    <!-- end section start -->
</div>
<!-- end scroll content -->

<?php include("components/foot.php") ?>
