<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Login | IPTEK CIC</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?= base_url('bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
   <link rel="stylesheet" href="<?= base_url('bower_components/font-awesome/css/font-awesome.min.css')?>">
   <link rel="stylesheet" href="<?= base_url('bower_components/Ionicons/css/ionicons.min.css')?>">
   <link rel="stylesheet" href="<?= assets('css/AdminLTE.min.css')?>">
   <link rel="stylesheet" href="<?= assets('plugins/iCheck/square/blue.css')?>">

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="#">
            <img src="<?= assets('img/logo.png') ?>" alt="" style="width: 240px;">
         </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body" style="box-shadow: 1px 2px 4px #333;">
         <p class="login-box-msg">Sign in to start your session</p>

         <form action="<?= linkTo('login') ?>" method="post">
            <div class="form-group has-feedback">
               <input type="text" name="username" class="form-control" placeholder="Username" autofocus required autocomplete="off">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <?= form_error('username') ?>
            </div>
            <div class="form-group has-feedback">
               <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               <?= form_error('password') ?>
            </div>
            <div class="row">
               <div class="col-xs-12">
                  <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log In</button>
               </div>
               <!-- /.col -->
            </div>
         </form>
         <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->
   <script src="<?= base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
   <script src="<?= base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
   <script src="<?= assets('plugins/iCheck/icheck.min.js') ?>"></script>
   <script>
      <?php if(isset($_SESSION['msg'])): ?>
         alert("<?= $_SESSION['msg'] ?>");
      <?php endif; ?>
      $(function () {
         $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
         });
      });
   </script>
</body>
</html>
