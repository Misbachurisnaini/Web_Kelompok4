<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

require "config/function.php";

if (isset($_POST['simpan-produk'])) {
    if (tambahProduk($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            location = 'produk.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            // location = 'produk.php';
        </script>";
    }
}

if (isset($_POST['simpan-kategori'])) {
    $kategoriBaru = $_POST['kategori'];
    $simpan = "INSERT INTO kategori VALUES (0, '$kategoriBaru')";

    mysqli_query($conn, $simpan);
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="produk.php">Katalog Produk</a></li>
              <li class="breadcrumb-item">Tambah Produk</li>
            </ol>
          </div>
          
          <?php require "components/logout.php"?>
        </div>
        <!---Container Fluid-->
        <div class="container-fluid">
        <div class="col-lg-12">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
              <div class="card card-outline-secondary my-4">
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data" >
                      <div class="form-row">
                        <div class="form-group row mb-4">
                          <label class="col-md-4 font-weight-bold" for="gambar_produk">Upload foto produk</label>
                          <div class="col">
                            <input required name="image" type="file" class="form-control-file" id="gambar_produk">
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold">
                          <label class="col-md-4 col-form-label font-weight-bold" for="nama">Nama Produk</label>
                          <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-12 font-weight-bold">
                          <label class="col-md-4 font-weight-bold" for="kategori">Kategori</label>
                          <div class="select-kategori">
                            <select required name="kategori" class="form-control custom-select" id="nama_kategori">
                              <option class="text-center" value="">--- Pilih Kategori ---</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM kategori");
                                while ($dataKategori = mysqli_fetch_array($kategori)) {
                                ?>
                              <option value="<?= $dataKategori['id_kategori']; ?>"><?= ucwords($dataKategori['nama_kategori']); ?></option>
                                <?php } ?>
                            </select>
                          </div>

                          <div>
                            <br>
                          </div>

                          <!--Tombol Tambah kategori -->
                          <div class="d-flex flex-row-reverse mb-5">
                            <!-- Button tambah kategori -->
                            <button type="button" class="btn btn-outline-primary custom-btn ml-3" data-toggle="modal" data-target="#tambahKategori">
                              <i class="fa fa-fw fa-plus-square"></i>
                                <span>Kategori Baru</span>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-12 font-weight-bold">
                        <label class="col-md-4 font-weight-bold" for="harga">Deskripsi</label>
                        <textarea required name="deskripsi_produk" id="deskripsi_produk" rows="5" class="form-control"></textarea>
                      </div>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 font-weight-bold">
                        <label class="col-md-4 font-weight-bold" for="harga">Harga</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Rp</div>
                          </div>
                          <input maxlength="13" required type="number" min="1" name="harga" id="harga" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12 font-weight-bold">
                        <label class="col-md-4 font-weight-bold" for="stok">Stok</label>
                        <input maxlength="5" required type="number" min="1" name="stok" id="stok" class="form-control">
                      </div>
                    </div>
                    <div class="d-flex flex-row-reverse mb-5">
                      <button id="simpan-produk" name="simpan-produk" type="submit" class="btn btn-primary ml-3">Simpan</button>
                      <button type="reset" class="btn btn-secondary ml-3">Reset</button>
                      <a id="batal-produk" class="btn btn-outline-secondary" href="produk.php">Batal</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- Footer -->
    <?php require "components/footer.php"?>
    <!-- Footer -->
    </div>

    <!-- Pop-up tambah kategori -->
    <div class="modal fade" id="tambahKategori" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
            <button id="close-kategori" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="kategori" id="inputKategori" class="form-control" placeholder="Masukkan kategori baru...">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button name="simpan-kategori" type="submit" id="simpan-kategori" class="btn btn-primary">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
                <!-- /Tambah kategori -->

  </div>


 <!-- Scroll to top -->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

  <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>