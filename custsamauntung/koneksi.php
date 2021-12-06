<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "db_samauntung1";
    $konek=new mysqli($hostname,$username,$password, $database);
    if ($konek->connect_error){
        die('Maaf koneksi gagal: '. $connect->connect_error);
    }
?>