<?php

require_once "koneksi.php";

$sql = mysqli_query($conn, "SELECT produk.id_produk, kategori.nama_kategori as 'kategori', produk.nama_produk, gambar_produk, deskripsi_produk, stok, harga FROM produk, kategori WHERE kategori.id_kategori = produk.id_kategori");
$rows = [];
while ($result = mysqli_fetch_assoc($sql)) {
    $rows[] = $result;
}

echo json_encode($rows);
 
?>