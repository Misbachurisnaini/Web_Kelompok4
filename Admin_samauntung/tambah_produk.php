<?php
include "koneksi.php";

session_start();
if(isset ($_POST['create']) ){
  $id = $_POST['id_produk'];
  $kategori = $_POST['id_kategori'];
  $nama = $_POST['nama_produk'];
  $gambar = $_POST['gambar_produk'];
  $deskripsi = $_POST['deskripsi_produk'];
  
  $query = "INSERT INTO produk VALUES ('', '$kategori', '$ukuran', '$nama', '$gambar', '$deskripsi')";
  $result = mysqli_query($konek, $query);
  header('Location: produk.php');
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
  <title>RuangAdmin - Tambah Produk</title>
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
        <div class="card-header"><h1 class="h5 mb-0 font-weight-bold text-gray-900">Tambah Produk</h1></div>
          
          <?php require "components/logout.php"?>
        </div>
        <!---Container Fluid-->
        <div class="container-fluid">
        <div class="col-lg-12">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
              <div class="card card-outline-secondary my-4">
                <div class="card-body">
                  <form id="form_validation" action="tambah_produk.php" method="POST">
                    
                  <!-- Tab panes for item details and image sections -->
                  <div class="tab-content">
                    <div id="itemDetailsTab" class="container-fluid tab-pane active"><br>
                  
                    <!-- Div to show the ajax message from validations/db submission -->
                    <div id="itemDetailsMessage"></div>
                    <form>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold">
                          <label for="itemImageFile">Foto Produk ( <span class="blueText">jpg</span>, <span class="blueText">jpeg</span>, <span class="blueText">gif</span>, <span class="blueText">png</span> only )</label>
                          <input type="file" class="form-control-file btn btn-dark" id="itemImageFile" name="itemImageFile">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold">
                          <label for="itemDetailsName">Nama Produk</label>
                          <input type="text" class="form-control" placeholder="Ex : Musae Chips - Milk" name="itemDetailsName" id="itemDetailsName" autocomplete="off" required>
                          <div id="itemDetailsNameSuggestionsDiv" class="customListDivWidth"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold">
                          <label for="itemDetailsName">Kategori Produk (Opsional) </label>
                          <input type="text" class="form-control" placeholder="Ex : Makanan & Minuman" name="itemDetailsCategory" id="itemDetailsItemCategory" autocomplete="off">
                          <div id="itemDetailsCategory" class="customListDivWidth"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold" style="display:inline-block">
                        <label for="itemDetailsDescription">Deskripsi Produk (Opsional)</label>
                        <textarea rows="4" class="form-control" placeholder="Ex : Weight : 90 g" name="itemDetailsDescription" id="itemDetailsDescription"></textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 font-weight-bold">
                        <label for="harga" class="control-label">Harga Produk</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                          </div>
                          <input type="number" class="form-control" id="harga" name="harga" placeholder="Ex : 15.000"  required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-12 font-weight-bold">
                      <label for="itemDetailsStock">Stok</label>
                      <input type="number" class="form-control" value="0" name="itemDetailsStock" id="itemDetailsStock" required>
                    </div>
                  </div>
                  <button class="btn btn-primary waves-effect" type="submit" name="create">Tambah Produk</button>
                  <a href="produk.php">
                    <button class="btn btn-danger waves-effect" type="button">Cancel</button>
                  </a>
                </form>
            </div>
          </div>
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

</body>

</html>