<?php
require 'config/function.php';

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: topbar.php");
    exit;
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
            <h1 class="h3 mb-0 text-gray-800">Your profil</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">Your Profil</li>
            </ol>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-2 px-4">
                <label for="" class="col-sm-2 col-form-label">Email</label>
                <input oninvalid="this.setCustomValidity('format email tidak valid')" type="email" oninput="setCustomValidity('')" maxlength="50" class="form-control" name="email" id="email" placeholder="insert your active email" required>
              </div>
              <div class="mb-2 px-4">
                <label for="" class="col-sm-2 col-form-label">Email</label>
                <input oninvalid="this.setCustomValidity('format email tidak valid')" type="email" oninput="setCustomValidity('')" maxlength="50" class="form-control" name="email" id="email" placeholder="insert your active email" required>
              </div>
              <div class="mb-2 px-4">
                <label for="" class="col-sm-2 col-form-label">Email</label>
                <input oninvalid="this.setCustomValidity('format email tidak valid')" type="email" oninput="setCustomValidity('')" maxlength="50" class="form-control" name="email" id="email" placeholder="insert your active email" required>
              </div>
              <div class="mb-2 px-4">
                <label for="" class="col-sm-2 col-form-label">Email</label>
                <input oninvalid="this.setCustomValidity('format email tidak valid')" type="email" oninput="setCustomValidity('')" maxlength="50" class="form-control" name="email" id="email" placeholder="insert your active email" required>
              </div>
              <div class="mb-2 px-4">
                <label for="" class="col-sm-2 col-form-label">Password</label>
                <input oninvalid="this.setCustomValidity('format password terlalu pendek')" oninput="setCustomValidity('')" minlength="8" type="password" class="form-control" name="password" id="password" placeholder="insert your password" required>
              </div>
              <div class="mb-3 px-4">
                <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                <input oninvalid="this.setCustomValidity('format password terlalu pendek')" oninput="setCustomValidity('')" minlength="8" type="password" class="form-control" name="password2" id="password2" placeholder="confirm your password" required>
              </div>
              <div class="mb-2 px-4">
                <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                <button type="clear" class="btn btn-outline-danger">Clear Form</button>
              </div>
            </form>
          </div>

          <!-- Modal Logout -->
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