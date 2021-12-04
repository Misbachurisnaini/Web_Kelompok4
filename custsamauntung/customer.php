<?php
    include 'koneksi.php';
    $query = mysqli_query($konek, "SELECT 
    COUNT(customer_detail.id_customer) as total,
    AVG(customer_detail.orders) as avg_order,
    AVG(customer_detail.total_spend) as avg_spend,
    AVG(customer_detail.total_spend/customer_detail.orders) as aov
    FROM customer_detail,user WHERE customer_detail.id_customer = user.id_user AND user.user_level = 'user'");
    $data_analyzed=mysqli_fetch_array($query);
    $query = mysqli_query($konek, "SELECT user.id_user,user.user_name,user.user_email,customer_detail.nama,customer_detail.foto,customer_detail.last_active FROM user,customer_detail WHERE user.id_user=customer_detail.id_customer AND user.user_level = 'user'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dropshiper</title>
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
    .information{
        display:flex;
        justify-content:center;
        background:#C4C4C4;
        padding:10px;
        border-radius:5px;
    }
    .information p{
        margin: 0 20px 0 20px;
        color:#6C6C6C;
        font-weight:400;
        font-size:18px;
    }
    .buttons-pdf{
        display: none;
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
              <a class="nav-link" href="#">
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
              <a class="nav-link aktif" href="#">
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
          <h1 class="h2">Dropshiper</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-outline-dark" id="ExportReporttoExcel" style="color:#1565C0!important">Download</button>
          </div>
        </div>
        <table class="table" id="example">
            <thead>
                <tr>
                    <th></th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>LAST ACTIVE</th>
                    <th>EMAIL</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody> 
            <?php while($data=mysqli_fetch_array($query)){ ?>
              <tr>
                <td><img src="uploads/<?=$data["foto"]?>" width="50px" height="50px"></td>
                <td><b><?=$data["nama"]?></b></td>
                <td><?=$data["user_name"]?></td>
                <td><?=date('M d, Y', strtotime($data["last_active"]))?></td>
                <td style="color:#00A3FF"><?=$data["user_email"]?></td>
                <td><a href="detail_customer.php?id=<?=$data["id_user"]?>"><i class="material-icons" style="color:black">visibility</i></a></td>
                <td>
                  <a href="edit_customer.php?id=<?=$data["id_user"]?>" class="btn btn-outline-dark">
                    <i class="material-icons">edit</i>Edit
                  </a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="information">
            <p><?=$data_analyzed["total"]?> customers</p>
            <p><?=number_format((float)$data_analyzed["avg_order"], 2, ',', '.')?> average orders</p>
            <p>Rp<?=number_format((float)$data_analyzed["avg_spend"], 2, ',', '.')?> average lifetime spend</p>
            <p>Rp<?=number_format((float)$data_analyzed["aov"], 2, ',', '.')?> average order value</p>
        </div>
        <script>
            $(document).ready(function() {
                $('#example').DataTable(
                  {
                    "bInfo": false,
                    "bLengthChange": false,
                    "paging": false,
                    language: { search: "",searchPlaceholder: "Cari Produk..." },
                    "dom": "<'row'<'col-sm-12 col-md-12'fB>>"+
                    "<'row'<'col-sm-12 col-md-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-12'p>>",
                    buttons: [ {extend: 'pdfHtml5',download: 'open',exportOptions: {columns: [ 1, 2, 3, 4 ]}} ] 
                  }
                );
            });
            $('#ExportReporttoExcel').click(() => {
                $('.buttons-pdf').click();
            })
        </script>
      </main>
    </div>
  </div>
</body>
</html>