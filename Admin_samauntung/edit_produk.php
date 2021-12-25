<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php'; 
if(isset($_POST["nama"])) {
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];
  $dirUpload = "img/posting/";
  $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
  if ($terupload) {
    $sql = "UPDATE produk 
    SET id_kategori = ".($_POST["kategori"]!=null?$_POST["kategori"]:"null").",
    nama_produk = '".$_POST["nama"]."',
    gambar_produk = '".$namaFile."',
    deskripsi_produk = '".$_POST["deskripsi"]."'
    WHERE id_produk = ".$_GET['id'];
    if (mysqli_query($konek, $sql)){
      $sql = "UPDATE produk SET harga = ".$_POST["harga"].", stok = ".$_POST["stok"]." WHERE id_produk = ".$_GET['id'];
      if(mysqli_query($konek, $sql)){
        // echo '<script>alert("Data berhasil ditambah")</script>';
       echo "<script>
       alert('Data berhasil diubah');
       window.location.href='produk.php';
       </script>";
     }else{
        // echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
      echo "<script>
      alert('Error:".mysqli_error($konek)."');
      window.location.href='produk.php';
      </script>";
    }
  } else {
      // echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
    echo "<script>
    alert('Error:".mysqli_error($konek)."');
    window.location.href='produk.php';
    </script>";
  }
} else {
    // echo "<script>alert('UPLOAD FILE GAGAL')</script>";
 echo "<script>
 alert('UPLOAD FILE GAGAL');
 window.location.href='produk.php';
 </script>";
}
}
$sql = "SELECT produk.deskripsi_produk, produk.nama_produk, produk.id_kategori, produk.harga, produk.stok FROM produk WHERE produk.id_produk = ".$_GET['id'];
$query = mysqli_query($konek, $sql);
$data=mysqli_fetch_array($query);

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
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="produk.php">Product Catalogue</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="card-body">
                <form action="edit_produk.php?id=<?=$_GET['id']?>" method="post"  enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="foto">Image Product</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto">
                      <label class="custom-file-label" for="foto">choose photo</label>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label for="nama" class="control-label">Product Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex :  Musae Chips - Milk" required value="<?=$data["nama_produk"]?>">
                  </div>
                  <div class="form-group">
                          <label for="kategori">Categories</label>
                          <div class="select-kategori">
                            <select required name="kategori" class="form-control custom-select" id="nama_kategori">
                              <option class="text-center" value="">---Choose Categories ---</option>
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
                                <span>Add New Categories</span>
                            </button>
                          </div>
                      </div>
                  <div class="form-group">
                    <label for="stok" class="control-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Ex :  100" required value="<?=$data["stok"]?>">
                  </div>
                  <div class="form-group required">
                    <label for="harga" class="control-label">Harga Produk</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="harga" name="harga" placeholder="Ex :  15.000"  required value="<?=$data["harga"]?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi" class="control-label">Deskripsi Produk (Opsional)</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder="Ex :  Weight  : 90 g"><?=$data["deskripsi_produk"]?></textarea>
                  </div>
                  <div class="d-flex flex-row-reverse mb-5">
                  <button type="submit" class="btn btn-success ml-3">Save</button>
                      <button type="reset" class="btn btn-secondary ml-3">Reset</button>
                      <a id="batal-produk" class="btn btn-outline-secondary" href="produk.php">Cancel</a>
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