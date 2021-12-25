<?php

session_start();

require "config/function.php";

if(!isset($_SESSION["admin"])){
    header("location: login.php");
    exit;
}

if(!(isset($_GET['id']))) {
  header("Location:manageadmin.php");
  exit;
}

$id = $_GET['id'];
$data = query("SELECT * FROM user WHERE id_user=$id")[0];

if(isset($_POST['submit'])) {
  if($_POST['password'] == $_POST['confirm']) {
  if(editadmin($_POST)>0) {
    echo
        "<script>
            alert('Data berhasil diedit!');
            location = 'manageadmin.php';
        </script>";
    } else {
        echo mysqli_error($conn);
        echo "
        <script>
            alert('Data gagal diedit!');
            location = 'manageadmin.php';
        </script>";
    }
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
            <h1 class="h3 mb-0 text-gray-800">Edit Admin</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="manageadmin.php">manage admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit admin</li>
            </ol>
          </div>

        </div>
        <!---Container Fluid-->

        <div class="container-fluid">
          <div class="row no-gutters justify-content-center mb-4">
            <div class="col-12">
              <div class="card shadow">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active">Data Account</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body shadow-sm">
                  <div class="row justify-content-center mb-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body shadow-sm">
                          <div class="row justify-content-center">
                            <div class="col-md-7 pt-2">
                              <form action="" method="POST">
                                <div class="form-group">
                                  <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                                  <label class="col-sm-4 col-form-label" for="">Username</label>
                                  <input name="username" class="form-control" type="text" value="<?= $data['user_name'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Email</label>
                                  <input name="email" class="form-control" type="text" value="<?= $data['email'] ?>">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Password</label>
                                  <input name="password" class="form-control" type="password" placeholder="insert your new password">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Confirm Password</label>
                                  <input name="confirm" class="form-control" type="password" placeholder="insert your new password">
                                </div>
                                <div class="mb-2 px-4 text-center" >
                                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                  <button type="clear" class="btn btn-outline-danger">Clear Form</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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