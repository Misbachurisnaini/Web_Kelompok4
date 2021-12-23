<?php

 require "config/function.php";

 $id = $_GET['id'];

 $customer = query("SELECT * FROM customer WHERE id_customer = $id")[0];
 $customer2 = query("SELECT * FROM customer_detail WHERE id_customer = $id")[0];

?>

<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Dropshiper Detail</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body">
  <center style="margin-top: 39px;margin-bottom:100px"><img src="img/posting/<?=$customer['foto']?>" width="190px" height="190px"></center>

<div class="row">
  <div class="col-xl-6">
    <table class="modal-body table-responsive">
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ID DROPSHIPER</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["id_customer"];?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["username"];?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAMA</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["nama"]?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["email_cs"]?></td>
      </tr>     
    </table>
  </div>

  <div class="col-xl-6">
    <table class="modal-body table-responsive">
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ALAMAT</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["alamat"]?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">DATE REGISTER</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer["date_register"]?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ORDERS</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer2["orders"]?></td>
      </tr>
      <tr>
        <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">TOTAL SPEND</td>
        <td style="color: #052747;font-weight:600;font-size:18px">: <?=$customer2["total_spend"]?></td>
      </tr>
    </table>
  </div>
</div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Understood</button>
  </div>

  

</div>