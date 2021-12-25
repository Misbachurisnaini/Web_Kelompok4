<?php

session_start();

if(!isset($_SESSION["admin"])){
    header("location: login.php");
    exit;
}
require "config/function.php";


$id = $_GET["id"];
// var_dump($id);

if(deletecustomer($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        // location = 'customer.php';
    </script>";
} else {
    echo mysqli_error($conn);
    echo "
    <script>
        alert('Data gagal dihapus!');
        // location = 'customer.php';
    </script>";
}

?>