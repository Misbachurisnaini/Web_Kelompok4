<?php

 require "config/function.php";

 $id = $_GET['id'];
 $data_detail = query("SELECT * FROM pesanan_detail WHERE id_pesanan = $id ")[0];
// $data_detail = query("SELECT pesanan.alamat, pesanan_detail.id_pesanan, pesanan_detail.id_produk, pesanan_detail.jumlah, pesanan_detail.subtotal FROM pesanan RIGHT JOIN pesanan_detail ON pesanan_detail.id_pesanan = pesanan.id_pesanan ORDER BY pesanan.id_pesanan WHERE id_pesanan = $id ")[0];
//  while($row=mysqli_fetch_assoc($result)){
//   $nama_provinsi=$row['nama_provinsi']; 
//  }

?>

<!-- <div class="modal fade" id="order-detail" class="modal" tabindex="-1" role="dialog"> -->
          <!-- <div class="modal-dialog" role="document"> -->
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Orders Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                  <tbody>
                    <tr>
                      <th style="width:35%">Order Id</th>
                      <td><span id="id_pesanan"><?= $data_detail['id_pesanan']; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Product Id</th>
                      <td><span id="id_produk"><?= $data_detail['id_produk']; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Qty</th>
                      <td><span id="jumlah"><?= $data_detail['jumlah']; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Address</th>
                      <td><span id="alamat_lengkap"></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Subtotal</th>
                      <td><span id="subtotal"><?= $data_detail['subtotal']; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
        <!-- </div> -->

<!-- <div class="modal fade" id="order-detail" class="modal" tabindex="-1" role="dialog"> -->
    <!-- <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Orders Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:35%">Order Id</th>
                            <td><span id="id_pesanan"></td>
                        </tr>
                        <tr>
                            <th style="width:35%">Product Id</th>
                            <td><span id="id_produk"></td>
                        </tr>
                        <tr>
                            <th style="width:35%">Qty</th>
                            <td><span id="jumlah"></td>
                        </tr>
                        <tr>
                            <th style="width:35%">Address</th>
                            <td><span id="alamat_lengkap"></td>
                        </tr>
                        <tr>
                            <th style="width:35%">Subtotal</th>
                            <td><span id="subtotal"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->
<!-- </div> -->