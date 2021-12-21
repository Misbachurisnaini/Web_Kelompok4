<?php

 require "config/function.php";

?>

<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Bukti Transaksi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body table-responsive">

  <?php 
  $query = "SELECT * FROM pesanan";
                                
  $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
  while ($data = mysqli_fetch_array($sql_rm)) {
  ?>

  <center style="margin-top: 39px;margin-bottom:100px"><img src="img/bukti_bayar/<?=$data['bukti_bayar']?>" width="190px" height="190px"></center>
              
  <?php } ?>

  </div>
</div>
