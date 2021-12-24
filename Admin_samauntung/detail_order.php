<?php

 require "config/function.php";

 $id = $_GET['id'];

 $pesanan = query("SELECT * FROM pesanan WHERE id_pesanan = $id")[0];
 $detail = query("SELECT * FROM pesanan_detail WHERE id_pesanan = $id")[0];

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
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["user_name"]; ?></td>
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
          <td style="color: #052747;font-weight:600;font-size:18px">: <?= $data["alamat"]; ?></td>
        </tr>  
      </table>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Understood</button>
  </div>
</div>
