
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
              <li class="breadcrumb-item">Orders</li>
              <li class="breadcrumb-item active" aria-current="page">Edit Orders</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="card-body">
                <form action="edit_order.php?id=<?=$_GET['id']?>" method="post"  enctype="multipart/form-data">
                  <div class="form-group required">
                    <label for="produk" class="control-label">Id Produk</label>
                    <input type="text" class="form-control" id="produk" name="produk" required value="<?=$data["id_produk"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="tanggaldt" class="control-label">Tanggal Terima</label>
                    <input type="text" class="form-control" id="tanggaldt" name="tanggaldt" required value="<?=$data["tanggal_terima"]?>">
                  </div>
                  <div class="form-group">
                    <label for="status" class="control-label">Status</label>
                    <input type="number" class="form-control" id="status" name="status" required value="<?=$data["status"]?>">
                  </div>
                  <div class="form-group">
                    <label for="qty" class="control-label">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" required value="<?=$data["jumlah"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="ongkir" class="control-label">Ongkir</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="ongkir" name="ongkir" placeholder="Ex :  15.000"  required value="<?=$data["ongkir"]?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="control-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat"><?=$data["alamat_lengkap"]?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="bukti" class="control-label">Bukti Bayar</label>
                    <input type="number" class="form-control" id="bukti" name="bukti" placeholder="Ex :  Tidak Ada" required value=" <?=$data["bukti_bayar"]?>">
                  </div>
                  <div class="form-group">
                    <label for="keterangan" class="control-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"><?=$data["keterangan"]?></textarea>
                  </div>
                  <div style="display:flex;justify-content:right;margin-top:25px">
                    <button type="reset" class="btn btn-outline-dark" style="margin-right: 25px;">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </form>
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