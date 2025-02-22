<?php
require 'functions.php';

session_start();

$username = $_SESSION["username"] ?? null;


if (!isset($_GET['search']) || $_GET['search'] === '') {
    header("Location: index.php");
    exit;
}

$param = $_GET['search'];

// $queries = query("SELECT posts* categories.name AS category_name WHERE judul LIKE '%$param%' OR konten LIKE '%$param%'");

$search = query("SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
WHERE judul LIKE '%$param%' OR konten LIKE '%$param%'");

$rekomendation = $mainContents =  query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
ORDER BY RAND()
LIMIT 10
");

$newest = query("
SELECT posts.*, categories.name AS category_name 
FROM posts 
JOIN categories ON posts.category_id = categories.id
");

// var_dump($queries);
?>

<?php include("components/layout.php") ?>


<div class="container mx-auto p-6 mb-8">
    <div class="mt-6">
        <h3 class="text-2xl font-bold mb-5 border-red-500 max-w-[150vh] pb-3 border-b-4 uppercase">Hasil Pencarian Dari : <span><?= $param ?></span></h3>
        <div class="flex grid-cols-5 gap-8">
            <!-- artikel -->
            <?php foreach ($search as $s) : ?>
                <article class="bg-white p-4 max-w-[100vh] rounded shadow w-full">
                    <img src="img/<?= $s['foto'] ?>" alt="" class="w-full object-cover">
                    <a href="<?= $s['link'] ?>" class="text-sm font-semibold hover:underline"><?= $s['judul'] ?></a>
                    <p href="#" class="mt-2 text-sm text-red-600 hover:underline"><?= $s['category_name'] ?></p>
                    <a href="<?= $s['link'] ?>" class="text-blue-500 hover:underline mt-2 ">Read More</a>
            </article>
            <?php endforeach; ?>
            <!-- end artikel -->
        </div>
    </div>
</div>

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
