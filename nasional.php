<?php
require 'functions.php';

session_start();

$username = $_SESSION["username"] ?? null;


$users = query("SELECT * FROM users WHERE username LIKE '$username'");

// var_dump($users)
?>

<?php include("components/layout.php") ?>