<?php

session_start();

require "config/function.php";

if(isset($_SESSION["admin"])){
    header("location: index.php");
    exit;
}

// cek login
if (isset($_POST['login'])){
  if(login($_POST) == false){
    $error = true;
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
    <title>Samauntung - Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
  
  </head>
  
  <body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login" ng-app="myApp" ng-controller="myCon">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
          <div class="card shadow-sm my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center"><h1 class="h4 text-gray-900 mb-4">Samauntung</h1></div>
                    <form class="user" method="POST" action=''>
                      <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                          Wrong email or password!
                        </div>
                      <?php endif; ?>
                      <div class="form-group">
                        <input type="email" class="form-control form-control-user"
                          placeholder="Enter Email Address..." name="email" id="email"
                          oninvalid="this.setCustomValidity('format email tidak valid!')" 
                          oninput="setCustomValidity('')" required>
                      </div>
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <input type="{{inputType}}" class="form-control" name="password" placeholder="Password" ng-model="passwordField"> 
                         
                          <div class="input-group-prepend" ng-click="showPassword()">
                            <span class="input-group-text btn" id="basic-addon1"><i class="far fa-{{showHideIcon}}"></i></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <button class="btn btn-primary btn-user btn-block" name="login" type="submit"> Login </button>
                      </div>
                      <div class="text-center">
                        <a class="font-weight-bold medium" href="index.html">Go to SAMAUNTUNG</a>
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
      
      <!-- Login Content -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
    <script>
      var app = angular.module("myApp",[]);
      app.controller("myCon", function($scope){
        $scope.inputType = "password";
        $scope.showHideIcon = "eye";
        $scope.showPassword = function(){
          if($scope.passwordField !== null){
            if($scope.inputType =="password"){
              $scope.inputType = "text";
              $scope.showHideIcon = "eye-slash";
            }else{
              $scope.inputType = "password";
               $scope.showHideIcon = "eye";
            }
          }
        }
      })
    </script>
  </body>
</html>
