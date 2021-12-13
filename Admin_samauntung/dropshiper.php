
<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

$data = query(" SELECT * FROM dropshiper ");

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
            <h1 class="h3 mb-0 text-gray-800">Dropshiper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Dropshiper</li>
            </ol>
          </div>

          <!-- Modal Logout -->
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->


        <div class="col-lg-6">
              <!-- Modal New Dropshiper -->
          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Rekomendasi Dropshiper Baru</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" >
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Username</th>
                      <th scope="col">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1 ?>
                  <?php foreach($data as $p) : ?>
                    <tr>
                      <th scope="row"><?= $i++ ?></th>
                      <th><?= $p['username']; ?></th>
                      <th>
                        <a href="newdropshiper.php" type="button" class="btn btn-primary text-white" data-tooltip="tooltip" data-placement="buttom" >
                          Tampilkan
                        </a>
                      </th>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container-fluid">
        <div class="custom-table card shadow ms-1">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">
              Manage Dropshiper
            </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" >
                <div class="py-2">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"
                    id="#modalLong">New Dropshiper</button>
                </div>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1 ?>
                  <?php foreach($data as $p) : ?>
                  <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <th><?= $p['username']; ?></th>
                    <th><?= $p['email']; ?></th>
                    <th><?= $p['nohp']; ?></th>
                    <th><?= $p['alamat']; ?></th>
                    <th><?= $p['levelship']; ?></th>
                    <th>
                      <a href="hapus_dropshiper.php" type="button" class="btn btn-danger text-white" data-tooltip="tooltip" data-placement="buttom" >
                        <i class="fas fa-solid fa-trash"></i>
                      </a>
                    </th>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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

</body>

</html>