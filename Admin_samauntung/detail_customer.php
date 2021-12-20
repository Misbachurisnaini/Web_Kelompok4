<?php

 require "config/function.php";

?>

<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Dropshiper Detail</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
                      
  <?php 
    $query = "SELECT * FROM customer";
                      
    $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
    while ($data = mysqli_fetch_array($sql_rm)) {
  ?>
  <center style="margin-top: 39px;margin-bottom:100px"><img src="img/posting/<?=$data['foto']?>" width="190px" height="190px"></center>
  <?php } ?>

  <div class="row">
    <div class="col-xl-6">
      <table class="modal-body table-responsive">
      <?php 
        $query = "SELECT * FROM customer";
                      
        $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
        while ($data = mysqli_fetch_array($sql_rm)) {
      ?>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID DROPSHIPER</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["id_customer"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["username"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAMA</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["nama"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["email_cs"]?></td>
        </tr>     
      <?php } ?>   
      </table>
    </div>

    <div class="col-xl-6">
      <table class="modal-body table-responsive">
      <?php 
        $query = "SELECT * FROM customer_detail
        INNER JOIN customer ON customer_detail.id_customer = customer.id_customer
        ";
                      
        $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
        while ($data = mysqli_fetch_array($sql_rm)) {
      ?>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ALAMAT</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["alamat"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">DATE REGISTER</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["date_register"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ORDERS</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["orders"]?></td>
        </tr>
        <tr>
          <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">TOTAL SPEND</td>
          <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["total_spend"]?></td>
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