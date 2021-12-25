<?php

 require "config/function.php";

 $id = $_GET['id'];

$data = query("SELECT a.*, b.id_pesanan, b.status, b.total, b.ongkir, c.nama, c.email_cs, c.alamat, d.nama_produk FROM pesanan_detail a
INNER JOIN pesanan b ON a.id_pesanan = b.id_pesanan
INNER JOIN customer c ON a.id_customer = c.id_customer
INNER JOIN produk d ON a.id_produk = d.id_produk
AND a.id_pesanan_detail = '$id'")[0];


?>

<div class="modal-content">
  <div class="modal-header p-3 mb-2 bg-light text-dark">
    <h5 class="modal-title">Order Detail</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="col-xl-6">
      <table class="modal-body table-responsive">
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID Order</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["id_pesanan"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Status</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["status"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Name</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Email</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["email_cs"]; ?></td>
        </tr>  
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Address</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama_produk"]; ?></td>
        </tr>  
      </table>
    </div>

    <div class="table-responsive p-3">
      <table class="table align-items-center table-flush table-hover">
        <thead class="thead-light">
          <tr>
            <th>NO</th>
            <th>product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1 ?>
          <tr>
            <td scope="row"><b><?= $i++ ?></b></td>
            <td><b><?=$data["nama_produk"]?></b></td>
            <td><b><?=$data["jumlah"]?></b></td>
            <td><b><?=$data["subtotal"]?></b></td>
          </tr>
        </tbody>
      </table>
    </div>
    
    <!-- <div class="row"> -->
    <div class="col-xl-6">
      <table class="modal-body table-responsive">
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Total Price</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["subtotal"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Ongkir</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["ongkir"]; ?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">Total Transaction</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["total"]; ?></td>
        </tr>
      </table>
    </div>
  <!-- </div> -->
 
</div>
