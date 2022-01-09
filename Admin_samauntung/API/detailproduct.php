<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
require("koneksi.php");

$id_produk = $_POST["id_produk"];

$query_insert = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result = mysqli_query($conn, $query_insert);
$cek = mysqli_num_rows($result);

if ($cek > 0){
    
    $rows = mysqli_fetch_assoc($result);
         $pesan = "BERHASIL";
           $id = $rows['id_produk'];
           $produk = $rows['nama_produk'];
           $harga = $rows['harga'];
           $stok = $rows['stok'];
           $deskripsi = $rows['deskripsi_produk'];
           $gambar = $rows['gambar_produk'];
           $idk = $rows['id_kategori'];
           $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$idk'"));
           $kategori = $get['nama_kategori'];

           $response = array('pesan'=>$pesan, 'id_produk' => $id, 
           'nama_produk' => $produk, 'nama_kategori' => $kategori, 'harga' => $harga, 'stok' => $stok, 
           'deskripsi_produk' => $deskripsi, 'gambar_produk' => $gambar);
    
} else {
    $response = array('pesan'=>'TIDAK ADA');
}
echo json_encode($response);
mysqli_close($conn);

}


?>