<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

require "config/function.php";

$id = $_GET['id'];

$pesanan = query("SELECT * FROM pesanan WHERE id_pesanan = $id")[0];

if (isset($_POST['simpan-produk'])) {
    if (editorders($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diedit!');
            location = 'orders.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal diedit!');
            location = 'orders.php';
        </script>";
    }
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
            <h1 class="h3 mb-0 text-gray-800">Edit Orders</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="orders.php">Orders</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
          </div>
 
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <form action="" method="POST"  enctype="multipart/form-data">
                  <input type="hidden" name="id_pesanan" value="<?= $pesanan["id_pesanan"] ?>">
                  <div class="form-group">
                  <label for="status">Ubah Status Transaksi</label>
                    <select class="form-control" name="status" required ">
                      <option value="<?= $pesanan['status'] ?>"><?= $pesanan['status'] ?></option>
                      <option value="Belum bayar">Belum bayar</option>
                      <option value="Sudah bayar">Sudah bayar</option>
                      <option value="Pengiriman">Pengiriman</option>
                      <option value="Selesai">Selesai</option>
                    </select>
                        </div>
                        <div class="form-group">
                    <label for="bukti_bayar">Image</label>
                    <input type="file" class="form-group-file"  name="image">
                    <input type="hidden" name="image-old" value="<?= $pesanan["bukti_bayar"] ?>">
                  </div>
                    <div class="d-flex flex-row-reverse mb-5">
                      <button id="simpan-produk" name="simpan-produk" type="submit" class="btn btn-primary ml-3">Save</button>
                        <button type="reset" class="btn btn-secondary ml-3">Reset</button>
                        <a id="batal-produk" class="btn btn-outline-secondary" href="orders.php">Cancel</a>
                    </div>
                  </form>
                </div>
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
  <script>
        $(document).ready(function() {
            $("select#status option[value='<?= $kat; ?>']").attr("selected", "selected");
        });
  </script>
  <script>
    $(document).ready(function() {
      $('.tambahbtn').on('click',function() {
        $('#tambahstatus').modal('show');
      });
    });
  </script>
</body>

</html>