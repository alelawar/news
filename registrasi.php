<?php require("functions.php") 

?>


<?php include("components/head.php") ?>

<div class="flex items-center justify-center h-screen">
    <div class="bg-slate-50 p-8 rounded-lg shadow-lg w-96 ">
            <a class="text-2xl font-bold mb-6 text-center block" href="index.php">Buat Akun</a>
            <form action="#" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="email" id="email" name="email" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Daftar Akun</button>
            </form>
            <p class="text-center text-gray-600 mt-4">Sudah punya akun? <a href="login.php" class="text-blue-600 hover:underline">Login</a></p>
    </div>
</div>