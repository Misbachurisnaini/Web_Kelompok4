<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

require "config/function.php";

$idAkun = $_SESSION['id-admin'];

if (isset($_POST['submitUbahPassword'])) {
    // cek password
    $result = mysqli_query($conn, "SELECT password FROM user WHERE id_user = '$idAkun'");
    $row = mysqli_fetch_assoc($result);

    if (isset($row['password'])) {
        if (password_verify($_POST['password'], $row['password'])) {
            if ($_POST['passwordBaru1'] == $_POST['passwordBaru2']) {
                if (ubahPassword($_POST) > 0) {
                    echo "
                    <script>
                    alert('password berhasil ubah!');
                    location = 'profil.php';
                    </script>";
                } else {
                    echo mysqli_error($conn);
                    echo "
                    <script>
                    alert('password gagal diubah!');
                    </script>";
                }
            } else {
                echo "
                    <script>
                    alert('password konfirmasi tidak sama!');
                    </script>";
            }
        } else {
            $error = true;
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
            <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="profil.php">profil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
            </ol>
          </div>

          <!-- Isi card konten -->
          <div class="row no-gutters justify-content-center mb-4">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body shadow-sm">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="kdAkun" value="<?= $idAkun; ?>">

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body shadow-sm">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-7 pt-2">
                                                                <?php if (isset($error)) : ?>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Password salah!
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="form-group">
                                                                    <label for="password">Password Lama</label>
                                                                    <input placeholder="masukkan password..." required type="password" class="form-control form-control-user" id="password" name="password">
                                                                </div>
                                                                <hr>
                                                                <div class="form-group">
                                                                    <label for="password">Password Baru</label>
                                                                    <input placeholder="masukkan password baru..." required type="password" class="form-control form-control-user" id="passwordBaru1" name="passwordBaru1">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Konfirmasi Password</label>
                                                                    <input placeholder="tulis ulang password baru..." required type="password" class="form-control form-control-user" id="passwordBaru2" name="passwordBaru2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-4">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body shadow-sm text-right">
                                                        <a href="profil.php?tab=2" class="btn btn-outline-secondary mr-2">Batal</a>
                                                        <button id="submitUbahPassword" name="submitUbahPassword" type="submit" class="btn btn-success">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
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