<?php
session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

$a = query(" SELECT * FROM pesanan ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>samauntung</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php require "components/sidebar.php"?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php require "components/topbar.php"?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wallet</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Wallet</li>
            </ol>
          </div>

          <!-- Modal Logout -->
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->
        <div class="container-fluid">
          <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                <div class="table-resposive">
                  <thead>
                  <h6 class="m-0 font-weight-bold text-primary">Total Balanced</h6>
                  <br>
                </thead>  
                <tbody>
                  <h1>
                    Rp. 60.000,00
                  </h1>
                </tbody>
                </div>
                
              </div>
              
            </div>
          </div>
          
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Transaction History</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $i=1 ?>
                      <?php 
                      $query = "SELECT * FROM pesanan_detail 
                      INNER JOIN produk ON pesanan_detail.id_produk = produk.id_produk
                      INNER JOIN pesanan ON pesanan_detail.id_pesanan = pesanan.id_pesanan
                      INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer
                      ";
                      
                      $sql_rm = mysqli_query($conn, $query) or die (mysqli_error($conn));
                      while ($data = mysqli_fetch_array($sql_rm)) {
                      ?>
                      <tr>
                        <td scope="row"><?= $i++ ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['email_cs']; ?></td>
                        <td><?=date('M d, Y', strtotime($data["tanggal_pesanan"]))?></td>
                        <td><?= $data['total']; ?></td>
                        <td>
                          <a href="detail_wallet.php?id=<?=$data["id_pesanan"]?>" type="button" class="btn btn-primary text-white" data-tooltip="tooltip" data-placement="buttom" data-toggle="modal" data-target="#order-detail" >
                          <i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="order-detail" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div> 
          </div> 
        </div> 

      </div>
      <!-- Footer -->
      <?php require "components/footer.php"?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- js untuk jquery -->
<script src="js/jquery-1.11.2.min.js"></script>
	<!-- js untuk bootstrap -->
	<script src="js/bootstrap.js"></script>
<!-- Page level custom scripts -->

</body>

</html>