<?php

$servername = "localhost";
$database = "u1694897_b_reg_6_db";
$username = "u1694897_b_reg_6";
$password =  "jtipolije";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>