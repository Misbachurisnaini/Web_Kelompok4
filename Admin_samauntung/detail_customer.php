<?php
include 'koneksi.php';
$query = mysqli_query($konek, "SELECT * FROM user,customer_detail WHERE user.id_user=customer_detail.id_customer AND user.user_level = 'user' AND user.id_user = ".$_GET['id']);
$data=mysqli_fetch_array($query);
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
  <title>Detail Customer Samauntung</title>
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

       <!-- Topbar -->
       <?php require "components/topbar.php"?>
       <!-- Topbar -->

       <!-- Container Fluid-->
       <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detail Dropshiper</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Customer</li>
            <li class="breadcrumb-item active" aria-current="page">Detail Dropshiper</li>
          </ol>
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
</body>

</html>