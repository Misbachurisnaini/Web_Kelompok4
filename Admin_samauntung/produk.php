<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
$query = mysqli_query($konek, "SELECT produk.gambar_produk,produk.id_produk, produk.nama_produk, kategori.nama_kategori, produk_detail.harga, produk_detail.stok FROM produk LEFT JOIN produk_detail ON produk.id_produk = produk_detail.id_produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori");
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
  <title>Katalog Produk Samauntung</title>
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
            <h1 class="h3 mb-0 text-gray-800">Katalog Produk</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <!-- <li class="breadcrumb-item">Customer</li> -->
              <li class="breadcrumb-item active" aria-current="page">Katalog Produk</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-md-12">
             <div class="card mb-4">
              <div class="card-header">
                <a hr class="btn btn-success" href="tambah_produk.php">
                Tambah Produk
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive p-3">
               <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th colspan="2">NAMA PRODUK</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>STATUS</th>
                    <th>EDIT</th>
                    <th>TINDAKAN</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php while($data=mysqli_fetch_array($query)){ ?>
                    <tr>
                      <td><img src="uploads/<?=$data["gambar_produk"]?>" width="50px" height="50px"></td>
                      <td><?=$data["nama_produk"]?></td>
                      <td><?=$data["nama_kategori"]?></td>
                      <td>Rp<?=$data["harga"]?></td>
                      <td style="color:green">Stok : <?=$data["stok"]?></td>
                      <td>
                        <a href="edit_produk.php?id=<?=$data["id_produk"]?>" class="btn btn-primary">
                          Edit
                        </a>
                      </td>
                      <td class="text-center">
                        <div class="dropdown">
                          <button class="btn btn-warning" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#shareModal" data-whatever="<?=$data['id_produk']?>">
                              <i class="fas fa-share"></i> Bagikan
                            </button>
                            <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteModal" data-whatever="<?=$data['id_produk']?>">
                              <i class="fas fa-trash" ></i> Hapus
                            </button>
                          </div>
                        </div>      
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-exclamation-triangle"></i> Hapus Produk Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin ingin menghapus item ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">BATAL</button>
        <a type="button" class="btn btn-danger">HAPUS</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shareModalLabel">Bagikan Produk Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="display: flex;justify-content:center">
          <img src="foto/fb.png" style="margin-right: 25px;margin-left:25px">
          <img src="foto/wa.png" style="margin-right: 25px;margin-left:25px">
          <img src="foto/cp.png" style="margin-right: 25px;margin-left:25px">
        </div>
      </div>
    </div>
  </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script>
  $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script>
    $(function(){
      $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var recipient = button.data('whatever');
        console.log(recipient);
        var modal = $(this);
        modal.find('.modal-footer a').attr("href", 'delete_produk.php?id='+recipient);
      });
    });
  </script>
</body>

</html>