
<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// selalu ikutkan 2 file ini untuk dapat menjalankan fungsi dan konek database
require "config/function.php";

$query = query("SELECT pesanan_detail.*, customer.*, pesanan.* FROM pesanan_detail
INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer 
INNER JOIN pesanan ON pesanan_detail.id_pesanan = pesanan.id_pesanan
AND pesanan.status = 'selesai'
");

if (isset($_POST['submit'])) {
    if ($_POST['bulan'] != 0) {
        $bulan = date($_POST['bulan']);

        $query = query("SELECT pesanan_detail.*, customer.*, pesanan.* FROM pesanan_detail
        INNER JOIN customer ON pesanan_detail.id_customer = customer.id_customer 
        INNER JOIN pesanan ON pesanan_detail.id_pesanan = pesanan.id_pesanan
        AND MONTH(pesanan.tanggal_pesanan) = '$bulan' 
        AND pesanan.status = 'selesai'
        ");
    }
}

// hitung jumlah baris data
$baris = count($query);

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
  <title>RuangAdmin - Blank Page</title>
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
            <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Laporan</li>
            </ol>
          </div>
          <!-- Modal Logout -->
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->

        <div class="container-fluid">


                    <div class="card shadow">
                        <div class="card-body">
                            <!-- form kategori -->
                            <div class="col-md-4 pt-2">
                                <span>Jumlah data: <b><?= $baris ?></b></span>
                            </div>
                            <div class="col-md-8">
                                <form method="POST" action="" class="form-inline">
                                    <label for="date1" class="mr-2">Tampilkan transaksi bulan </label>
                                    <select class="form-control mr-2" name="bulan">
                                        <option value="0">Semua</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
                                </form>
                            </div>

                            <!-- isi table -->
                            <div class="card mb-4 mt-4">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>No Telepon</th>
                                                    <th>Total Bayar</th>
                                                    <th>Tgl. Transaksi</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            $no = 1;
                                            foreach ($query as $data) {
                                            ?>

                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= ucwords(htmlspecialchars($data['nama'])) ?></td>
                                                    <td><?= $data['email_cs'] ?></td>
                                                    <td><?= $data['total'] ?></td>
                                                    <td><?= date('d-M-Y', strtotime($data['tanggal_pesanan'])) ?></td>
                                                </tr>

                                            <?php
                                            }
                                            ?>

                                        </table>
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