<?php
require 'functions.php';

session_start();

$username = $_SESSION["username"] ?? null;

$rekomendation = $mainContents =  query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
ORDER BY RAND()
LIMIT 10
");

$mainContent =  query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
ORDER BY RAND()
LIMIT 1
")[0];

$mainContents =  query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
ORDER BY RAND()
LIMIT 2
");



$datas = query("SELECT judul, link FROM posts");

$news =  query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
ORDER BY RAND()
LIMIT 5
");

$newest = query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
");
?>
<?php include("components/layout.php") ?>

<!-- Main Content -->
<div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 p-6">
    <!-- Main News Section -->
    <section class="col-span-2  ">
        <!-- main ssection atas -->
        <div class=" p-6 rounded-lg shadow-lg bg-gray-800">
            <div class="flex justify-between border-b-2 pb-4 border-white/80 items-center gap-5 group cursor-pointer">
                <div class="max-w-2xs">
                    <a href="<?= $mainContent['link'] ?>" class="text-2xl font-semibold text-white group-hover:underline-offset-1 group-hover:underline">
                        <?= $mainContent['judul'] ?>
                    </a>
                    <p class="mt-2 text-sky-500 font-medium">
                        <?= $mainContent['category_name'] ?>
                    </p>
                    <p class="mt-2 text-white/80">
                        <?= $mainContent['konten'] ?>
                    </p>
                </div>
                <img src="img/<?= $mainContent['foto'] ?>" alt="Hasto Kristiyanto Ditahan" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103 " />
            </div>
            <!-- end main section atas -->

            <!-- main bawah -->
            <div class="flex grid-cols-2 items-center mt-4 gap-8">
                <?php foreach ($mainContents as $mc) : ?>
                    <div class="w-full flex grid-cols-1 border-r-2 px-4 border-white/80">
                        <p class="text-white/80 text-lg"><?= $mc['judul'] ?></p>
                        <div class="aspect-square size-20">
                            <img src="img/<?= $mc['foto'] ?>" class="w-full h-full object-cover" alt="">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- end main bawah -->
        </div>
    </section>

    <!-- Sidebar -->
    <aside class="bg-white p-6 rounded-lg overflow-y-scroll h-3/4 shadow-lg">
        <h3 class="text-2xl font-semibold">Terpopuler :</h3>
        <ul class="mt-4 space-y-4">
            <?php foreach ($datas as $data) : ?>
                <li>
                    <a href="<?= $data['link'] ?>" class="text-blue-600  hover:underline"><?= $data['judul'] ?></a>
                </li>
            <?php endforeach; ?>
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
            <?php foreach ($news as $new) : ?>
                <article class="bg-white p-4 rounded shadow w-full">
                    <img src="img/<?= $new['foto'] ?>" alt="" class="w-full object-cover">
                    <a href="<?= $new['link'] ?>" class="text-sm font-semibold hover:underline"><?= $new['judul'] ?></a>
                    <p class="mt-2 text-xs"><?= $new['category_name'] ?></p>
                    <a href="#" class="text-blue-500 hover:underline mt-2 ">Read More</a>
                </article>

            <?php endforeach; ?>
            <!-- end artikel -->
        </div>
    </div>
</div>
<!-- end berita utama -->

<!-- scroll content -->
<div class="px-16">
    <h3 class="text-2xl font-bold mb-5  uppercase">Terbaru :</h3>
</div>
<div class="container mx-auto flex flex-col md:flex-row gap-8 p-6">
    <!-- section start -->
    <section class="flex-1 ">
        <!-- main ssection atas -->
        <div class=" p-6 shadow-lg bg-gray-50/70">
            <?php foreach ($newest as $n) : ?>
                <div class="flex justify-between border-b-2 pb-4 border-dark/80 gap-5 mt-6">
                    <div class="w-3/4 overflow-hidden">
                        <img src="img/<?= $n['foto'] ?>" alt="" class="w-3/4 object-cover aspect-video">
                    </div>

                    <div class="max-w-full mt-2 flex flex-col">
                        <a href="<?= $n['link'] ?>" class="text-2xl font-semibold text-dark">
                            <?= $n['judul'] ?>
                        </a>
                        <a href="<?= $n['category_name'] ?>.php" class="mt-2 text-sky-500 font-medium">
                            <?= $n['category_name'] ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end main section atas -->


    </section>
    <!-- sidebar scroll -->
    <aside class="w-1/3 bg-gray-900 p-6 overflow-y-scroll h-[100vh] shadow-lg">
        <h3 class="text-2xl font-semibold text-white border-red-500  border-b-4">Rekondasi untuk kamu :</h3>
        <ul class="mt-4 space-y-4">
            <?php foreach ($rekomendation as $req) : ?>
                <li class="items-center flex flex-col">
                    <img src="img/<?= $req['foto'] ?>" alt="">
                    <div class="flex flex-col gap-2">
                        <a href="<?= $req['link'] ?>" class="text-white/80 font-medium hover:underline"><?= $req['judul'] ?></a>
                        <a href="category.php?cat_id=<?= $catValid ?>" class="text-red-600 font-medium text-sm hover:underline"><?= $req['category_name'] ?></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </aside>
    <!-- end Sidebar scroll -->
    <!-- end section start -->
</div>
<!-- end scroll content -->

<?php include("components/foot.php") ?>