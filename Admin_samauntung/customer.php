<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

$cos = query("SELECT * FROM customer");

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
            <h1 class="h3 mb-0 text-gray-800">Dropshipper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dropshipper</li>
            </ol>
          </div>


          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th> </th>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>DATE REGISTER</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cos as $data) : ?>
                      <tr>
                        <td><img src="img/posting/<?=$data['foto']?>" width="50px" height="50px"></td>
                        <td><?=$data["username"]?></td>
                        <td><?=$data["email_cs"]?></td>
                        <td><?=$data["date_register"]?></td>
                        <td>
                          <a href="edit_customer.php?id=<?= $data['id_customer']; ?>" class="btn btn-primary"><i class="fas fa-solid fa-pen"></i></a>
                          <a href="detail_customer.php?id=<?= $data['id_customer']; ?>" class="btn btn-warning" id=set_dtl" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-eye"></i></a>
                          <a type="button" class="btn btn-danger text-white" onclick="return confirm('konfirmasi hapus, apakah anda ingin menghapus figure')" href="hapuscustomer.php?id=<?= $data['id_customer'];?>" >
                            <i class="fas fa-solid fa-trash"></i>
                          </a>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              </div> 
            </div> 
          </div>

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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- js untuk jquery -->
  <script src="js/jquery-1.11.2.min.js"></script>
	<!-- js untuk bootstrap -->
	<script src="js/bootstrap.js"></script>
  <!-- Page level custom scripts -->
  <script>
  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
  </script>
</body>

</html>