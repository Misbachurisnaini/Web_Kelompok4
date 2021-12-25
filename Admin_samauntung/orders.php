<?php
session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
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
                      <th>NO</th>
                      <th>ID ORDER</th>
                      <th>USERNAME</th>
                      <th>DATE IN</th>
                      <th>DELIVERED AT</th>
                      <th>TOTAL</th>
                      <th>STATUS</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
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
                        <td scope="row"><b><?= $i++ ?></b></td>
                        <td><b><?=$data["id_pesanan"]?></b></td>
                        <td><b><?=$data["username"]?></b></td>
                        <td><?=date('M d, Y', strtotime($data["tanggal_pesanan"]))?></td>
                        <td><?=date('M d, Y', strtotime($data["tanggal_terima"]))?></td>
                        <td><?=$data["total"]?></td>
                        <td><span class="badge badge-secondary"><?=$data["status"]?></span></td>
                        <td><a href="edit_order.php?id=<?=$data["id_pesanan"]?>" class="btn btn-primary"><i class="fas fa-solid fa-pen"></i></a>
                          <a href="detail_order.php?id=<?=$data["id_pesanan_detail"]?>" class="btn btn-warning" id=set_dtl" data-toggle="modal" data-target="#order-detail"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        
        <div class="modal fade" id="order-detail" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
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

<!-- <script type="text/javascript">
		$(document).ready(function(){
			$('a#edit_data').click(function(){
				var url = $(this).attr('href');
				$.ajax({
					url : url,
					success:function(response){
						$('#modal_provinsi').html(response);
					}
				});
			});
			
		});
	</script> -->
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
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>