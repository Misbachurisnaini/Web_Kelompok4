<?php
    include 'koneksi.php';
    $query = mysqli_query($konek, "SELECT * FROM user,customer_detail WHERE user.id_user=customer_detail.id_customer AND user.user_level = 'user' AND user.id_user = ".$_GET['id']);
    $data=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detail Dropshiper</title>
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
    .profil tr td{
      padding-bottom: 43px;
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
              <a class="nav-link aktif" href="customer.php">
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
            <a href="customer.php" style="color:black"><i class="material-icons">arrow_back</i></a>  
                <h1 class="h2" style="margin-left: 30px;">Detail Dropshiper</h1>
            </div>
        </div>
        <center style="margin-top: 39px;margin-bottom:100px"><img src="uploads/<?=$data["foto"]?>" width="190px" height="190px"></center>
        <div class="row">
          <div class="col">
            <div style="display: flex;justify-content:center">
              <table class="profil">
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">NAME</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["nama"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">USERNAME</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["user_name"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">LAST ACTIVE</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=date('d F Y', strtotime($data["last_active"]))?></td>
                </tr>
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["user_email"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">DATE REGISTER</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=date('d F Y', strtotime($data["date_register"]))?></td>
                </tr>
                <tr>
                  <td style="padding-right:43px;color: #8E8E8E;font-weight:400;font-size:18px">ORDER</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["orders"]?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col">
            <div style="display: flex;justify-content:center">
              <table class="profil">
                <tr>
                  <td style="padding-right:12px;color: #8E8E8E;font-weight:400;font-size:18px">TOTAL SPEND</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["total_spend"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:12px;color: #8E8E8E;font-weight:400;font-size:18px">AOV</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=($data["total_spend"]/$data["orders"])?></td>
                </tr>
                <tr>
                  <td style="padding-right:12px;color: #8E8E8E;font-weight:400;font-size:18px">COUNTRY / REGION</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["region"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:12px;color: #8E8E8E;font-weight:400;font-size:18px">EMAIL</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["city"]?></td>
                </tr>
                <tr>
                  <td style="padding-right:12px;color: #8E8E8E;font-weight:400;font-size:18px">POSTAL</td>
                  <td style="color: #052747;font-weight:600;font-size:18px">: <?=$data["postal"]?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>