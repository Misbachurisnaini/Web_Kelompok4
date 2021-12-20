<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

$data = query(" SELECT * FROM user ");

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
  <title>RuangAdmin - Blank Page</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">Admin Samauntung</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Admin Samauntung</li>
            </ol>
          </div>

          <!-- Modal Logout -->
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->
        <div class="container-fluid">
        <div class="custom-table card shadow ms-1">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">
              Manage Admin
            </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" >
                <div class="py-2">
                  <a href="addadmin.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                  <i class="fas fa-download fa-sm text-white-50"></i> Tambahkan User Admin </a>
                </div>
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th>Role</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1 ?>
                  <?php foreach($data as $p) : ?>
                  <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <th><?= $p['user_name']; ?></th>
                    <th><?= $p['email']; ?></th>
                    <th><?= $p['user_level']; ?></th>
                    <th>
                      <a href="editadmin.php?id=<?= $p['id_user']; ?>" type="button" class="btn btn-primary text-white" data-tooltip="tooltip" data-placement="buttom" >
                        <i class="fas fa-solid fa-pen"></i>
                      </a>
                      <a href="hapusadmin.php?id=<?= $p['id_user']; ?>" type="button" class="btn btn-danger text-white" data-tooltip="tooltip" data-placement="buttom" >
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
  <!-- Script tabel produk -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>