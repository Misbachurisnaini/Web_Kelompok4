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
                $sql = "INSERT INTO produk_detail (id_produk, harga) VALUES (LAST_INSERT_ID(),".$_POST["harga"].")";
                if(mysqli_query($konek, $sql)){
                    echo '<script>alert("Data berhasil ditambah")</script>';
                }else{
                    echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
                }
            } else {
                echo '<script>alert("Error:'.mysqli_error($konek).'")</script>';
            }
        } else {
            echo "<script>alert('UPLOAD FILE GAGAL')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <meta name="theme-color" content="#563d7c">
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
  <style>
    .pagination{
        justify-content: right!important;
    }
    .dataTables_filter label{
        width: 100%;
    }
    #sidebarMenu{
      background: #AAD3FA!important;
      padding-top: 0;
    }
    .nav-link p{
      position: absolute;
      left: 30%!important;
    }
    .aktif{
      background: white!important;
      border-bottom-left-radius: 20px;
      border-top-left-radius: 20px;
    }
    .nav-link{
      height: 50px;
    }
    .sidebar-sticky {
      position: relative;
      top: 0;
      height: 100%;
      overflow-x: hidden;
      overflow-y: auto;
    }
    .form-group.required .control-label:after {
        content:"*";
        color:red;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <div style="display: flex;justify-content:center">
            <img src="foto/logo.png">
          </div>
          <h3 style="text-align: center;margin-bottom:70px">Musae Chips</h3>
          <ul class="nav flex-column" style="padding-left: 25px;">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <i class="material-icons">home</i>
                  <p>Home</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link aktif" href="#">
                <div style="display: flex;">
                  <i class="material-icons">inventory_2</i>
                  <p>Katalog Product</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <p>Order</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <p>Dropshiper</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <i class="material-icons">account_balance_wallet</i>
                  <p>Wallet</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <p>Account</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <p>Inventaris</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div style="display: flex;">
                  <p>Produk</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div style="display: flex;align-items:center">
            <a href="home.php" style="color:black"><i class="material-icons">arrow_back</i></a>  
                <h1 class="h2" style="margin-left: 30px;">Tambah Produk</h1>
            </div>
        </div>
        <div class="shadow bg-white rounded p-5">
            <form action="tambah_produk.php" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="foto">Foto Produk</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Pilih foto</label>
                    </div>
                </div>
                <script>
                    $('#foto').on('change',function(){
                        //get the file name
                        var fileName = $(this).val();
                        //replace the "Choose a file" label
                        $(this).next('.custom-file-label').html(fileName);
                    })
                </script>
                <div class="form-group required">
                    <label for="nama" class="control-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex :  Musae Chips - Milk" required>
                </div>
                <div class="form-group">
                    <label for="kategori" class="control-label">Kategori Produk (Opsional)</label>
                    <input type="number" class="form-control" id="kategori" name="kategori" placeholder="Ex :  Makanan & Minuman">
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
                </div>
        </div>
                <div style="display:flex;justify-content:right;margin-top:25px">
                    <button type="reset" class="btn btn-outline-dark" style="margin-right: 25px;">Batal</button>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </form>
            
      </main>
    </div>
  </div>
</body>
</html>