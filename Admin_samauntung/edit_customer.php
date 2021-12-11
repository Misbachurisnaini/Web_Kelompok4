<?php
include 'koneksi.php'; 
if(isset($_POST["nama"])) {
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];
  $dirUpload = "uploads/";
  $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
  if ($terupload) {
    $sql = "UPDATE user
    SET user_email = '".$_POST["email"]."' 
    WHERE id_user = ".$_GET['id'];
    if (mysqli_query($konek, $sql)){
      $sql = "UPDATE customer_detail
      SET nama = '".$_POST["nama"]."',
      foto = '".$namaFile."',
      orders = ".$_POST["orders"].",
      total_spend = ".$_POST["total_spend"].",
      region = '".$_POST["region"]."',
      city = '".$_POST["city"]."',
      postal = '".$_POST["postal"]."'
      WHERE id_customer = ".$_GET['id'];
      if(mysqli_query($konek, $sql)){
        // echo '<script>alert("Data berhasil diubah")</script>';
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='customer.php';
        </script>";
      }else{
        // echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
        echo "<script>
        alert('Error:".mysqli_error($konek)."');
        window.location.href='customer.php';
        </script>";
      }
    } else {
      // echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
      echo "<script>
      alert('Error:".mysqli_error($konek)."');
      window.location.href='customer.php';
      </script>";
    }
  } else {
    // echo "<script>alert('UPLOAD FILE GAGAL')</script>";
    echo "<script>
    alert('UPLOAD FILE GAGAL');
    window.location.href='customer.php';
    </script>";
  }
}
$query = mysqli_query($konek, "SELECT * FROM user,customer_detail WHERE user.id_user=customer_detail.id_customer AND user.user_level = 'user' AND user.id_user = ".$_GET['id']);
$data=mysqli_fetch_array($query);
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
                <form action="edit_customer.php?id=<?=$_GET['id']?>" method="post"  enctype="multipart/form-data">
                 <div class="form-group">
                  <label for="foto">Foto</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto" name="foto">
                    <label class="custom-file-label" for="foto">Pilih foto</label>
                  </div>
                </div>
                <div class="form-group required">
                  <label for="nama" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex :  Charles" required value="<?=$data["nama_produk"]?>">
                </div>
                <div class="form-group required">
                  <label for="email" class="control-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Ex :  test@test.com" required value="<?=$data["user_email"]?>">
                </div>
                <div class="form-group required">
                  <label for="orders" class="control-label">Order</label>
                  <input type="number" class="form-control" id="orders" name="orders" placeholder="Ex :  1" value="<?=$data["orders"]?>">
                </div>
                <div class="form-group required">
                  <label for="total_spend" class="control-label">Total Spend</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rp</div>
                    </div>
                    <input type="number" class="form-control" id="total_spend" name="total_spend" placeholder="Ex :  15.000"  required value="<?=$data["total_spend"]?>">
                  </div>
                </div>
                <div class="form-group required">
                  <label for="region" class="control-label">Country / Region</label>
                  <input type="text" class="form-control" id="region" name="region" placeholder="Ex :  Indonesia" value="<?=$data["region"]?>">
                </div>
                <div class="form-group required">
                  <label for="city" class="control-label">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Ex :  Jakarta" value="<?=$data["city"]?>">
                </div>
                <div class="form-group required">
                  <label for="postal" class="control-label">Postal</label>
                  <input type="number" class="form-control" id="postal" name="postal" placeholder="Ex :  12345" value="<?=$data["postal"]?>">
                </div>
                <div style="display:flex;justify-content:right;margin-top:25px">
                  <button type="reset" class="btn btn-outline-dark" style="margin-right: 25px;">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>
  $('#foto').on('change',function(){
                        //get the file name
                        var fileName = $(this).val();
                        //replace the "Choose a file" label
                        $(this).next('.custom-file-label').html(fileName);
                      })
                    </script>
                  </body>

                  </html>