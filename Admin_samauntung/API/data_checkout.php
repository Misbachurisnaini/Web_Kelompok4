<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'koneksi.php';

    $id_produk = $_POST['id_produk'];
    $id_cust = $_POST['id_customer'];

    $getProduk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'"));
    $getAlamat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id_customer = '$id_cust'"));

    $alamat = $getAlamat['alamat'];
    $gambar = $getProduk['gambar_produk'];
    $idk = $getProduk['id_kategori'];
    $nama = $getProduk['nama_produk'];
    $harga = $getProduk['harga'];
    $getK = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$idk'"));
    $kategori = $getK['nama_kategori'];

    $response = array('pesan' => 'BERHASIL', 'alamat' => $alamat, 'gambar' => $gambar,'namaproduk' => $nama, 'harga' => $harga, 'kategori' => $kategori );

} else {
    $response = array('pesan' => 'GAGAL');
}

echo json_encode($response);
mysqli_close($conn);
?>