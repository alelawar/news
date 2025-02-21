<?php 
session_start();

require 'functions.php' ;

if ( isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'" );

    //cek usrnm 
    if ( mysqli_num_rows($result) === 1 ) {

        //cek pw
        $row = mysqli_fetch_assoc($result) ; 
        if (password_verify($password, $row["password"]) ) {
            header("Location: dashboard.php");
            // cek sesion
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];  // Simpan username di session
            exit; 
        }
    }

    $error = true;

}

?>

<?php include("components/head.php") ?>

<div class="flex items-center justify-center h-screen">
    <div class="bg-slate-50 p-8 rounded-lg shadow-lg w-96 ">
            <a class="text-2xl font-bold mb-6 text-center block" href="index.php">Login</a>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Email</label>
                    <input type="text" id="username" name="username" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Password</label>
                    <input type="password" id="password" name="password" class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
                <button name="login" type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>
            </form>
            <p class="text-center text-gray-600 mt-4">Belum punya akun? <a href="registrasi.php" class="text-blue-600 hover:underline">Daftar</a></p>
    </div>
</div>