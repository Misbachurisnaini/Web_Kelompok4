<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("location: login.php");
    exit;
}
$id = $_GET["id"];

if(deleteproduk($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        location = 'produk.php';
    </script>";
} else {
    echo mysqli_error($conn);
    echo "
    <script>
        alert('Data gagal dihapus!');
        location = 'produk.php';
    </script>";
}

?>