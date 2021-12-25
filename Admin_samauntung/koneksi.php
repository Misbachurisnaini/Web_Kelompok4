<?php
    $hostname = "localhost";
    $username = "u1694897_b_reg_6";
    $password = "jtipolije";
    $database = "u1694897_b_reg_6_db";
    $konek=new mysqli($hostname,$username,$password, $database);
    if ($konek->connect_error){
        die('Maaf koneksi gagal: '. $connect->connect_error);
    }
?>