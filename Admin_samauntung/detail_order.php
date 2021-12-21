<?php

 require "config/function.php";

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
      <?php 
                  $query = "SELECT * FROM pesanan_detail 
                  INNER JOIN produk ON pesanan_detail.id_produk = produk.id_produk
                  INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer
                  ";
                  
                  $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
                  while ($data = mysqli_fetch_array($sql_rm)) {
                  ?>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID DROPSHIPER</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["id_pesanan"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama_produk"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAMA</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["jumlah"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["alamat"]; ?></td>
                    </tr>  
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["subtotal"]; ?></td>
                    </tr>  
                    <?php } ?>
      </table>
    </div>
    <div class="col-xl-6">
      <table class="modal-body table-responsive">
      <?php 
                  $query = "SELECT * FROM pesanan_detail 
                  INNER JOIN produk ON pesanan_detail.id_produk = produk.id_produk
                  INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer
                  ";
                  
                  $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
                  while ($data = mysqli_fetch_array($sql_rm)) {
                  ?>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID DROPSHIPER</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["id_pesanan"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["nama_produk"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAMA</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["jumlah"]; ?></td>
                    </tr>
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["alamat"]; ?></td>
                    </tr>  
                    <tr>
                      <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                      <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["subtotal"]; ?></td>
                    </tr>  
                    <?php } ?>
      </table>
    </div>
  </div>
  <div class="modal-footer">
  <?php 
  $query = "SELECT * FROM customer";
                      
  $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
  while ($data = mysqli_fetch_array($sql_rm)) {
  ?>
    <a href="edit_customer.php?id=<?= $data['id_customer']; ?>" class="btn btn-primary"><i class="material-icons"></i>Edit</a>
  <?php } ?>
  </div>
</div>
