<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$query = mysqli_query($konek, "SELECT 
  COUNT(customer_detail.id_customer) as total,
  AVG(customer_detail.orders) as avg_order,
  AVG(customer_detail.total_spend) as avg_spend,
  AVG(customer_detail.total_spend/customer_detail.orders) as aov
  FROM customer_detail,user WHERE customer_detail.id_customer = user.id_user AND user.user_level = 'user'");
$data_analyzed=mysqli_fetch_array($query);
$query = mysqli_query($konek, "SELECT user.id_user,user.user_name,user.email,customer_detail.nama,customer_detail.foto,customer_detail.last_active FROM user,customer_detail WHERE user.id_user=customer_detail.id_customer AND user.user_level = 'user'");
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
  <title>Customer Samauntung</title>
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
            <h1 class="h3 mb-0 text-gray-800">Dropshiper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <!-- <li class="breadcrumb-item">Customer</li> -->
              <li class="breadcrumb-item active" aria-current="page">Dropshiper</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
               <div class="card-body">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>LAST ACTIVE</th>
                        <th>EMAIL</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($data=mysqli_fetch_array($query)){ ?>
                        <tr>
                          <td><img src="uploads/<?=$data["foto"]?>" width="50px" height="50px"></td>
                          <td><b><?=$data["nama"]?></b></td>
                          <td><?=$data["user_name"]?></td>
                          <td><?=date('M d, Y', strtotime($data["last_active"]))?></td>
                          <td style="color:#00A3FF"><?=$data["email"]?></td>
                          <td><a href="detail_customer.php?id=<?=$data["id_user"]?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            <a href="edit_customer.php?id=<?=$data["id_user"]?>" class="btn btn-primary">
                              <i class="material-icons"></i>EDIT
                            </a>
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
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>