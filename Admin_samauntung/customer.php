<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Customer Samauntung</title>
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
      
        </nav> -->
        <?php require "components/topbar.php"?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dropshiper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Customer</li>
              <li class="breadcrumb-item active" aria-current="page">Dropshiper</li>
            </ol>
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
        
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->
      </div>
     
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