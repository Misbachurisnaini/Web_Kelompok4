<?php
include 'koneksi.php';
$query = mysqli_query($konek, "SELECT * FROM pesanan,pesanan_detail") or die(mysqli_error($konek));
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
  <title>Orders Samauntung</title>
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
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Orders</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="thead-light">
                    <tr>
                      <th>NO ORDER</th>
                      <th>DATE</th>
                      <th>TOTAL</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = mysqli_query($konek, "SELECT * FROM pesanan,pesanan_detail") or die(mysqli_error($konek));
                    if(mysqli_num_rows($sql) > 0){
                      while($data=mysqli_fetch_array($query)){ ?>
                      <tr>
                        <td><b><?=$data["id_pesanan"]?></b></td>
                        <td><?=date('M d, Y', strtotime($data["tanggal_pesanan"]))?></td>
                        <td><?=$data["total"]?></td>
                        <td><span class="badge badge-secondary"><?=$data["status"]?></span></td>
                        <td><a href="edit_order.php?id_pesanan=<?=$data["id_pesanan"]?>" class="btn btn-primary"><i class="material-icons"></i>Edit</a>
                          <a class="btn btn-warning" id="set_dtl" data-toggle="modal" data-target="#order-detail"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="order-detail" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Orders Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                  <tbody>
                    <tr>
                      <th style="width:35%">Order Id</th>
                      <td><span id="id_pesanan"></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Product Id</th>
                      <td><span id="id_produk"></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Qty</th>
                      <td><span id="jumlah"></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Address</th>
                      <td><span id="alamat_lengkap"></td>
                    </tr>
                    <tr>
                      <th style="width:35%">Subtotal</th>
                      <td><span id="subtotal"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <script>
          $(document).ready(fuction() {
            $(document).on('click', '#set_dtl', fucntion() {
              var id_pesanan = $(this).data('id_pesanan');
              var id_produk = $(this).data('id_produk');
              var jumlah = $(this).data('jumlah');
              var alamat_lengkap = $(this).data('alamat_lengkap');
               var subtotal = $(this).data('subtotal');
               $('id_pesanan').text(id_pesanan);
               $('id_produk').text(id_produk);
               $('jumlah').text(jumlah);
               $('alamat_lengkap').text(alamat_lengkap);
               $('subtotal').text(subtotal);
            })
          })
        </script>

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