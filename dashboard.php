<?php
require("functions.php");

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["username"];

$posts = query("SELECT * FROM posts ORDER BY judul ASC");
?>

<?php include("components/layout.php") ?>

<div class="flex bg-gray-50 my-6 mx-5 rounded-lg shadow-lg">
    <?php include("components/aside.php") ?>

    <!-- Konten Utama -->
    <div class="flex-1 p-6 ">
        <header class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Selamat Datang di Dashboard | <?= $username ?></h2>
        </header>

        <main class="mt-6">
            <div class="container mx-auto">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Konten</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($posts as $post) : ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-4 py-2"><?=  $i; ?></td>
                                    <td class="px-4 py-2 font-semibold"><?= $post['judul'] ?></td>
                                    <td class="px-4 py-2"><?= $post['konten'] ?></td>
                                    <td class="px-4 py-2 text-center flex-row flex items-center justify-center">
                                        <a class="p-2 mx-2 bg-blue-500 text-white rounded hover:bg-blue-600" href="edit.php?id=<?= $post['id'] ?>">Edit</a>
                                        <a class="p-2 mx-2 bg-red-500 text-white rounded hover:bg-red-600" href="hapus.php?id=<?= $post['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php $i++ ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>