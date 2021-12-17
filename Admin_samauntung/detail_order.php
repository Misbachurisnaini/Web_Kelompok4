<?php

 require "config/function.php";

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
                <table class="table table-bordered no-margin" id="dataTableHover">
                  <tbody>
                  <?php 
                  $query = "SELECT * FROM pesanan_detail 
                  INNER JOIN produk ON pesanan_detail.id_produk = produk.id_produk
                  INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer
                  ";
                  
                  $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
                  while ($data = mysqli_fetch_array($sql_rm)) {
                  ?>
                    <tr>
                      <th style="width:35%">Order Id</th>
                      <td><?= $data["id_pesanan"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Product Id</th>
                      <td><?= $data["nama_produk"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Qty</th>
                      <td><?= $data["jumlah"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Address</th>
                      <td><?= $data["alamat"]; ?></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Subtotal</th>
                      <td><?= $data["subtotal"]; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
        <!-- </div> -->

        <script>
  $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

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