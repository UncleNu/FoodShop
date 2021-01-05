<?php //$this->loadLayout("role/layout/header");  ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/static/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>static/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="login-box" style="margin: auto;">
  <div class="login-logo">
  <img src="<?php echo BASE_URL; ?>static/images/pch.png" width="250">
    <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
  </div>
  <!-- /.login-logo -->
  <div  style="margin:auto;">
    <p class="login-box-msg">Sign in to start application</p>
    <?php echo @$_SESSION['user_id']; ?>
    
    <form action="<?php echo BASE_URL; ?>login/act" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User name" name="email" id = "email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name = "password_hash" id = "password_hash">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> Remember Me -->
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 100%;">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <!-- <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a> -->
    </div>
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php //$this->loadLayout("role/layout/footer"); ?>
