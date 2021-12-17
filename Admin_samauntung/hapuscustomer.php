<?php

session_start();

require "config/function.php";

if(isset($_SESSION["admin"])){
    header("location: login.php");
    exit;
}

$id = $_GET["id"];
if(delete($id > 0)) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        location = 'customer.php';
    </script>";
} else {
    echo mysqli_error($conn);
    echo "
    <script>
        alert('Data gagal dihapus!');
        location = 'customer.php';
    </script>";
}

?>