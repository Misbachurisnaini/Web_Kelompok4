<?php
include 'koneksi.php';
if(isset($_POST["nama"])) {
  $namaFile = $_FILES['foto']['name'];
  $namaSementara = $_FILES['foto']['tmp_name'];
  $dirUpload = "uploads/";
  $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
  if ($terupload) {
    $sql = "INSERT INTO produk 
    (id_kategori, nama_produk, gambar_produk, deskripsi_produk) 
    VALUES
    (".($_POST["kategori"]!=null?$_POST["kategori"]:"null").",'".$_POST["nama"]."','".$namaFile."','".$_POST["deskripsi"]."')";
    if (mysqli_query($konek, $sql)){
      $sql = "INSERT INTO produk_detail (id_produk, stok, harga) VALUES (LAST_INSERT_ID(),".$_POST["stok"].",".$_POST["harga"].")";
      if(mysqli_query($konek, $sql)){
        // echo '<script>alert("Data berhasil ditambah")</script>';
        echo "<script>
        alert('Data berhasil ditambah');
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
<<<<<<< HEAD
        <div class="card-header"><h1 class="h5 mb-0 font-weight-bold text-gray-900">Tambah Produk</h1></div>
        <div class="col-lg-12">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
              <div class="card card-outline-secondary my-4">
                <div class="card-body">
                <!-- Tab panes for item details and image sections -->
                <div class="tab-content">
                  <div id="itemDetailsTab" class="container-fluid tab-pane active"><br>
                  
                  <!-- Div to show the ajax message from validations/db submission -->
                  <div id="itemDetailsMessage"></div>
                  <form>
                  <div class="form-group font-weight-bold">
									<label>Gambar</label>
									<input name="uploadgambar" type="file" class="form-control">
								</div>
                    <div class="form-row">
                      <div class="form-group col-md-9 font-weight-bold" style="display:inline-block">
                      <label for="itemDetailsName">Nama Produk</label>
                      <input type="text" class="form-control" placeholder="Ex : Musae Chips - Milk" name="itemDetailsName" id="itemDetailsName" autocomplete="off">
                      <div id="itemDetailsNameSuggestionsDiv" class="customListDivWidth"></div>
                    </div>
                    <div class="form-group col-md-3 font-weight-bold" >
                      <label for="itemDetailsProductID">ID Produk</label>
                      <input class="form-control invTooltip"  type="number" readonly required value="<?php echo $format;?>" id="itemDetailsProductID" name="itemDetailsProductID" title="This will be auto-generated when you add a new item">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12 font-weight-bold">
                      <label for="itemDetailsName">Kategori Produk</label>
                      <input type="text" class="form-control" placeholder="Ex : Makanan & Minuman" name="itemDetailsCategory" id="itemDetailsItemCategory" autocomplete="off">
                      <div id="itemDetailsCategory" class="customListDivWidth"></div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12 font-weight-bold" style="display:inline-block">
                    <label for="itemDetailsDescription">Deskripsi Produk</label>
                    <textarea rows="4" class="form-control" placeholder="Ex : Weight : 90 g" name="itemDetailsDescription" id="itemDetailsDescription"></textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4 font-weight-bold">
                    <label for="itemDetailsPrice">Harga Produk</label>
                    <input type="text" class="form-control" placeholder="Ex : 15000 " name="itemDetailsPrice" id="itemDetailsPrice">
                  </div>
                  <div class="form-group col-md-4 font-weight-bold">
                    <label for="itemDetailsStock">Stok</label>
                    <input type="number" class="form-control" value="0" name="itemDetailsStock" id="itemDetailsStock">
=======
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Katalog Produk</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Katalog Produk</li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Katalog Produk</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="card-body">
                <form action="tambah_produk.php" method="post"  enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="foto">Foto Produk</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto">
                      <label class="custom-file-label" for="foto">Pilih foto</label>
                    </div>
                  </div>

                  <div class="form-group required">
                    <label for="nama" class="control-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex :  Musae Chips - Milk" required>
                  </div>
                  <div class="form-group">
                    <label for="kategori" class="control-label">Kategori Produk (Opsional)</label>
                    <input type="number" class="form-control" id="kategori" name="kategori" placeholder="Ex :  Makanan & Minuman">
                  </div>
                  <div class="form-group">
                    <label for="stok" class="control-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Ex :  100" required>
                  </div>
                  <div class="form-group required">
                    <label for="harga" class="control-label">Harga Produk</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Rp</div>
                      </div>
                      <input type="number" class="form-control" id="harga" name="harga" placeholder="Ex :  15.000"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi" class="control-label">Deskripsi Produk (Opsional)</label>
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" placeholder="Ex :  Weight  : 90 g"></textarea>
>>>>>>> 4562a4cca9ce0e3bba0962934636c05b6569958d
                  </div>
                  <div style="display:flex;justify-content:right;margin-top:25px">
                    <button type="reset" class="btn btn-outline-dark" style="margin-right: 25px;">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
<<<<<<< HEAD
                </div>
							  <button type="button" id="addItem" class="btn btn-success">Tambah</button>
							  <button type="button" id="updateItemDetailsButton" class="btn btn-primary">Update</button>
							  <button type="button" id="deleteItem" class="btn btn-danger">Hapus</button>
							  <button type="reset" class="btn" id="itemClear">Clear</button>
               
              </form>
            
=======
                </form>
              </div>
>>>>>>> 4562a4cca9ce0e3bba0962934636c05b6569958d
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