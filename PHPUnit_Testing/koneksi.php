<?php
$server     = "localhost";
$username   = "root";
$password   = "";
$db         = "db_samauntung";

//membuat koneksi
$koneksi    = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi Gagal : " . mysqli_connect_error();
}
