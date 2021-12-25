<?php

 require "config/function.php";

 $id = $_GET['id'];
//  $data = query("SELECT nama, email_cs, alamat, jumlah, subtotal, id_pesanan, status, total, ongkir, nama_produk FROM pesanan_detail INNER JOIN pesanan, customer, produk ON pesanan_detail.id_pesanan = pesanan.id_pesanan pesanan_detail.id_customer = customer.id_customer pesanan_detail.id_produk = produk.id_produk WHERE pesanan_detail.id_pesanan_detail = '$id'")[0];

$data = query("SELECT a.*, b.id_pesanan, b.status, b.total, b.ongkir, c.nama, c.email_cs, c.alamat, d.nama_produk FROM pesanan_detail a
INNER JOIN pesanan b ON a.id_pesanan = b.id_pesanan
INNER JOIN customer c ON a.id_customer = c.id_customer
INNER JOIN produk d ON a.id_produk = d.id_produk
AND a.id_pesanan_detail = '$id'")[0];

// $pesanan = query("SELECT * FROM pesanan WHERE id_pesanan = $id")[0];
// $pesanan2 = query("SELECT * FROM pesanan_detail WHERE id_pesanan = $id")[0];

?>

<div class="modal-content">
  <div class="modal-header p-3 mb-2 bg-light text-dark">
    <h5 class="modal-title">Orders Detail</h5>
    <ol>
      <h5>status</h5>
    </ol>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <table class="modal-body table-responsive">
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID ORDERS</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["id_pesanan"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">STATUS</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["status"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">jumlah</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["jumlah"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAMA</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["email_cs"]; ?></td>
        </tr>  
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ALAMAT</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama_produk"]; ?></td>
        </tr>  
      </table>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Understood</button>
  </div>
</div>
