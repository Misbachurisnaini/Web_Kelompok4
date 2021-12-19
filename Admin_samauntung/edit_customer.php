<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}



require "config/function.php";

if (!(isset($_GET['id']))) {
    header("Location:customer.php");
    exit;
}

$id = $_GET['id'];


$data = query("SELECT * FROM customer WHERE id_customer")[0];
$data2 = query("SELECT * FROM customer_detail WHERE id_customer_detail")[0];

if (isset($_POST['simpan-produk'])) {
    if (editcustomer($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diedit!');
            location = 'customer.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal diedit!');
            // location = 'customer.php';
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
  <title>Ubah Customer Samauntung</title>
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
            <h1 class="h3 mb-0 text-gray-800">Ubah Dropshiper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Customer</li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Dropshiper</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id_customer" value="<?= $data["id_customer"] ?>">
                <input type="hidden" name="id_customer_detail" value="<?= $data2["id_customer_detail"] ?>">
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control"  name="image">
                    <input type="hidden" name="image-old" value="<?= $data["foto"] ?>">
                  </div>
                  <div class="form-group required">
                    <label for="nama" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex :  Charles" required value="<?=$data["nama"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email_cs" placeholder="Ex :  test@test.com" required value="<?=$data["email_cs"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="alamat" class="control-label">alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Ex :  Indonesia" value="<?=$data["alamat"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="orders" class="control-label">Order</label>
                    <input type="number" class="form-control" id="orders" name="orders" placeholder="Ex :  1" value="<?=$data2["orders"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="total_spend" class="control-label">Total Spend</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="total_spend" name="total_spend" placeholder="Ex :  15.000"  required value="<?=$data2["total_spend"]?>">
                    </div>
                  </div>
                  
                  <div style="display:flex;justify-content:right;margin-top:25px">
                    <button type="reset" class="btn btn-outline-dark" style="margin-right: 25px;">Batal</button>
                    <button type="submit"  name="simpan-produk" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
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
</body>

</html>