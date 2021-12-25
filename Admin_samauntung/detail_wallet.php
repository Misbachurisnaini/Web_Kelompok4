<?php

 require "config/function.php";

 $id = $_GET['id'];

 $data = query("SELECT * FROM pesanan WHERE id_pesanan = $id")[0];


?>

<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Bukti Transaksi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body table-responsive">

  <center style="margin-top: 39px;margin-bottom:100px"><img src="img/posting/<?=$data['bukti_bayar']?>" width="190px" height="190px"></center>

  </div>
</div>
