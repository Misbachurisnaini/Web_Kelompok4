<?php
  include 'koneksi.php';
  $query = mysqli_query($konek, "SELECT produk.gambar_produk,produk.id_produk, produk.nama_produk, kategori.nama_kategori, produk_detail.harga, produk_detail.stok FROM produk LEFT JOIN produk_detail ON produk.id_produk = produk_detail.id_produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori");
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
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
              <a class="nav-link" href="customer.php">
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
          <h1 class="h2">Katalog Produk</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a hr class="btn btn-primary" href="tambah_produk.php">
              Tambah Produk
            </a>
          </div>
        </div>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel"><i class="material-icons">warning_amber</i>Hapus Produk Ini</h5>
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
        <table class="table" id="example">
            <thead>
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
                  <a href="edit_produk.php?id=<?=$data["id_produk"]?>" class="btn btn-outline-dark">
                    <i class="material-icons">edit</i>Edit
                  </a>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-outline-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons">more_vert</i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#shareModal" data-whatever="<?=$data['id_produk']?>">
                        <i class="material-icons">share</i>Bagikan
                      </button>
                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteModal" data-whatever="<?=$data['id_produk']?>">
                        <i class="material-icons" >delete</i>Hapus
                      </button>
                    </div>
                  </div>      
                </td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
              
                $('#example').DataTable(
                  {
                    "bInfo": false,
                    "bLengthChange": false,
                    language: { search: "",searchPlaceholder: "Cari Produk..." },
                    "dom": "<'row'<'col-sm-12 col-md-12'f>>"+
                    "<'row'<'col-sm-12 col-md-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-12'p>>",
                   
                  }
                );
            });
        </script>
      </main>
    </div>
  </div>
</body>
</html>