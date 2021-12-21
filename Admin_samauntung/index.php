<?php 
session_start();

require "config/function.php";

if (!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}
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
  <title>SAMAUNTUNG</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.css" rel="stylesheet">
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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <?php if ($_SESSION['jenis-akun'] == 1 ) { ?>
            <ol class="breadcrumb">
              <a href="manageadmin.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Manage Admin </a>
            </ol>
            <?php } ?>
          </div>

                    <!-- card row 1 -->
          <div class="row">
            <div class="col-xl-12 mb-2">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-dark">Status Pesanan</h6>
                </div>
                <div class="card-body">
                  <div class="row justify-content-center">

                  <?php
                  $monthlyTrans = query("SELECT total FROM pesanan WHERE MONTH(tanggal_pesanan) = MONTH(CURRENT_TIMESTAMP) AND status = 'selesai'");
                  $monthlySum = 0;
                  for ($i = 0; $i < count($monthlyTrans); $i++) {
                    $monthlySum = $monthlySum + $monthlyTrans[$i]['total'];
                  }
                  ?>
                    <!-- Pendapatan Bulan ini -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=dikonfirmasi">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pendapatan Bulan Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($monthlySum, 0, "", ","); ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-calendar fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php $pesanan = count(query("SELECT id_pesanan FROM pesanan WHERE MONTH(tanggal_pesanan) = MONTH(CURRENT_TIMESTAMP) AND status = 'selesai'")); ?>
                    <!-- Total Transaksi -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-danger shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=tertunda">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Transaksi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pesanan; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-handshake fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=menunggu">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pesanan Menunggu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-clipboard fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    
                    <!-- Pesanan Diproses -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-info shadow-sm h-100 py-2">
                        <a class="text-decoration-none" href="pesanan.php?status=diproses">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pesanan Diproses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-cogs fa-4x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- </div> -->

          <!-- Modal Logout -->
          <?php require "components/logout.php"?>
        </div>
        <!---Container Fluid-->
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
  
</body>

</html>