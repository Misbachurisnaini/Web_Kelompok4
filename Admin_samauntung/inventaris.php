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
    <?php require "components/sidebar.php"?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php require "components/topbar.php"?>
        <!-- Topbar -->
    

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="container-fluid">
        <h1 class="mt-4"> Update Stock</h1>
    <td>

    <div class="card mb-4">
    <input input class="search" type="text" placeholder="Cari produk" required >
    <input class="button" type="button" value="Cari">
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thread>
                  <tr>
                      <th>Nama Produk</th>
                      <th>Stok Awal</th>
                      <th>Tindakan</th>
                      <th>Stok Terkini</th>
                  </tr>
              </thread> 
              <tbody>
              <?php 
                include "config/function.php";
                $sql="select * from produk order by id_produk desc";
                
                $hasil=mysqli_query($conn,$sql);
                $no=0;
                while ($data = mysqli_fetch_array($hasil)) {
                $no++;

                ?>
                <tbody>
                  <tr>  
                    
                    <td><?php echo $data["nama_produk"]; ?></td> 
                    <td><?php echo $data["stok_awal"]; ?></td>
                    <td><?php echo $data["deskripsi_produk"];   ?></td> 
                    <td><?php echo $data["stok_terkini"]; ?></td>

                    
                  </tr>
                </tbody>  
                <?php 
                }
                ?>
            </table>
        </div>
    <div>
        <div class="text-right">
        <td>  
            <a href="update-produk.php?id_produk_detail=<?php echo $data['id_produk']; ?>" class="btn btn-warning" role=" button">Update</a>
        </td>     

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>