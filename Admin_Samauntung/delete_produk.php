<?php
include "koneksi.php";
if(mysqli_query($konek, "DELETE FROM produk_detail where id_produk=".$_GET['id'])){
echo "<script>alert('DATA DETAIL DELETED');</script>";
if(mysqli_query($konek, "DELETE FROM produk where id_produk=".$_GET['id'])){
echo "<script>alert('DATA DELETED');window.location.replace('produk.php');</script>";
}else{
echo "<script>alert('DATA FAILED TO DELETE');window.location.replace('produk.php');</script>";
}
}else{
echo "<script>alert('DATA DETAIL FAILED TO DELETE');window.location.replace('produk.php');</script>";
}