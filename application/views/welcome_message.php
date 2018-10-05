<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Welcome Page | CodeIgniter Admin</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?= base_url('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('bower_components/font-awesome/css/font-awesome.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('bower_components/Ionicons/css/ionicons.min.css') ?>">
   <link rel="stylesheet" href="<?= assets('css/AdminLTE.min.css') ?>">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
   .lockscreen-wrapper{
      max-width: 100% !important;
      margin-top:0 !important;
      padding-top: 5% !important;
   }
   .lockscreen-item{
      text-align: center;
      margin:0 auto;
      width: auto !important;
      background: #d2d6de;
   }
   .lockscreen-item img{
      box-shadow: 5px 5px 3px #555;
   }
   .btn{
      width:100px !important;
   }
</style>
</head>
<body class="hold-transition lockscreen">
   <!-- Automatic element centering -->
   <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
         <a href="#">CodeIgniter<b>Admin</b></a>
      </div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
         <img src="<?= assets('img/preview.png') ?>" alt="Preview">
      </div>
      <!-- /.lockscreen-item -->
      <br>
      <div class="text-center">
         <a href="#" class="btn btn-primary btn-flat" data-toggle="tooltip" title="Login">
            <span>Login</span>
            <i class="fa fa-log-in"></i>
         </a>
         &nbsp;
         OR
         &nbsp;
         <a href="#" class="btn btn-success btn-flat" data-toggle="tooltip" title="Register">
            <span>Register</span>
         </a>
      </div>
      <div class="lockscreen-footer text-center">
         Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>
         All rights reserved
      </div>
   </div>
   <!-- /.center -->

   <!-- jQuery 3 -->
   <script src="<?= base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
   <!-- Bootstrap 3.3.7 -->
   <script src="<?= base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
   <script>
      $(function(){
         $("a[data-toggle=tooltip]").tooltip();
      });
   </script>
</body>
</html>

