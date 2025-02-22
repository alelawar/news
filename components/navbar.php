<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$populars = query("SELECT category_id FROM posts");


$cat_id = $_SESSION["username"] ?? "Guest";



?>
<header class="bg-red-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="#" class="font-bold text-xl">Yo<span class="text-black">News</span> | Indonesia</a>
            <nav class="hidden md:flex space-x-4">
                <a href="index.php" class="hover:text-gray-200 <?= isActive('index.php') ? 'border-b-2 border-white' : '' ?>">Home</a>
                <a href="category.php?cat_id=1" class="hover:text-gray-200 <?= isActive('category.php?cat_id=1') ? 'border-b-2 border-white' : '' ?>">Nasional</a>

                <a href="category.php?cat_id=2" class="hover:text-gray-200 <?= isActive('category.php?cat_id=2') ? 'border-b-2 border-white' : '' ?>">Internasional</a>
                <a href="category.php?cat_id=3" class="hover:text-gray-200 <?= isActive('category.php?cat_id=3') ? 'border-b-2 border-white' : '' ?>">Ekonomi</a>
                <a href="category.php?cat_id=4" class="hover:text-gray-200 <?= isActive('category.php?cat_id=4') ? 'border-b-2 border-white' : '' ?>">Olahraga</a>
                <a href="category.php?cat_id=5" class="hover:text-gray-200 <?= isActive('category.php?cat_id=5') ? 'border-b-2 border-white' : '' ?>">Teknologi</a>
            </nav>
        </div>
        <form class="flex items-center space-x-2" method="GET" action="search.php">
            <input type="text" placeholder="Cari berita..." class="px-4 py-2 border-2 border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-slate-500" name="search">
            <button type="cari" class="px-4 py-2 bg-gray-900 text-white rounded-r-md hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500">
                Cari
            </button>
        </form>
        <div class="flex items-center space-x-4">
            <img src="" alt="">
            <?php if ($username !== "Guest") : ?>
                <a href="dashboard.php" class="bg-white text-red-600 px-4 py-2 rounded hover:bg-gray-200 flex justify-between gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    <?php echo htmlspecialchars($username); ?>
                </a>
            <?php else : ?>
                <a href="login.php" class="bg-white text-red-600 px-4 py-2 rounded hover:bg-gray-200 flex justify-between gap-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    Login
                </a>
            <?php endif; ?>
        </div>

    </div>
</header>