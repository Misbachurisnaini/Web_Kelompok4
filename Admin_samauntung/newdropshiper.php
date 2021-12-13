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
            <h1 class="h3 mb-0 text-gray-800">New Dropshiper</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active" aria-current="page">New Dropshiper</li>
            </ol>
          </div>

          <!-- Modal Logout -->
          <?php require "components/logout.php"?>

        </div>
        <!---Container Fluid-->

        <div class="container-fluid">
          <div class="row no-gutters justify-content-center mb-4">
            <div class="col-12">
                <div class="card-body shadow-sm">
                  <div class="row justify-content-center mb-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body shadow-sm">
                          <div class="row justify-content-center">
                            <div class="col-md-7 pt-2">
                              <form action="" method="">
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Username</label>
                                  <input name="username" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Email</label>
                                  <input name="email" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">No Handphone</label>
                                  <input name="Hp" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Alamat</label>
                                  <input name="Alamat" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-4 col-form-label" for="">Password</label>
                                  <input name="password" class="form-control" type="password" placeholder="insert your new password">
                                </div>
                                <div class="mb-2 px-4 text-center" >
                                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                  <a href="dropshiper.php" type="button" class="btn btn-primary text-white" data-tooltip="tooltip" data-placement="buttom" >
                                    Cancel
                                  </a>
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