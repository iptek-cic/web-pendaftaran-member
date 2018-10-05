<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Registration | CodeIgniterAdmin</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?= linkTo('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= linkTo('bower_components/font-awesome/css/font-awesome.min.css') ?>">
   <link rel="stylesheet" href="<?= linkTo('bower_components/Ionicons/css/ionicons.min.css') ?>">
   <link rel="stylesheet" href="<?= assets('css/AdminLTE.min.css') ?>">
   <link rel="stylesheet" href="<?= assets('plugins/iCheck/square/blue.css') ?>">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
   <div class="register-box">
      <div class="register-logo">
         <a href="<?= linkTo('/') ?>">CodeIgniter<b>Admin</b></a>
      </div>

      <div class="register-box-body">
         <p class="login-box-msg">Register a new membership</p>

         <form action="<?= linkTo('register'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group has-feedback">
               <input type="text" name="name" class="form-control" placeholder="Full name">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <?= form_error('name') ?>
            </div>
            <div class="form-group has-feedback">
               <input type="text" name="username" class="form-control" placeholder="Username">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <?= form_error('username') ?>
            </div>
            <div class="form-group has-feedback">
               <input type="email" name="email" class="form-control" placeholder="Email">
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               <?= form_error('email') ?>
            </div>
            <div class="form-group has-feedback">
               <input type="password" name="password" class="form-control" placeholder="Password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               <?= form_error('password') ?>
            </div>
            <div class="form-group has-feedback">
               <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
               <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
               <?= form_error('confirm_password') ?>
            </div>
            <div class="form-group has-feedback">
              <input type="file" name="picture" class="form-control">
            </div>
            <div class="row">
               <div class="col-xs-8">
                  <div class="checkbox icheck">
                   <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                 </label>
              </div>
           </div>
           <!-- /.col -->
           <div class="col-xs-4">
            <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
         </div>
         <!-- /.col -->
      </div>
   </form>   
</div>
<!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?= linkTo('bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= linkTo('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?= assets('plugins/iCheck/icheck.min.js')?>"></script>
<script>
   $(function () {
      $('input').iCheck({
         checkboxClass: 'icheckbox_square-blue',
         radioClass: 'iradio_square-blue',
         increaseArea: '20%' /* optional */
      });
      $("input").attr({
        'autocomplete':'off'
      });
   });
</script>
</body>
</html>
