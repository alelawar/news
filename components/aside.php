  <!-- Sidebar -->
  <div class="w-64 bg-white shadow-md h-screen">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
            </div>
            <nav class="mt-6 p-4">
                <a href="dashboard.php" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200 <?= isActive('dashboard.php') ? 'bg-gray-200 ' : '' ?> ">My Dashboard</a>
                <a href="create.php"class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200 <?= isActive('create.php') ? 'bg-gray-200 ' : '' ?> ">Buat Posts</a>
                <a href="createCategory.php"class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200 <?= isActive('createCategory.php') ? 'bg-gray-200 ' : '' ?> ">Buat category</a>
                <a href="logout.php"class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200 " onclick = "return confirm('Yakin ingin logout')">Logout</a>
                <a href="" class="hover:text-gray-200 <?= isActive('index.php') ? 'border-b-2 border-white' : '' ?>"></a>
                <!-- <a href="#" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">Pengaturan</a> -->
                <!-- <a href="#" class="block py-2.5 px-4 text-gray-700 hover:bg-gray-200">Logout</a> -->
            </nav>
           
        </div>