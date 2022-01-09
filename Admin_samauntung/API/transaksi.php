<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    require 'koneksi.php';

    $id_cust = $_POST['id_customer'];
    $id_product = $_POST['id_produk'];
    
    $timezone = time() + (60 * 60 * 7);
    $date = gmdate("Y-m-d", $timezone);
    
    // $ambilKeranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '$id_user' AND jenis = 'ORDER' ");
    
    $getharga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_product' "));

    $harga = $getharga['harga'];

    $ongkir = 12000;

    $total = $harga + $ongkir;


    $queryTransaksi = mysqli_query($conn, "INSERT INTO pesanan ( tanggal_pesanan, tanggal_terima, total, ongkir, status, bukti_bayar, keterangan) 
                                                        VALUES ('$date', '0000-00-00', '$total', '$ongkir', 'belum bayar', '-', 'Transaksi')");
    
    $cek = mysqli_affected_rows($conn);
    // $current_id = $conn->insert_id;
    $getX = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1"));
    $pesanan_terakhir = $getX['id_pesanan'];

    if ($cek > 0) {

        mysqli_query($conn, "INSERT INTO pesanan_detail(id_pesanan, id_customer, id_produk, subtotal, jumlah) 
                                VALUES ('$pesanan_terakhir', '$id_cust', '$id_product', '$harga', '1') ");
        
        mysqli_query($conn, "UPDATE produk SET stok = stok - 1 WHERE id_produk = '$id_product'");

        $response = array('pesan'=>'BERHASIL');
        
    } else {
        $response = array('pesan'=>'GAGAL');
    }

echo json_encode($response);
mysqli_close($conn);
}

?>